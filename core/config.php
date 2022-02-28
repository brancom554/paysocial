<?php
/*******************************************************************************/
/* Configuration file */
/*******************************************************************************/

    $K = new stdClass;
    $K->INCPATH = dirname(__FILE__) . '/';

    $K->PROJPATH = defined('PROJPATH') ? PROJPATH : (dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' .DIRECTORY_SEPARATOR );

    $K->DOMAIN = 'localhost';
    $K->SITE_URL = 'http://localhost/socialstore/';

    $K->RNDKEY = '11a6c';

    $K->DB_HOST = 'localhost';
    $K->DB_USER = 'root';
    $K->DB_PASS = 'xs4root';
    $K->DB_NAME = 'socialstore';
    $K->DB_MYEXT = 'mysqli';

    $K->VERSION = '1.0.0';
    $K->DEBUG_USERS = array();

    chdir($K->INCPATH);

    $K->DEBUG_MODE = in_array($_SERVER['REMOTE_ADDR'], $K->DEBUG_USERS);
    $K->DEBUG_CONSOLE = FALSE;
    if ( $K->DEBUG_MODE ) {
        ini_set( 'error_reporting', E_ALL | E_STRICT );
        ini_set( 'display_errors', 1 );
    }

    $K->STORAGE_URL = $K->SITE_URL.'storage/';
    $K->STORAGE_DIR = $K->INCPATH.'../storage/';
    $K->STORAGE_TMP_URL = $K->STORAGE_URL.'tmp/';
    $K->STORAGE_TMP_DIR = $K->STORAGE_DIR.'tmp/';
    $K->STORAGE_THUMBNAIL_URL = $K->STORAGE_URL.'thumbnails/';
    $K->STORAGE_THUMBNAIL_DIR = $K->STORAGE_DIR.'thumbnails/';
    $K->STORAGE_FILES_URL = $K->STORAGE_URL.'files/';
    $K->STORAGE_FILES_DIR = $K->STORAGE_DIR.'files/';
    $K->BASE_IMG_URL = $K->SITE_URL.'base/images/';

    // Sizes for the thumbnails
    $K->wThumb1 = 320;
    $K->hThumb1 = 430;
    $K->wThumb2 = 160;
    $K->hThumb2 = 215;
    $K->wThumb3 = 210;
    $K->hThumb3 = 284;
    $K->wThumb4 = 85;
    $K->hThumb4 = 113;

    $K->QUALITY_THUMBNAIL = 100; // Image quality of the products (in percent without %)

    $K->BASE_URL = $K->SITE_URL.'base/';
    $K->PLUGINS_DIR = $K->INCPATH.'../plugins/';

?>