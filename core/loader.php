<?php
/*******************************************************************************/
/* Loader file. Load functions and classes */
/*******************************************************************************/
    error_reporting(E_ALL);

    chdir(dirname(__FILE__));

    require_once('./helpers/func_main.php');

    require_once('./config.php');

    session_start();

    $db1 = new mysql($K->DB_HOST, $K->DB_USER, $K->DB_PASS, $K->DB_NAME);
    $db2 = &$db1;

    $pivot = new pivot();
    $pivot->loadUp();

    $user = new user();
    $user->loadUp();

    $pluginsControl = new pluginsControl();

    $page = new page();
    $page->loadUp();
?>