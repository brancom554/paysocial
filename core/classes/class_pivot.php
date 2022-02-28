<?php
class pivot 
{
    public function __construct() 
    {
        $this->user = & $GLOBALS['user'];
        $this->db1 = & $GLOBALS['db1'];
        $this->db2 = & $GLOBALS['db2'];
    }

    public function loadUp() 
    {
        $this->loadSettings();
    }

    public function loadSettings() 
    {
        global $K;
        $db = &$this->db1;
        $r = $db->query('SELECT * FROM settings', FALSE);
        while ($obj = $db->fetch_object($r)) {
            $K->{$obj->word} = stripslashes($obj->value);
        }

        $current_language = new stdClass;
        include($K->INCPATH.'languages/'.$K->LANGUAGE.'/language.php');
        setlocale(LC_ALL, $current_language->php_locale);
        $K->PHP_LOCALE = $current_language->php_locale;

        if (!isset($K->THEME)) $K->THEME = 'default';

        if( !isset($K->SITE_TITLE) || empty($K->SITE_TITLE) ) $K->SITE_TITLE = 'Social Store';
    }

    public function getUserbyId($uid, $force_refresh=FALSE) 
    {
        global $K;

        $uid = intval($uid);
        if (0 == $uid) return FALSE;

        $r = $this->db2->query('SELECT * FROM users WHERE iduser="'.$uid.'" LIMIT 1', FALSE);

        if ($o = $this->db2->fetch_object($r)) {
            $o->firtsname = stripslashes($o->firstname);
            $o->lastname = stripslashes($o->lastname);
            return $o;
        }
        return FALSE;
    }

    public function getCategoryName($idcategory) 
    {
        $category = $this->db2->fetch_field('SELECT category FROM categories WHERE idcategory='.$idcategory.' LIMIT 1', FALSE);
        return $category;
    }

    public function getSocialPayinProduct($idproduct) 
    {
        global $K;
        $idsocialpay = $this->db2->fetch_field("SELECT idsocialpay FROM products WHERE idproduct=".$idproduct);

        $r = $this->db2->query("SELECT fb_like_available, gplus_available, tw_tweet_available, fb_share_available, tw_follow_available, in_share_available FROM socialpay WHERE idsocialpay=".$idsocialpay);

        $cadReturn = '';
        if ($obj = $this->db2->fetch_object($r)) {
            if ($obj->fb_like_available == 1) {
                $cadReturn = $cadReturn.'<span class="iconsocial"><img src="'.$K->BASE_URL.'images/fb-like-icon.png"></span>';
            }
            if ($obj->gplus_available == 1) {
                $cadReturn = $cadReturn.'<span class="iconsocial"><img src="'.$K->BASE_URL.'images/gplus-icon.png"></span>';
            }
            if ($obj->tw_tweet_available == 1) {
                $cadReturn = $cadReturn.'<span class="iconsocial"><img src="'.$K->BASE_URL.'images/tw-tweet-icon.png"></span>';
            }
            if ($obj->fb_share_available == 1) {
                $cadReturn = $cadReturn.'<span class="iconsocial"><img src="'.$K->BASE_URL.'images/fb-share-icon.png"></span>';
            }
            if ($obj->tw_follow_available == 1) {
                $cadReturn = $cadReturn.'<span class="iconsocial"><img src="'.$K->BASE_URL.'images/tw-follow-icon.png"></span>';
            }
            if ($obj->in_share_available == 1) {
                $cadReturn = $cadReturn.'<span class="iconsocial"><img src="'.$K->BASE_URL.'images/lk-icon.png"></span>';
            }
        }

        return $cadReturn;
    }

    public function getRecentsForHome($quantity)
    {
        $o = $this->db2->fetch_all("SELECT * FROM products WHERE status=1 ORDER BY idproduct DESC LIMIT ".$quantity);
        return $o;
    }

    public function getProductsMostViewed($quantity)
    {
        $o = $this->db2->fetch_all("SELECT * FROM products WHERE status=1 ORDER BY numviews DESC LIMIT ".$quantity);
        return $o;
    }

    public function getProductsTopList($quantity)
    {
        $o = $this->db2->fetch_all("SELECT * FROM products WHERE status=1 ORDER BY numactionsok DESC LIMIT ".$quantity);
        return $o;
    }
    
    public function countViewProduct($idproduct)
    {
        $myMark = "k_ss_v_prod_".$idproduct;
        $valueMark = $idproduct;
        if (!isset($_COOKIE[$myMark])) {
            $this->db2->query("UPDATE products SET numviews=numviews+1, prev_view=last_view, last_view='".time()."' WHERE idproduct=".$idproduct);
            setcookie($myMark, $valueMark, time() + 3600 * 3); //duration cookie 3 hours
        }
    }
    
    public function getAds($theAds)
    {
        $codeAds = $this->db2->fetch_field("SELECT value FROM settings WHERE word='".$theAds."'");
        return $codeAds;
    }
}
?>