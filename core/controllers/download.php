<?php
    // INIT SANITAZE, for protection of params.
    $the_sanitaze = new sanitize();
    
    $ikey = '';
    if ($this->param('i')) $ikey = $db1->e($this->param('i'));
    else $this->redirect($K->SITE_URL.'products');
    
    /****** sanitize param ********/
    
    if (strlen($ikey) > 15) $this->redirect('products');
    
    $the_sanitaze = new sanitize();
    $ikey = $the_sanitaze->str_nohtml($ikey, 15);
    
    /******************************/

    $r = $db1->query("SELECT idproduct, code, fileproduct FROM products WHERE IKEY='".$ikey."' LIMIT 1", FALSE);

    if (!$obj = $db1->fetch_object($r)) $this->redirect($K->SITE_URL.'products');
    else {

        $valuesInCookie = $_COOKIE['k_ss_'.$K->ID_COOKIE.'_downloads'];

        if (findStr($valuesInCookie , $obj->idproduct, ';') == 0) $this->redirect($K->SITE_URL.'product/p:'.$obj->code);

        $fileProduct = $obj->fileproduct;
        $dirFiles = $K->STORAGE_FILES_DIR;
        $basenameFile = basename($fileProduct);
        $theFile = $dirFiles.$basenameFile;
        $type = '';
        if (is_file($theFile)) {
            $size = filesize($theFile);
            if (function_exists('mime_content_type')) $type = mime_content_type($theFile);
            else if (function_exists('finfo_file')) {
                $info = finfo_open(FILEINFO_MIME);
                $type = finfo_file($info, $theFile);
                finfo_close($info);
            }
            if ($type == '') $type = "application/force-download";
            // Define headers
            header("Content-Type: $type");
            header("Content-Disposition: attachment; filename=$basenameFile");
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: " . $size);
            // Download file
            readfile($theFile);
        } else $this->redirect($K->SITE_URL.'products');

    }
?>