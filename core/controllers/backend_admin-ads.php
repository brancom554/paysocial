<?php
    $this->loadLanguage('strings.php');

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

    if ($theaction == 1 || $theaction == 2 || $theaction == 3) {
        $codeads1 = isset($_POST['codeads1']) ? (trim($db1->e($_POST['codeads1']))) : '';
        $codeads2 = isset($_POST['codeads2']) ? (trim($db1->e($_POST['codeads2']))) : '';
    }

    if ($theaction == 4) {
        $codeads1 = isset($_POST['codeads1']) ? (trim($db1->e($_POST['codeads1']))) : '';
        $codeads2 = isset($_POST['codeads2']) ? (trim($db1->e($_POST['codeads2']))) : '';
        $codeads3 = isset($_POST['codeads3']) ? (trim($db1->e($_POST['codeads3']))) : '';
    }

    if ($error) {
        echo('0: '.$msgerror);
        return;
    } else {
        switch ($theaction) {
            case 1:
                $db1->query("UPDATE settings SET value='".$codeads1."' WHERE word='AD_BLOCK_1' LIMIT 1");
                $db1->query("UPDATE settings SET value='".$codeads2."' WHERE word='AD_BLOCK_2' LIMIT 1");
                break;
            case 2:
                $db1->query("UPDATE settings SET value='".$codeads1."' WHERE word='AD_BLOCK_3' LIMIT 1");
                $db1->query("UPDATE settings SET value='".$codeads2."' WHERE word='AD_BLOCK_4' LIMIT 1");
                break;
            case 3:
                $db1->query("UPDATE settings SET value='".$codeads1."' WHERE word='AD_BLOCK_5' LIMIT 1");
                $db1->query("UPDATE settings SET value='".$codeads2."' WHERE word='AD_BLOCK_6' LIMIT 1");
                break;
            case 4:
                $db1->query("UPDATE settings SET value='".$codeads1."' WHERE word='AD_BLOCK_7' LIMIT 1");
                $db1->query("UPDATE settings SET value='".$codeads2."' WHERE word='AD_BLOCK_8' LIMIT 1");
                $db1->query("UPDATE settings SET value='".$codeads3."' WHERE word='AD_BLOCK_9' LIMIT 1");
                break;
        }

        $msgreturn = $this->lang('admin_txt_msgok');
        echo('1: '.$msgreturn);
        return;

    }
?>