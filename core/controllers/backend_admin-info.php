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

	if ($theaction == 1) {
		$fn = isset($_POST['fn']) ? ($the_sanitaze->str_nohtml(trim($_POST['fn']))) : '';
		$ln = isset($_POST['ln']) ? ($the_sanitaze->str_nohtml(trim($_POST['ln']))) : '';
		$em = isset($_POST['em']) ? ($the_sanitaze->str_nohtml(trim($_POST['em']))) : '';

        if (!$error && empty($fn)) {
            $error = TRUE;
            $msgerror = $this->lang('admin_sections_error_firstname'); 
        }
        if (!$error && empty($ln)) {
            $error = TRUE;
            $msgerror = $this->lang('admin_sections_error_lastname'); 
        }
        if (!$error && empty($em)) {
            $error = TRUE;
            $msgerror = $this->lang('admin_sections_error_email'); 
        }

    }

    if ($theaction == 2) {
        $cp = isset($_POST['cp']) ? ($the_sanitaze->str_nohtml(trim($_POST['cp']))) : '';
        $np = isset($_POST['np']) ? ($the_sanitaze->str_nohtml(trim($_POST['np']))) : '';

        if (!$error && empty($cp)) {
            $error = TRUE;
            $msgerror = $this->lang('admin_info_error_currentpass'); 
        }
        if (!$error && empty($np)) {
            $error = TRUE;
            $msgerror = $this->lang('admin_info_error_newpass'); 
        }
    }

    if ($error) {
        echo('0: '.$msgerror);
        return;
    } else {
        if ($theaction == 1) {
            $db1->query("UPDATE users SET firstname='".$fn."', lastname='".$ln."', email='".$em."' WHERE iduser=".$this->user->id.' LIMIT 1');
            $msgreturn = $this->lang('admin_txt_msgok');
            echo('1: '.$msgreturn);
            return;
        }

        if ($theaction == 2) {

            $thepass_in_db = $this->user->info->password;

            $pass_send = md5($cp);

            if ($pass_send == $thepass_in_db) {
                $db1->query("UPDATE users SET password='".md5($np)."' WHERE iduser=".$this->user->id." LIMIT 1");
                $msgreturn = $this->lang('admin_txt_msgok');
                echo('1: '.$msgreturn);
                return;
            } else {
                $msgreturn = $this->lang('admin_info_error_passincorrect');
                echo('0: '.$msgreturn);
                return;
            }

        }

    }
?>