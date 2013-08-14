<?php
/**
 * @web http://www.alpha-sys.de
 * @author Fabian Kunkler - Alpha-Sys
 * @email fabian.kunkler@alpha-sys.de
 * @sponsor sunlab GmbH - www.sunlab.de
 * @module oxmanufacturer => asy_mantext/core/asy_mantext__oxmanufacturer
 * @version 1.1 16:00:00 01.12.2012
 */
 

class asy_mantext__oxmanufacturer extends asy_mantext__oxmanufacturer_parent{

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
            if ('extlongdesc' === strtolower($sFieldName) || 'oxmanufacturers__extlongdesc' === strtolower($sFieldName)) {
                $iDataType = oxField::T_RAW;
            }
        }
        return parent::_setFieldData($sFieldName, $sValue, $iDataType);
    }
    
    /**
     * assign extlongdesc to oxlongdesc field
     * @param type $sName
     * @return type 
     */
    public function __get($sName){
        if($sName == 'oxcategories__oxlongdesc'){
            $this->oxcategories__oxlongdesc = $this->oxmanufacturers__extlongdesc;
        }
        
        return parent::__get($sName);
        
    }

}
