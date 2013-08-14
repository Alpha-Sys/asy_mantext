<?php
/**
 * @web http://www.alpha-sys.de
 * @copyright Alpha-Sys 2012
 * @author Fabian Kunkler 
 * @sponsored from sunlab gmbh, http://www.sunlab.de
 * @email fabian.kunkler@alpha-sys.de
 * @version 1.0 16:00:00 25.11.2012
 */
 
/**
 * Metadata version
 */
$sMetadataVersion = '1.0';

/**
 * Module information
 */
$aModule = array(
    'id'           => 'asy_mantext',
    'title'        => 'Hersteller-Beschreibung',
    'description'  => 'Beschreibung für den Hersteller',
    'thumbnail'    => '',
    'version'      => '1.2',
    'author'       => 'Alpha-Sys',
    'sponsor'      => 'Sunlab GmbH',
    'url'          => 'http://www.alpha-sys.de',
    'email'        => 'fabian.kunkler@alpha-sys.de',

    'extend'       => array(
        'manufacturer_main'      => 'asy_mantext/admin/asy_mantext__manufacturer_main',
        'manufacturerlist'       => 'asy_mantext/views/asy_mantext__manufacturerlist',
        'oxmanufacturer'         => 'asy_mantext/core/asy_mantext__oxmanufacturer',
        'oxmanufacturerlist'     => 'asy_mantext/core/asy_mantext__oxmanufacturerlist',
    ),
    'settings' => array(
    ),
    'blocks' => array(
        array('template' => 'manufacturer_main.tpl', 'block'=>'admin_manufacturer_main_form', 'file'=>'admin_manufacturer_main_form.tpl'),
    ),
    'templates' => array(
        'asy_mantext_main.tpl'  => 'asy_mantext/out/admin/tpl/asy_mantext_main.tpl',
    ),
        'files' => array(
        'asy_mantext_main'      => 'asy_mantext/admin/asy_mantext_main.php',
    ),


);
