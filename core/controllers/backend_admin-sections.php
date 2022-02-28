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

    if ($theaction == 1 || $theaction == 2 || $theaction == 3 || $theaction == 4 || $theaction == 5) {
        $shtml = isset($_POST['shtml']) ? ($the_sanitaze->str_nohtml(trim($db1->e($_POST['shtml'])))) : '';

        if (!$error && empty($shtml)) {
            $error = TRUE;
            $msgerror = $this->lang('admin_sections_error_notext'); 
        }
    }

    if ($error) {
        echo('0: '.$msgerror);
        return;
    } else {
        switch ($theaction) {
            case 1:
                $db1->query("UPDATE sections SET texthtml='".$shtml."' WHERE section='about' LIMIT 1");
                break;
            case 2:
                $db1->query("UPDATE sections SET texthtml='".$shtml."' WHERE section='privacy' LIMIT 1");
                break;
            case 3:
                $db1->query("UPDATE sections SET texthtml='".$shtml."' WHERE section='termsofuse' LIMIT 1");
                break;
            case 4:
                $db1->query("UPDATE sections SET texthtml='".$shtml."' WHERE section='disclaimer' LIMIT 1");
                break;
            case 5:
                $db1->query("UPDATE sections SET texthtml='".$shtml."' WHERE section='contact' LIMIT 1");
                break;
        }

        $msgreturn = $this->lang('admin_txt_msgok');
        echo('1: '.$msgreturn);
        return;

    }
?>