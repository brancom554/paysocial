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

        $fblike_available = $gplus_available = $twtweet_available = $fbshare_available = $twfollow_available = $lkshare_available = 0;
        $spname = isset($_POST['spname']) ? ($db1->e(htmlspecialchars(trim($_POST['spname'])))) : '';
        $fblike_available = isset($_POST['fblike_available']) ? ($the_sanitaze->int(trim($_POST['fblike_available']))) : '';
        $fblike_url = isset($_POST['fblike_url']) ? ($db1->e(htmlspecialchars(trim($_POST['fblike_url'])))) : '';
        $gplus_available = isset($_POST['gplus_available']) ? ($the_sanitaze->int(trim($_POST['gplus_available']))) : '';
        $gplus_url = isset($_POST['gplus_url']) ? ($db1->e(htmlspecialchars(trim($_POST['gplus_url'])))) : '';
        $twtweet_available = isset($_POST['twtweet_available']) ? ($the_sanitaze->int(trim($_POST['twtweet_available']))) : '';                
        $twtweet_url = isset($_POST['twtweet_url']) ? ($db1->e(htmlspecialchars(trim($_POST['twtweet_url'])))) : '';
        $twtweet_tweet = isset($_POST['twtweet_tweet']) ? ($db1->e(htmlspecialchars(trim($_POST['twtweet_tweet'])))) : '';
        $fbshare_available = isset($_POST['fbshare_available']) ? ($the_sanitaze->int(trim($_POST['fbshare_available']))) : '';
        $fbshare_url = isset($_POST['fbshare_url']) ? ($db1->e(htmlspecialchars(trim($_POST['fbshare_url'])))) : '';
        $twfollow_available = isset($_POST['twfollow_available']) ? ($the_sanitaze->int(trim($_POST['twfollow_available']))) : '';
        $twfollow_url = isset($_POST['twfollow_url']) ? ($db1->e(htmlspecialchars(trim($_POST['twfollow_url'])))) : '';
        $lkshare_available = isset($_POST['lkshare_available']) ? ($the_sanitaze->int(trim($_POST['lkshare_available']))) : '';
        $lkshare_url = isset($_POST['lkshare_url']) ? ($db1->e(htmlspecialchars(trim($_POST['lkshare_url'])))) : '';

        if (!$error && empty($spname)) {
            $error = TRUE;
            $msgerror = $this->lang('admin_socialpay_error_name'); 
        }

        if (!$error && !is_numeric($fblike_available)) {
            $error = TRUE;
            $msgerror = 'Error...'; 
        }

        if (!$error && !is_numeric($gplus_available)) {
            $error = TRUE;
            $msgerror = 'Error...'; 
        }

        if (!$error && !is_numeric($twtweet_available)) {
            $error = TRUE;
            $msgerror = 'Error...'; 
        }

        if (!$error && !is_numeric($fbshare_available)) {
            $error = TRUE;
            $msgerror = 'Error...'; 
        }

        if (!$error && !is_numeric($twfollow_available)) {
            $error = TRUE;
            $msgerror = 'Error...'; 
        }

        if (!$error && !is_numeric($lkshare_available)) {
            $error = TRUE;
            $msgerror = 'Error...'; 
        }

    }

    if ($theaction == 2) {

        $idsp = $fblike_available = $gplus_available = $twtweet_available = $fbshare_available = $twfollow_available = $lkshare_available = 0;
        $idsp = isset($_POST['idsp']) ? (trim($_POST['idsp'])) : '';
        $spname = isset($_POST['spname']) ? ($db1->e(htmlspecialchars(trim($_POST['spname'])))) : '';
        $fblike_available = isset($_POST['fblike_available']) ? ($the_sanitaze->int(trim($_POST['fblike_available']))) : '';
        $fblike_url = isset($_POST['fblike_url']) ? ($db1->e(htmlspecialchars(trim($_POST['fblike_url'])))) : '';
        $gplus_available = isset($_POST['gplus_available']) ? ($the_sanitaze->int(trim($_POST['gplus_available']))) : '';
        $gplus_url = isset($_POST['gplus_url']) ? ($db1->e(htmlspecialchars(trim($_POST['gplus_url'])))) : '';
        $twtweet_available = isset($_POST['twtweet_available']) ? ($the_sanitaze->int(trim($_POST['twtweet_available']))) : '';
        $twtweet_url = isset($_POST['twtweet_url']) ? ($db1->e(htmlspecialchars(trim($_POST['twtweet_url'])))) : '';
        $twtweet_tweet = isset($_POST['twtweet_tweet']) ? ($db1->e(htmlspecialchars(trim($_POST['twtweet_tweet'])))) : '';
        $fbshare_available = isset($_POST['fbshare_available']) ? ($the_sanitaze->int(trim($_POST['fbshare_available']))) : '';
        $fbshare_url = isset($_POST['fbshare_url']) ? ($db1->e(htmlspecialchars(trim($_POST['fbshare_url'])))) : '';
        $twfollow_available = isset($_POST['twfollow_available']) ? ($the_sanitaze->int(trim($_POST['twfollow_available']))) : '';
        $twfollow_url = isset($_POST['twfollow_url']) ? ($db1->e(htmlspecialchars(trim($_POST['twfollow_url'])))) : '';
        $lkshare_available = isset($_POST['lkshare_available']) ? ($the_sanitaze->int(trim($_POST['lkshare_available']))) : '';
        $lkshare_url = isset($_POST['lkshare_url']) ? ($db1->e(htmlspecialchars(trim($_POST['lkshare_url'])))) : '';

        if (!$error && (!is_numeric($idsp) || $idsp <= 0)) {
            $error = TRUE;
            $msgerror = 'Error...'; 
        }

        if (!$error && empty($spname)) {
            $error = TRUE;
            $msgerror = $this->lang('admin_socialpay_error_name'); 
        }

        if (!$error && !is_numeric($fblike_available)) {
            $error = TRUE;
            $msgerror = 'Error...'; 
        }

        if (!$error && !is_numeric($gplus_available)) {
            $error = TRUE;
            $msgerror = 'Error...'; 
        }

        if (!$error && !is_numeric($twtweet_available)) {
            $error = TRUE;
            $msgerror = 'Error...'; 
        }

        if (!$error && !is_numeric($fbshare_available)) {
            $error = TRUE;
            $msgerror = 'Error...'; 
        }

        if (!$error && !is_numeric($twfollow_available)) {
            $error = TRUE;
            $msgerror = 'Error...'; 
        }

        if (!$error && !is_numeric($lkshare_available)) {
            $error = TRUE;
            $msgerror = 'Error...'; 
        }

    }

    if ($theaction == 3) {

        $isp = isset($_POST['isp']) ? ($the_sanitaze->int(trim($_POST['isp']))) : '';

        if (!$error && !is_numeric($isp)) {
            $error = TRUE;
            $msgerror = 'Error.'; 
        }
    }

    if ($error) {
        echo('0: '.$msgerror);
        return;
    } else {
        if ($theaction == 1) {

            $codeSocialPay = codeUniqueInTable(11, 1, 'socialpay', 'code');
            $db1->query("INSERT INTO socialpay SET code='".$codeSocialPay."', name_socialpay='".$spname."', fb_like_available=".$fblike_available.", fb_like_url='".$fblike_url."', gplus_available=".$gplus_available.", gplus_url='".$gplus_url."', tw_tweet_available=".$twtweet_available.", tw_tweet_url='".$twtweet_url."', tw_tweet_tweet='".$twtweet_tweet."', fb_share_available=".$fbshare_available.", fb_share_url='".$fbshare_url."', fb_share_caption='', fb_share_description='', tw_follow_available=".$twfollow_available.", tw_follow_url='".$twfollow_url."', in_share_available=".$lkshare_available.", in_share_url='".$lkshare_url."', created='".time()."'");
            $msgreturn = $this->lang('admin_txt_msgok');
            echo('1: '.$msgreturn);
            return;
        }

        if ($theaction == 2) {

            $db1->query("UPDATE socialpay SET name_socialpay='".$spname."', fb_like_available=".$fblike_available.", fb_like_url='".$fblike_url."', gplus_available=".$gplus_available.", gplus_url='".$gplus_url."', tw_tweet_available=".$twtweet_available.", tw_tweet_url='".$twtweet_url."', tw_tweet_tweet='".$twtweet_tweet."', fb_share_available=".$fbshare_available.", fb_share_url='".$fbshare_url."', fb_share_caption='', fb_share_description='', tw_follow_available=".$twfollow_available.", tw_follow_url='".$twfollow_url."', in_share_available=".$lkshare_available.", in_share_url='".$lkshare_url."' WHERE idsocialpay=".$idsp);
            $msgreturn = $this->lang('admin_txt_msgok');
            echo('1: '.$msgreturn);
            return;

        }

        if ($theaction == 3) {

            $numsocialp = $db1->fetch_field("SELECT count(idproduct) FROM products WHERE idsocialpay=".$isp);
            if ($numsocialp > 0) {
                $msgreturn = $this->lang('admin_socialpay_error_delete');
                echo('0: '.$msgreturn);
                return;
            } else {
                $db1->query("DELETE FROM socialpay WHERE idsocialpay=".$isp." LIMIT 1");
                $msgreturn = $this->lang('admin_txt_msgok');
                echo('1: '.$msgreturn);
                return;
            }

        }

    }
?>