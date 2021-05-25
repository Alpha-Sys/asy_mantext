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

/**
 * Metadata version
 */
$sMetadataVersion = '2.1';

/**
 * Module information
 */
$aModule = array(
    'id'           => 'asy_mantext',
    'title'        => '<img src="../modules/asy/asy_mantext/module_icon.png" alt="Alpha-Sys" title="Alpha-Sys"> Hersteller-Beschreibung',
    'description'  => array(
        'de' => 'Mit diesem Modul werden die Hersteller um eine Beschreibung erweitert. Desweiteren kann man eine Sortierung einstellen.'
    ),
    'thumbnail'    => 'module_logo.png',
    'version'      => '2.0.6',
    'author'       => 'Alpha-Sys',
    'email'        => 'fabian.kunkler@alpha-sys.de',
    'url'          => 'http://www.alpha-sys.de',
    'thumbnail'    => 'module_logo.png',
    'extend'       => array(
        \OxidEsales\Eshop\Application\Model\Manufacturer::class                     => \AlphaSys\AsyManText\Model\Manufacturer::class,
        \OxidEsales\Eshop\Application\Controller\ManufacturerListController::class  => \AlphaSys\AsyManText\Controller\ManufacturerListController::class,
        \OxidEsales\Eshop\Application\Controller\Admin\ManufacturerMain::class      => \AlphaSys\AsyManText\Controller\Admin\ManufacturerMain::class
    ),
    'controllers' => array(
        'asy_mantext_main'                    => \AlphaSys\AsyManText\Controller\Admin\MantextMain::class,
    ),
    'events'       => array(
        'onActivate'   => '\AlphaSys\AsyManText\Core\Events::onActivate',
        'onDeactivate' => '\AlphaSys\AsyManText\Core\Events::onDeactivate'
    ),
    'templates' => array(
        'asy_mantext_main.tpl'  => 'asy/asy_mantext/views/admin/tpl/asy_mantext_main.tpl',
    ),
    'blocks' => array(
        array('template' => 'manufacturer_main.tpl', 'block'=>'admin_manufacturer_main_form', 'file'=>'views/blocks/admin_manufacturer_main_form.tpl', 'position' => '2'),
     ),
    'settings' => array(
    )
);
