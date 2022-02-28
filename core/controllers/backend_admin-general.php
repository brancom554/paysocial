<?php
    $page = & $GLOBALS['page'];

    $page->loadLanguage('strings.php');

    if (!$this->user->is_logged || !$this->user->info->is_admin) {
        echo('0: '.$this->lang('admin_no_session'));
        die();
    }
    
    $the_sanitaze = new sanitize(); // init sanitaze

    $error = FALSE;

    $theaction=0;

    if (isset($_POST["theaction"]) && $_POST["theaction"] != '') {
        $theaction = $db1->e($_POST["theaction"]);
        $theaction = $the_sanitaze->int($theaction);
    }
    
    if (!is_numeric($theaction)) {
        $error = TRUE;
        $msgerror = 'Error. ';
        echo('0: '.$msgerror);
        die();
    }

    if ($theaction == 1) {
        $tt = isset($_POST['tt']) ? ($the_sanitaze->str_nohtml(trim($_POST['tt']))) : '';
        $dd = isset($_POST['dd']) ? ($the_sanitaze->str_nohtml(trim($_POST['dd']))) : '';
        $kk = isset($_POST['kk']) ? ($the_sanitaze->str_nohtml(trim($_POST['kk']))) : '';
        $cc= isset($_POST['cc']) ? ($the_sanitaze->str_nohtml(trim($_POST['cc']))) : '';
        $yfb = isset($_POST['yfb']) ? ($the_sanitaze->str_nohtml(trim($_POST['yfb']))) : '';
        $ytw = isset($_POST['ytw']) ? ($the_sanitaze->str_nohtml(trim($_POST['ytw']))) : '';
        $yyt= isset($_POST['yyt']) ? ($the_sanitaze->str_nohtml(trim($_POST['yyt']))) : '';

        if (!$error && empty($tt)) {
            $error = TRUE;
            $msgerror = $this->lang('admin_general_error_title'); 
        }
        if (!$error && empty($dd)) {
            $error = TRUE;
            $msgerror = $this->lang('admin_general_error_description'); 
        }
        if (!$error && empty($kk)) {
            $error = TRUE;
            $msgerror = $this->lang('admin_general_error_keywords'); 
        }
        if (!$error && empty($cc)) {
            $error = TRUE;
            $msgerror = $this->lang('admin_general_error_company'); 
        }
    }

    if ($theaction == 2) {
        $ct = isset($_POST['ct']) ? ($the_sanitaze->str_nohtml(trim($_POST['ct']))) : '';
        $ll = isset($_POST['ll']) ? ($the_sanitaze->str_nohtml(trim($_POST['ll']))) : '';

        if (!$error && empty($ct)) {
            $error = TRUE;
            $msgerror = $this->lang('admin_general_error_color'); 
        }
        if (!$error && empty($ll)) {
            $error = TRUE;
            $msgerror = $this->lang('admin_general_error_language'); 
        }
    }

    if ($theaction == 3) {
        $qp = isset($_POST['qp']) ? ($the_sanitaze->int(trim($_POST['qp']))) : '';
        $qm = isset($_POST['qm']) ? ($the_sanitaze->int(trim($_POST['qm']))) : '';
        $qt = isset($_POST['qt']) ? ($the_sanitaze->int(trim($_POST['qt']))) : '';

        if (!$error && $qp <= 0) {
            $error = TRUE;
            $msgerror = $this->lang('admin_general_error_qproducts'); 
        }
        if (!$error && $qm <= 0) {
            $error = TRUE;
            $msgerror = $this->lang('admin_general_error_qmostviewed'); 
        }
        if (!$error && $qt <= 0) {
            $error = TRUE;
            $msgerror = $this->lang('admin_general_error_qtoplist'); 
        }
    }

    if ($theaction == 4) {
        $fid = isset($_POST['fid']) ? ($the_sanitaze->str_nohtml(trim($_POST['fid']))) : '';

        if (!$error && empty($fid)) {
            $error = TRUE;
            $msgerror = $this->lang('admin_general_error_fbid'); 
        }
    }

    if ($error) {
        echo('0: '.$msgerror);
        return;
    } else {
        if ($theaction == 1) {
            $db1->query("UPDATE settings SET value='".$tt."' WHERE word='SITE_TITLE' LIMIT 1");
            $db1->query("UPDATE settings SET value='".$dd."' WHERE word='SITE_DESCRIPTION' LIMIT 1");
            $db1->query("UPDATE settings SET value='".$kk."' WHERE word='SITE_KEYWORDS' LIMIT 1");
            $db1->query("UPDATE settings SET value='".$cc."' WHERE word='COMPANY' LIMIT 1");
            $db1->query("UPDATE settings SET value='".$yfb."' WHERE word='MY_FACEBOOK' LIMIT 1");
            $db1->query("UPDATE settings SET value='".$ytw."' WHERE word='MY_TWITTER' LIMIT 1");
            $db1->query("UPDATE settings SET value='".$yyt."' WHERE word='MY_YOUTUBE' LIMIT 1");
            $msgreturn = $this->lang('admin_txt_msgok');
            echo('1: '.$msgreturn);
            return;
        }

        if ($theaction == 2) {
            $db1->query("UPDATE settings SET value='".$ct."' WHERE word='THEME_COLOR' LIMIT 1");
            $db1->query("UPDATE settings SET value='".$ll."' WHERE word='LANGUAGE' LIMIT 1");
            $msgreturn = $this->lang('admin_txt_msgok');
            echo('1: '.$msgreturn);
            return;
        }

        if ($theaction == 3) {
            $db1->query("UPDATE settings SET value='".$qp."' WHERE word='PRODUCTS_PER_PAGE' LIMIT 1");
            $db1->query("UPDATE settings SET value='".$qm."' WHERE word='MOSTVIEWED_PER_PAGE' LIMIT 1");
            $db1->query("UPDATE settings SET value='".$qt."' WHERE word='TOPLIST_PER_PAGE' LIMIT 1");
            $msgreturn = $this->lang('admin_txt_msgok');
            echo('1: '.$msgreturn);
            return;
        }

        if ($theaction == 4) {
            $db1->query("UPDATE settings SET value='".$fid."' WHERE word='FACEBOOK_ID' LIMIT 1");
            $msgreturn = $this->lang('admin_txt_msgok');
            echo('1: '.$msgreturn);
            return;
        }

        if ($theaction == 5) {
            $theIDcookie = trim(time()-(60*60*24*30*12*45));
            $db1->query("UPDATE settings SET value='".$theIDcookie."' WHERE word='ID_COOKIE' LIMIT 1");
            $msgreturn = $this->lang('admin_general_idcookie_msgok');
            echo('1: '.$msgreturn);
            return;
        }
    }
?>