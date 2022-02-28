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

        $ip = isset($_POST['ip']) ? ($the_sanitaze->int(trim($_POST['ip']))) : '';

        if (!$error && !is_numeric($ip)) {
            $error = TRUE;
            $msgerror = 'Error.'; 
        }
    }

    if ($theaction == 2) {

        $idp = isset($_POST['idp']) ? ($the_sanitaze->int(trim($_POST['idp']))) : '';
        $pc = isset($_POST['pc']) ? ($the_sanitaze->int(trim($_POST['pc']))) : '';
        $pn = isset($_POST['pn']) ? (trim($db1->e(htmlspecialchars($_POST['pn'])))) : '';
        $pd = isset($_POST['pd']) ? (trim($db1->e(htmlspecialchars($_POST['pd'])))) : '';

        if (!$error && !is_numeric($idp)) {
            $error = TRUE;
            $msgerror = 'Error';
        }

        if (!$error && !is_numeric($pc)) {
            $error = TRUE;
            $msgerror = $this->lang('admin_products_error_category'); 
        }

        if (!$error && empty($pn)) {
            $error = TRUE;
            $msgerror = $this->lang('admin_products_error_name'); 
        }

        if (!$error && empty($pd)) {
            $error = TRUE;
            $msgerror = $this->lang('admin_products_error_description'); 
        }

    }

    if ($theaction == 3) {
        $idp = isset($_POST['idproductf']) ? ($the_sanitaze->int(trim($_POST['idproductf']))) : '';
        $codp = isset($_POST['codeproductf']) ? ($the_sanitaze->str_nohtml(trim($_POST['codeproductf']))) : '';

        if (!$error && !is_numeric($idp)) {
            $error = TRUE;
            $msgerror = 'Error';
        }

        if (!$error && strlen($codp)>11) {
            $error = TRUE;
            $msgerror = 'Error';
        }

        $imgproduct = $_FILES['imgproduct'];
        if (!$imgproduct['name']) {
            $error = TRUE;
            $msgerror = $this->lang('admin_products_error_image');
        }
    }

    if ($theaction == 4) {

        $idsp = isset($_POST['idsp']) ? ($the_sanitaze->int(trim($_POST['idsp']))) : '';
        $idp = isset($_POST['idp']) ? ($the_sanitaze->int(trim($_POST['idp']))) : '';

        if (!$error && !is_numeric($idp)) {
            $error = TRUE;
            $msgerror = 'Error';
        }

        if (!$error && !is_numeric($idsp)) {
            $error = TRUE;
            $msgerror = $thi->lang('admin_products_error_socialpay');
        }

    }

    if ($theaction == 5) {
        $idp = isset($_POST['idproductf2']) ? ($the_sanitaze->int(trim($_POST['idproductf2']))) : '';
        $codp = isset($_POST['codeproductf2']) ? ($the_sanitaze->str_nohtml(trim($_POST['codeproductf2']))) : '';
        $ptype = isset($_POST['ptype']) ? ($the_sanitaze->int(trim($_POST['ptype']))) : '';
        $plink = isset($_POST['plink']) ? ($the_sanitaze->str_nohtml(trim($_POST['plink']))) : '';

        if (!$error && !is_numeric($idp)) {
            $error = TRUE;
            $msgerror = 'Error';
        }

        if (!$error && empty($codp)) {
            $error = TRUE;
            $msgerror = 'Error';
        }

        if ($ptype == 2) {
            $fileproduct = $_FILES['fileproduct'];
            if (!$fileproduct['name']) {
                $error = TRUE;
                $msgerror = $this->lang('admin_products_error_thefile');
            }
        }
    }

    if ($error) {
        echo('0: '.$msgerror);
        return;
    } else {

        if ($theaction == 1) {

            $r = $db1->query('SELECT imageproduct, fileproduct, type_product FROM products WHERE idproduct='.$ip.' LIMIT 1', FALSE);

            if ($obj = $db1->fetch_object($r)) {
                $imageproduct = $obj->imageproduct;
                $fileproduct = $obj->fileproduct;
                $type_product = $obj->type_product;

                $db1->query("DELETE FROM products WHERE idproduct=".$ip);

                $folderfiles = $K->STORAGE_FILES_DIR;
                $folderthumbnail = $K->STORAGE_THUMBNAIL_DIR;

                if ($type_product == 2) {
                    if (file_exists($folderfiles.$fileproduct)) unlink($folderfiles.$fileproduct);
                }

                if (file_exists($folderthumbnail.$imageproduct)) unlink($folderthumbnail.$imageproduct);
                if (file_exists($folderthumbnail.'thumb1/'.$imageproduct)) unlink($folderthumbnail.'thumb1/'.$imageproduct);
                if (file_exists($folderthumbnail.'thumb2/'.$imageproduct)) unlink($folderthumbnail.'thumb2/'.$imageproduct);
                if (file_exists($folderthumbnail.'thumb3/'.$imageproduct)) unlink($folderthumbnail.'thumb3/'.$imageproduct);
                if (file_exists($folderthumbnail.'thumb4/'.$imageproduct)) unlink($folderthumbnail.'thumb4/'.$imageproduct);

                $msgreturn = $this->lang('admin_txt_msgok');
                echo('1: '.$msgreturn);
                return;

            } else {

                $msgreturn = $this->lang('admin_products_msg_delete_error');
                echo('0: '.$msgreturn);
                return;

            }
        }

        if ($theaction == 2) {

            $r = $db1->query("UPDATE products SET idcategory=".$pc.", title='".$pn."', description='".$pd."' WHERE idproduct=".$idp." LIMIT 1", FALSE);
            $msgreturn = $this->lang('admin_txt_msgok');
            echo('1: '.$msgreturn);
            return;

        }

        if ($theaction == 3) {

            $imgtype = $imgproduct['type'];
            if ($imgtype == "image/jpeg" || $imgtype == "image/gif" || $imgtype == "image/png") {
                switch ($imgtype) {
                    case "image/jpeg":
                        $extens = '.jpg';
                        break;
                    case "image/gif":
                        $extens = '.gif';
                        break;
                    case "image/png":
                        $extens = '.png';
                        break;
                }

                $tmpphoto = $imgproduct['tmp_name'];
                $theimage = $codp.$extens;

            } else {
                $error = TRUE;
                $msgreturn = $this->lang('admin_products_error_formatimage').': '.$imgproduct['name'];
            }

            if ($error == FALSE) {

                $folderthumbnail = $K->STORAGE_THUMBNAIL_DIR;

                $fileimagef = $db1->fetch_field('SELECT imageproduct FROM products WHERE idproduct='.$idp);

                if (file_exists($folderthumbnail.$fileimagef)) unlink($folderthumbnail.$fileimagef);
                if (file_exists($folderthumbnail.'thumb1/'.$fileimagef)) unlink($folderthumbnail.'thumb1/'.$fileimagef);
                if (file_exists($folderthumbnail.'thumb2/'.$fileimagef)) unlink($folderthumbnail.'thumb2/'.$fileimagef);
                if (file_exists($folderthumbnail.'thumb3/'.$fileimagef)) unlink($folderthumbnail.'thumb3/'.$fileimagef);
                if (file_exists($folderthumbnail.'thumb4/'.$fileimagef)) unlink($folderthumbnail.'thumb4/'.$fileimagef);

                move_uploaded_file($tmpphoto, $folderthumbnail.$theimage);

                $thumbnail = new SmartImage($folderthumbnail.$theimage, true);
                $thumbnail->resize($K->wThumb1, $K->hThumb1, true); 
                $thumbnail->saveImage($folderthumbnail.'thumb1/'.$theimage, $K->QUALITY_THUMBNAIL);

                $thumbnail = new SmartImage($folderthumbnail.$theimage, true);
                $thumbnail->resize($K->wThumb2, $K->hThumb2, true); 
                $thumbnail->saveImage($folderthumbnail.'thumb2/'.$theimage, $K->QUALITY_THUMBNAIL);

                $thumbnail = new SmartImage($folderthumbnail.$theimage, true);
                $thumbnail->resize($K->wThumb3, $K->hThumb3, true); 
                $thumbnail->saveImage($folderthumbnail.'thumb3/'.$theimage, $K->QUALITY_THUMBNAIL);

                $thumbnail = new SmartImage($folderthumbnail.$theimage, true);
                $thumbnail->resize($K->wThumb4, $K->hThumb4, true); 
                $thumbnail->saveImage($folderthumbnail.'thumb4/'.$theimage, $K->QUALITY_THUMBNAIL);

            }

            if ($error == FALSE) {

                $db1->query("UPDATE products SET imageproduct='".$theimage."' WHERE idproduct=".$idp);

                $msgreturn = $this->lang('admin_txt_msgok');

            }

            if ($error) $message = '0: '.$msgreturn;
            else $message = '1: '.$msgreturn;

            echo($message);
            return;

        }

        if ($theaction == 4) {

            $r = $db1->query("UPDATE products SET idsocialpay=".$idsp." WHERE idproduct=".$idp." LIMIT 1", FALSE);
            $msgreturn = $this->lang('admin_txt_msgok');
            echo('1: '.$msgreturn);
            return;

        }

        if ($theaction == 5) {

            $folderfiles = $K->STORAGE_FILES_DIR;

            $r = $db1->query('SELECT type_product, fileproduct FROM products WHERE idproduct='.$idp);
            if ($obj = $db1->fetch_object($r)) {
                $thetype = $obj->type_product;
                $thefile = $obj->fileproduct;
                if ($thetype == 2) if (file_exists($folderfiles.$thefile)) unlink($folderfiles.$thefile);
            }

            $thefile = '';
            if ($ptype == 2) {
                $tmpfile = $fileproduct['tmp_name'];
                $namefile = $fileproduct['name'];
                $trozos = explode(".", $namefile);
                $extens = end($trozos);
                $thefile = $codp.'.'.$extens;
                move_uploaded_file($tmpfile, $folderfiles.$thefile);
                $plink = '';
            }

            if ($error == FALSE) {
                $db1->query("UPDATE products SET fileproduct='".$thefile."', linkproduct='".$plink."', type_product=".$ptype." WHERE idproduct=".$idp);
                $msgreturn = $this->lang('admin_txt_msgok');
            }

            if ($error) $message = '0: '.$msgreturn;
            else $message = '1: '.$msgreturn;

            echo($message);
            return;

        }

    }
?>