<?php
/**
 * @web http://www.alpha-sys.de
 * @author Fabian Kunkler - Alpha-Sys
 * @email fabian.kunkler@alpha-sys.de
 * @sponsor sunlab GmbH - www.sunlab.de
 * @module manufacturer_main => asy_mantext/admin/asy_mantext__manufacturer_main
 * @version 1.1 16:00:00 01.12.2012
 */
 

class asy_mantext__manufacturer_main extends asy_mantext__manufacturer_main_parent{

    public function render(){
        $ret = parent::render();
        
        $soxId = $this->_aViewData["oxid"] = $this->getEditObjectId();
        if ( $soxId != "-1" && isset( $soxId)) {
            // load object
            $oManufacturer = oxNew( "oxmanufacturer" );
            $oManufacturer->loadInLang( $this->_iEditLang, $soxId );
            $this->_aViewData["defsort"] = $oManufacturer->oxmanufacturers__asy_defsort->value;

        }
        $this->_aViewData["sortableFields"] = $this->getSortableFields();
        
        return $ret;
    }
    
    /**
     * Returns an array of article object DB fields, without multilanguage and unsortible fields.
     *
     * @return array
     */
    public function getSortableFields()
    {
        $aSortFields = array("OXID", "OXTITLE", "OXSHORTDESC", "OXTIMESTAMP");
        
        
        return $aSortFields;
    }
    
}
