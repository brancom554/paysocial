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
        $cn = isset($_POST['cn']) ? (trim($_POST['cn'])) : '';
        $cn = $the_sanitaze->str_nohtml($cn);

        if (!$error && empty($cn)) {
            $error = TRUE;
            $msgerror = $this->lang('admin_categories_error_category'); 
        }
    }

    if ($theaction == 2) {
        $cn = isset($_POST['cn']) ? (trim($_POST['cn'])) : '';
        $cn = $the_sanitaze->str_nohtml($cn);
        
        $ic = isset($_POST['ic']) ? (trim($_POST['ic'])) : '';
        $ic = $the_sanitaze->int($ic);
        
        if (!$error && empty($cn)) {
            $error = TRUE;
            $msgerror = $this->lang('admin_categories_error_category'); 
        }
        if (!$error && empty($ic)) {
            $error = TRUE;
            $msgerror = 'Error.'; 
        }
    }

    if ($theaction == 3) {
        $ic = isset($_POST['ic']) ? (trim($_POST['ic'])) : '';
        $ic = $the_sanitaze->int($ic);

        if (!$error && empty($ic)) {
            $error = TRUE;
            $msgerror = 'Error.'; 
        }
    }

    if ($error) {
        echo('0: '.$msgerror);
        return;
    } else {
        if ($theaction == 1) {
            $codeCategory = codeUniqueInTable(11, 1, 'categories', 'code');
            $codeCategory = $the_sanitaze->str_nohtml($codeCategory, 11);
            $db1->query("INSERT INTO categories SET code='".$codeCategory."', category='".$cn."'");
            $msgreturn = $this->lang('admin_txt_msgok');
            echo('1: '.$msgreturn);
            return;
        }

        if ($theaction == 2) {
            $db1->query("UPDATE categories SET category='".$cn."' WHERE idcategory=".$ic." LIMIT 1");
            $msgreturn = $this->lang('admin_txt_msgok');
            echo('1: '.$msgreturn);
            return;
        }

        if ($theaction == 3) {
            $numprods = $db1->fetch_field("SELECT count(idproduct) FROM products WHERE idcategory=".$ic);
            if ($numprods > 0) {
                $msgreturn = $this->lang('admin_categories_error_delete');
                echo('0: '.$msgreturn);
                return;
            } else {
                $db1->query("DELETE FROM categories WHERE idcategory=".$ic." LIMIT 1");
                $msgreturn = $this->lang('admin_txt_msgok');
                echo('1: '.$msgreturn);
                return;
            }

        }

    }
?>