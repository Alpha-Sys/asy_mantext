<?php
/**
 * @web http://www.alpha-sys.de
 * @copyright Alpha-Sys 2008-2014
 * @author Fabian Kunkler 
 * @sponsored from sunlab gmbh, http://www.sunlab.de
 * @email fabian.kunkler@alpha-sys.de
 * @version 1.4 16:00:00 13.11.2014
 */
 
/**
 * Metadata version
 */
$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = array(
    'id'           => 'asy_mantext',
    'title'        => '<img src="../modules/asy/module_logo.png" alt="Alpha-Sys" title="Alpha-Sys"> Hersteller-Beschreibung',
    'description'  => 'Beschreibung für den Hersteller',
    'thumbnail'    => 'module_logo.png',
    'version'      => '1.4',
    'author'       => 'Alpha-Sys',
    'sponsor'      => 'Sunlab GmbH',
    'url'          => 'http://www.alpha-sys.de',
    'email'        => 'fabian.kunkler@alpha-sys.de',

    'extend'       => array(
        'manufacturer_main'      => 'asy/asy_mantext/controllers/admin/asy_mantext__manufacturer_main',
        'manufacturerlist'       => 'asy/asy_mantext/controllers/asy_mantext__manufacturerlist',
        'oxmanufacturer'         => 'asy/asy_mantext/models/asy_mantext__oxmanufacturer',
    ),
    'settings' => array(
    ),
    'blocks' => array(
    ),
    'templates' => array(
        'asy_mantext_main.tpl'  => 'asy/asy_mantext/views/admin/tpl/asy_mantext_main.tpl',
    ),
    'files' => array(
        'asy_mantext_main'      => 'asy/asy_mantext/controllers/admin/asy_mantext_main.php',
    ),


);
