<?php
/**
 * This Software is property of Alpha-Sys and is protected by
 * copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license agreement
 * will be prosecuted by civil and criminal law.
 *
 * @link        http://www.alpha-sys.de
 * @author      Fabian Kunkler <fabian.kunkler@alpha-sys.de>
 * @copyright   (C) Alpha-Sys 2008-2020
 * @module      asy_mantext
 * @version     2.0.4
 */

namespace AlphaSys\AsyManText\Controller;

class ManufacturerListController extends ManufacturerListController_parent {

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
        if($sSortBy){
            return "  $sSortBy $sSortDir";
        }
    }
}