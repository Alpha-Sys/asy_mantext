<?php
/**
 * @web http://www.alpha-sys.de
 * @author Fabian Kunkler - Alpha-Sys
 * @email fabian.kunkler@alpha-sys.de
 * @sponsor sunlab GmbH - www.sunlab.de
 * @version 1.1 16:00:00 01.12.2012
 */

class asy_mantext_main extends oxAdminDetails {

    public function render() {
        parent::render();
        
        $this->_aViewData['edit'] = $o = oxNew('oxmanufacturer');

        $soxId = $this->_aViewData["oxid"] = $this->getEditObjectId();
        if ($soxId != "-1" && isset($soxId)) {
            // load object
            $iLang = oxRegistry::getConfig()->getRequestParameter("catlang");

            if (!isset($iLang))
                $iLang = $this->_iEditLang;

            $this->_aViewData["manlang"] = $iLang;
            $this->_aViewData["catlang"] = $iLang;

            $o->loadInLang($iLang, $soxId);

            /*foreach (oxLang::getInstance()->getLanguageNames() as $id => $language) {
                $oLang = new oxStdClass();
                $oLang->sLangDesc = $language;
                $oLang->selected = ($id == $this->_iEditLang);
                $this->_aViewData["otherlang"][$id] = clone $oLang;
            }*/
        }

        $this->_aViewData["editor"] = $this->_generateTextEditor("100%", 300, $o, "oxmanufacturers__extlongdesc", "list.tpl.css");

        return "asy_mantext_main.tpl";
    }

    /**
     * Saves category description text to DB.
     *
     * @return mixed
     */
    public function save() {
        $myConfig = oxRegistry::getConfig();

        $soxId = $this->getEditObjectId();
        $aParams = $myConfig->getRequestParameter("editval");

        $o = oxNew("oxmanufacturer");
        $iLang = $myConfig->getRequestParameter("catlang");
        $iLang = $iLang ? $iLang : 0;

        if ($soxId != "-1") {
            $o->loadInLang($iLang, $soxId);
        } else {
            $aParams['oxmanufacturer__oxid'] = null;
        }
        
        #$o->setLanguage(0);
        $o->assign($aParams);
        $o->setLanguage($iLang);
        $o->save();

        // set oxid if inserted
        $this->setEditObjectId($o->getId());
    }

}
