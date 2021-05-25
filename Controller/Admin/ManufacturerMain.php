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

class ManufacturerMain extends ManufacturerMain_parent{

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
