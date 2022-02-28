<?php
    $page = & $GLOBALS['page'];

    $page->loadLanguage('strings.php');

    $error = FALSE;

    $email = isset($_POST['em']) ? (trim($_POST['em'])) : '';
    $password = isset($_POST['pw']) ? (trim($_POST['pw'])) : '';

    if (!$error && empty($email)) {
        $error = TRUE;
        $msgerror = $page->lang('admin_login_error_email');
    }

    if (!$error && empty($password)) {
        $error = TRUE;
        $msgerror = $page->lang('admin_login_error_password');
    }


    if ($error) {
        echo('0: '.$msgerror);
        return;
    } else {
        
        /****** sanitize param ********/
        
        $the_sanitaze = new sanitize();
        $email = $the_sanitaze->str_nohtml($email);
        $password = $the_sanitaze->str_nohtml($password);
        
        /******************************/

        if (!$user->login($email, md5($password)) ) echo('0: '.$page->lang('admin_login_error_incorrect'));
        else echo('1: Ok');
        return;
        
    }
?>