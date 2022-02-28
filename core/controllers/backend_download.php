<?php
    $error = FALSE;

    $pcode = isset($_POST['pcode']) ? (trim($db1->e($_POST['pcode']))) : '';

    if (!$error && (empty($pcode) || strlen($pcode) != 11)) {
        $error = TRUE;
        $msgerror = 'Error.'; 
    }

    if ($error) {

        $msgreturn = 'Error';
        echo('0: '.$msgreturn);

    } else {
        
        /****** sanitize param ********/
        
        $the_sanitaze = new sanitize();
        $pcode = $the_sanitaze->str_nohtml($pcode, 11);
        
        /******************************/

        $r = $db1->query("SELECT idproduct, ikey FROM products WHERE code='".$pcode."' LIMIT 1", FALSE);

        if (!$obj = $db1->fetch_object($r)) {

            $msgreturn = 'Error';
            echo('0: '.$msgreturn);
            return;

        } else {

            $db1->query("UPDATE products SET numactionsok=numactionsok+1, prev_download=last_download, last_download='".time()."' WHERE code='".$pcode."' LIMIT 1", FALSE);

            $duration = time()+ 60*60*24*365*10;

            $valuesInCookie = $obj->idproduct;

            if (isset($_COOKIE['k_ss_'.$K->ID_COOKIE.'_downloads'])) {

                $valuesInCookie = $_COOKIE['k_ss_'.$K->ID_COOKIE.'_downloads'];

                if (!empty($valuesInCookie)) $valuesInCookie = $valuesInCookie .';'. $obj->idproduct;
            }

            setcookie('k_ss_'.$K->ID_COOKIE.'_downloads', $valuesInCookie, $duration, '/');

            $msgreturn = '' . $obj->ikey . '';

            echo('1: '.$msgreturn);
            return;

        }

    }

?>