<?php
/**
 * @web http://www.alpha-sys.de
 * @author Fabian Kunkler - Alpha-Sys
 * @email fabian.kunkler@alpha-sys.de
 * @sponsor sunlab GmbH - www.sunlab.de
 * @module oxmanufacturerlist => asy_mantext/core/asy_mantext__oxmanufacturerlist
 * @version 1.1 16:00:00 01.12.2012
 */

class asy_mantext__oxmanufacturerlist extends asy_mantext__oxmanufacturerlist_parent {

    /**
     * overrides parent method
     * Adds category specific fields to manufacturer object
     *
     * @param object $oManufacturer manufacturer object
     *
     * @return null
     */
    /*protected function _addCategoryFields($oManufacturer) {
        $oManufacturer->oxcategories__oxid = new oxField($oManufacturer->oxmanufacturers__oxid->value);
        $oManufacturer->oxcategories__oxicon = $oManufacturer->oxmanufacturers__oxicon;
        $oManufacturer->oxcategories__oxtitle = $oManufacturer->oxmanufacturers__oxtitle;
        
        $oManufacturer->setIsVisible(true);
        $oManufacturer->setHasVisibleSubCats(false);
    }*/

}

?>
