<?php
/**
 * @web http://www.alpha-sys.de
 * @author Fabian Kunkler - Alpha-Sys
 * @email fabian.kunkler@alpha-sys.de
 * @sponsor sunlab GmbH - www.sunlab.de
 * @module manufacturerlist => asy_mantext/views/asy_mantext__manufacturerlist
 * @version 1.1 16:00:00 01.12.2012
 */

class asy_mantext__manufacturerlist extends asy_mantext__manufacturerlist_parent {

    /**
     * set default sorting
     * @param type $sCnid
     * @return type 
     */
    public function getSortingSql($sCnid){
        $ret = parent::getSortingSql($sCnid);
        if($ret){
            return $ret;
        }
        
        $oManufacturer = $this->getActManufacturer();
        $sSortBy  = $oManufacturer->oxmanufacturers__asy_defsort;
        $sSortDir = ( $oManufacturer->oxmanufacturers__asy_defsortmode->value ) ? "desc" : null;
        if($sSortBy && $sSortDir){
            return "  $sSortBy $sSortDir";
        }
    }    
}