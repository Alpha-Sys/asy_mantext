<?php
/**
 * This Software is property of Alpha-Sys and is protected by
 * copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license agreement
 * will be prosecuted by civil and criminal law.
 *
 * @link        http://www.alpha-sys.de
 * @author      Fabian Kunkler <fabian.kunkler@alpha-sys.de>
 * @copyright   (C) Alpha-Sys 2008-2021
 * @module      asy_mantext
 * @version     2.0.6
 */

namespace AlphaSys\AsyManText\Controller\Admin;

class MantextMain extends \OxidEsales\Eshop\Application\Controller\Admin\AdminDetailsController {

    public function render() {
        parent::render();
        
        $this->_aViewData['edit'] = $o = oxNew(\OxidEsales\Eshop\Application\Model\Manufacturer::class);

        $soxId = $this->_aViewData["oxid"] = $this->getEditObjectId();
        if ($soxId != "-1" && isset($soxId)) {
            // load object
            $iLang = \OxidEsales\Eshop\Core\Registry::getConfig()->getRequestParameter("catlang");

            if (!isset($iLang))
                $iLang = $this->_iEditLang;

            $this->_aViewData["manlang"] = $iLang;
            $this->_aViewData["catlang"] = $iLang;

            $o->loadInLang($iLang, $soxId);
        }

        $this->_aViewData["editor"] = $this->_generateTextEditor("100%", 300, $o, "oxmanufacturers__asy_longdesc", "list.tpl.css");

        return "asy_mantext_main.tpl";
    }

    /**
     * Saves category description text to DB.
     *
     * @return mixed
     */
    public function save() {
        $myConfig = \OxidEsales\Eshop\Core\Registry::getConfig();

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
