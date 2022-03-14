<?php
    $this->loadLanguage('strings.php');
    ini_set('memory_limit','256M');
    ini_set('display_errors',E_ALL);
    if ($this->user->is_logged && $this->user->info->is_admin) {

        $the_sanitaze = new sanitize(); // init sanitaze

        $error = FALSE;

        $pcategory = $socialpay = $ptype = 0;
        $productname = $pdescription = $plink = '';
        if (isset($_POST["pcategory"]) && $_POST["pcategory"] != 0) {
            $pcategory = $db1->e($_POST["pcategory"]);
            $pcategory = $the_sanitaze->int($pcategory);
        }

        if (isset($_POST["productname"]) && $_POST["productname"] != '') {
            $productname = $db1->e(htmlspecialchars($_POST["productname"]));
            $productname = $the_sanitaze->str_nohtml($productname);
        }

        if (isset($_POST["pdescription"]) && $_POST["pdescription"] != '') {
            $pdescription = $db1->e(htmlspecialchars($_POST["pdescription"]));
            $pdescription = $the_sanitaze->str_nohtml($pdescription);
        }

        if (isset($_POST["socialpay"]) && $_POST["socialpay"] != 0) {
            $socialpay = $db1->e($_POST["socialpay"]);
            $socialpay = $the_sanitaze->int($socialpay);
        }

        if (isset($_POST["ptype"]) && $_POST["ptype"] != 0) {
            $ptype = $db1->e($_POST["ptype"]);
            $ptype = $the_sanitaze->int($ptype);
        }

        if (isset($_POST["plink"]) && $_POST["plink"] != '') {
            $plink = $db1->e($_POST["plink"]);
            $plink = $the_sanitaze->str_nohtml($plink);
        }

        $codeProduct = codeUniqueInTable(11, 1, 'products', 'code');
        $codeProduct = $the_sanitaze->str_nohtml($codeProduct, 11);

        $ikey = codeUniqueInTable(15, 1, 'products', 'ikey');
        $ikey = $the_sanitaze->str_nohtml($ikey, 15);
            
        $theimage = '';
        // upload photo product
        $imgproduct = $_FILES['imgproduct'];
        if ($imgproduct['name']) {
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
                $theimage = $codeProduct.$extens;

            } else {
                $error = TRUE;
                $msgreturn = $this->lang('admin_products_error_formatimage').': '.$imgproduct['name'];
            }

            if ($error == FALSE) {

                $folderthumbnail = $K->STORAGE_THUMBNAIL_DIR;

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

                $thumbnail->close();

            }

        } else {
            $error = TRUE;
            $msgreturn = $this->lang('admin_products_error_image');
        }
        $thefile = '';
        if ($error == FALSE && $ptype == 2) {
            $folderfiles = $K->STORAGE_FILES_DIR;

            $fileproduct = $_FILES['fileproduct'];
            $tmpfile = $fileproduct['tmp_name'];
            $namefile = $fileproduct['name'];
            $trozos = explode(".", $namefile);
            $extens = end($trozos);

            $thefile = $codeProduct.'.'.$extens;

            move_uploaded_file($tmpfile, $folderfiles.$thefile);

            $plink = '';
        }
        if ($error == FALSE) {
            $db1->query("INSERT INTO products SET code='".$codeProduct."', idcategory=".$pcategory.", title='".$productname."', fileproduct='".$thefile."', linkproduct='".$plink."', imageproduct='".$theimage."', ikey='".$ikey."', type_product=".$ptype.", description='".$pdescription."', idsocialpay=".$socialpay.", created='".time()."'");
            $msgreturn = 'Ok.';
        }

        if ($error) $message = '0: '.$msgreturn;
        else $message = '1: '.$msgreturn;

    } else {
        $message = '0: '.$this->lang('admin_no_session');
    }
?>

<script language="javascript" type="text/javascript">
    window.top.window.endCreateP('<?php echo  $db1->e($message); ?>');
</script>
