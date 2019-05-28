<?php
/**
 * This Software is property of Alpha-Sys and is protected by
 * copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license agreement
 * will be prosecuted by civil and criminal law.
 *
 * @link        http://www.alpha-sys.de
 * @author      Fabian Kunkler <fabian.kunkler@alpha-sys.de>
 * @copyright   (C) Alpha-Sys 2008-2019
 * @module      asy_mantext
 * @version     2.0.3
 */

namespace AlphaSys\AsyManText\Core;

class Events {

    /**
     * Execute action on activate event
     */
    public static function onActivate()
    {
        self::addTableFields();
        
        $oDbHandler = oxNew( 'oxDbMetaDataHandler' );
        $oDbHandler->updateViews();
        
        self::clearTmp();
    }

    /**
     * Execute action on deactivate event
     *
     * @return null
     */
    public static function onDeactivate()
    {
        self::clearTmp();
    }


    /**
     * Add new fields
     */
    public static function addTableFields()
    {

        $dbMetaDataHandler = oxNew(\OxidEsales\Eshop\Core\DbMetaDataHandler::class);

        $tableFields = array(
            'oxmanufacturers' => array('ASY_LONGDESC', 'ASY_LONGDESC_1', 'ASY_LONGDESC_2', 'ASY_LONGDESC_3')
        );

        foreach ($tableFields as $tableName => $fieldNames) {
            foreach($fieldNames as $fieldName){
                if (!$dbMetaDataHandler->fieldExists($fieldName, $tableName)) {
                    \OxidEsales\Eshop\Core\DatabaseProvider::getDb()->execute(
                        "ALTER TABLE `" . $tableName
                        . "` ADD `" . $fieldName . "` VARCHAR( 255 ) NOT NULL DEFAULT '';"
                    );
                }
            }
        }

        if (!$dbMetaDataHandler->fieldExists('ASY_DEFSORT', 'oxmanufacturers')) {
            \OxidEsales\Eshop\Core\DatabaseProvider::getDb()->execute(
                "ALTER TABLE `oxmanufacturers` ADD `ASY_DEFSORT` VARCHAR(64) NOT NULL DEFAULT '';"
            );
        }

        if (!$dbMetaDataHandler->fieldExists('ASY_DEFSORTMODE', 'oxmanufacturers')) {
            \OxidEsales\Eshop\Core\DatabaseProvider::getDb()->execute(
                "ALTER TABLE `oxmanufacturers` ADD `ASY_DEFSORTMODE` TINYINT(1) NOT NULL DEFAULT '0';"
            );
        }
    }
    
    public static function clearTmp( $sClearFolderPath = '' )
    {
        $sTempFolderPath = realpath(\OxidEsales\Eshop\Core\Registry::getConfig()->getConfigParam( 'sCompileDir' ));

        if ( !empty( $sClearFolderPath ) and
             ( strpos( $sClearFolderPath, $sTempFolderPath ) !== false ) and
             is_dir( $sClearFolderPath )
        ) {

            // User argument folder path to delete from
            $sFolderPath = $sClearFolderPath;
        } elseif ( empty( $sClearFolderPath ) ) {

            // Use temp folder path from settings
            $sFolderPath = $sTempFolderPath;
        } else {
            return false;
        }

        $hDir = opendir( $sFolderPath );

        if ( !empty( $hDir ) ) {
            while ( false !== ( $sFileName = readdir( $hDir ) ) ) {
                $sFilePath = $sFolderPath . '/' . $sFileName;

                if ( !in_array( $sFileName, array('.', '..', '.htaccess') ) and is_file( $sFilePath ) ) {

                    // Delete a file if it is allowed to delete
                    @unlink( $sFilePath );
                } elseif ( $sFileName == 'smarty' and is_dir( $sFilePath ) ) {

                    // Recursive call to clear smarty folder
                    self::clearTmp( $sFilePath );
                }
            }
        }

        return true;
    }

}
