<?php
/**
 * This Software is property of Alpha-Sys and is protected by
 * copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license agreement
 * will be prosecuted by civil and criminal law.
 *
 * @link        http://www.alpha-sys.de
 * @author      Fabian Kunkler <fabian.kunkler@alpha-sys.de>
 * @copyright   (C) Alpha-Sys 2008-2018
 * @module      asy_mantext
 * @version     03.07.2018 2.0.1
 */

namespace AlphaSys\AsyManText\Model;

class Manufacturer extends Manufacturer_parent{

    /**
     * Sets data field value
     *
     * @param string $sFieldName index OR name (eg. 'oxarticles__oxtitle') of a data field to set
     * @param string $sValue     value of data field
     * @param int    $iDataType  field type
     *
     * @return null
     */
    protected function _setFieldData( $sFieldName, $sValue, $iDataType = oxField::T_TEXT)
    {
        //preliminar quick check saves 3% of execution time in category lists by avoiding redundant strtolower() call
        if ($sFieldName[2] == 'l' || $sFieldName[2] == 'L' || (isset($sFieldName[16]) && ($sFieldName[16] == 'l' || $sFieldName[16] == 'L') ) ) {
            if ('asy_longdesc' === strtolower($sFieldName) || 'oxmanufacturers__asy_longdesc' === strtolower($sFieldName)) {
                $iDataType = oxField::T_RAW;
            }
        }
        return parent::_setFieldData($sFieldName, $sValue, $iDataType);
    }
    
    /**
     * assign asy_longdesc to oxlongdesc field
     * @param type $sName
     * @return type 
     */
    public function __get($sName){
        if($sName == 'oxcategories__oxlongdesc'){
            $this->oxcategories__oxlongdesc = $this->oxmanufacturers__asy_longdesc;
        }
        
        return parent::__get($sName);
        
    }

}
