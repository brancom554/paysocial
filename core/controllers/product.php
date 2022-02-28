<?php
	$this->loadLanguage('strings.php');

	$D->codProduct = '';
	if ($this->param('p')) $D->codProduct = $this->param('p');
	else $this->redirect('products');
    
    /****** sanitize param ********/
    
    if (strlen($D->codProduct) > 11) $this->redirect('products');
    
    $the_sanitaze = new sanitize();
    $D->codProduct = $the_sanitaze->str_nohtml($D->codProduct, 11);
    
    /******************************/

	$r = $db1->query("SELECT * FROM products WHERE code='".$D->codProduct."'");
	
	if ($obj = $db1->fetch_object($r)) {
		$D->idproduct = $obj->idproduct;
		$D->imageproduct = $obj->imageproduct;
		$D->titleproduct = stripslashes($obj->title);
		$D->descriptionproduct = stripslashes(str_replace(PHP_EOL, '<br/>',$obj->description));
		$D->idsocialpay = $obj->idsocialpay;
		$D->ikey = $obj->ikey;
		$D->type_product = $obj->type_product;
		$D->fileproduct = $obj->fileproduct;
		$D->linkproduct = $obj->linkproduct;
		$D->numviews = $obj->numviews == 0 ? 1 : $obj->numviews;
		$D->numactionsok = $obj->numactionsok;
		$D->idcategory = $obj->idcategory;
		$D->prev_download = $obj->prev_download;
		$D->last_download = $obj->last_download;
		$D->prev_view = $obj->prev_view;
		$D->last_view = $obj->last_view;
	} else $this->redirect('products');
	
	$D->URL_PRODUCT = $K->SITE_URL.'product/p:'.$D->codProduct;

	$D->page_title = $D->titleproduct.' | '.$this->lang('home_title_page', array('[SITE_TITLE]'=>$K->SITE_TITLE));
	$D->fontGoogle = "<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>";

	$D->colortheme = $K->THEME_COLOR;
		
	$info_header = array(
		'page_title' => $D->page_title,
		'html_class' => '',
		'body_class' => '',
		'header_data' => $D->fontGoogle
	);
	
	$screen = new template( $info_header, 'inside_layout' );
	
	$D->opcSelected = 0;
	
    /**************************************************************/    
    
    $screen->layout->useBlock('top-inside');

    $the_html = $this->load_single_block('_top-inside.php',FALSE);

    $screen->layout->block->setVar('info_top_inside', $the_html);

    $screen->layout->block->save('top_content');

    /**************************************************************/

    $D->showSocialPay = FALSE;
    if (isset($_COOKIE['k_ss_'.$K->ID_COOKIE.'_downloads'])) {
        $valuesInCookie = $_COOKIE['k_ss_'.$K->ID_COOKIE.'_downloads'];
        if (empty($valuesInCookie)) $D->showSocialPay = TRUE;
        else {
            if (findStr($valuesInCookie, $D->idproduct, ';') == 0) $D->showSocialPay = TRUE;
        }	
    } else {
        $time = time()+ 60*60*24*365*10;
        setcookie('k_ss_'.$K->ID_COOKIE.'_downloads', '', $time, '/');
        $D->showSocialPay = TRUE;
    }
    
    if ($D->showSocialPay) {
        $r = $db1->query("SELECT * FROM socialpay WHERE idsocialpay=".$D->idsocialpay);
        if ($obj = $db1->fetch_object($r)) {
    
            $D->fb_like_available = $obj->fb_like_available;
            $D->fb_like_url = empty($obj->fb_like_url) ? $D->URL_PRODUCT : $obj->fb_like_url;
            
            $D->gplus_available = $obj->gplus_available;
            $D->gplus_url = empty($obj->gplus_url) ? $D->URL_PRODUCT : $obj->gplus_url;
    
            $D->tw_tweet_available = $obj->tw_tweet_available;
            $D->tw_tweet_url = empty($obj->tw_tweet_url) ? $D->URL_PRODUCT : $obj->tw_tweet_url;
            $D->tw_tweet_tweet = $obj->tw_tweet_tweet;
            $D->tw_tweet_tweet = empty($obj->tw_tweet_tweet) ? $D->titleproduct : $obj->tw_tweet_url;
            
            $D->fb_share_available = $obj->fb_share_available;
            $D->fb_share_url = empty($obj->fb_share_url) ? $D->URL_PRODUCT : $obj->fb_share_url;
            $D->fb_share_caption = $obj->fb_share_caption;
            $D->fb_share_description = $obj->fb_share_description;
            
            $D->tw_follow_available = $obj->tw_follow_available;
            $D->tw_follow_url = $obj->tw_follow_url;
    
            $D->in_share_available = $obj->in_share_available;
            $D->in_share_url = empty($obj->in_share_url) ? $D->URL_PRODUCT : $obj->in_share_url;
            
        }
    }
	
	/**************************************************************/

	$screen->layout->useBlock('product');
	
	$the_html = '<img src="'.$K->STORAGE_THUMBNAIL_URL.'thumb1/'.$D->imageproduct.'" class="img-responsive">';
	$screen->layout->block->setVar('one_product_image', $the_html);

	$the_html = $this->load_single_block('_prod-area-infobasic.php',FALSE);		
	$screen->layout->block->setVar('one_product_info_basic', $the_html);
    
    $theCodeAds = $pivot->getAds('AD_BLOCK_7');
    if (!empty($theCodeAds)) {
        $theCodeAds = '<div id="ads-in-product-01">'.stripslashes($theCodeAds).'</div>';
        $screen->layout->block->setVar('product_ads_1', $theCodeAds);
    }

    $theCodeAds = $pivot->getAds('AD_BLOCK_8');
    if (!empty($theCodeAds)) {
        $theCodeAds = '<div id="ads-in-product-02">'.stripslashes($theCodeAds).'</div>';
        $screen->layout->block->setVar('product_ads_2', $theCodeAds);
    }

    $theCodeAds = $pivot->getAds('AD_BLOCK_9');
    if (!empty($theCodeAds)) {
        $theCodeAds = '<div id="ads-in-product-03">'.stripslashes($theCodeAds).'</div>';
        $screen->layout->block->setVar('product_ads_3', $theCodeAds);
    }

	$the_html = $D->titleproduct;
	$screen->layout->block->setVar('one_product_title', $the_html);
	$the_html = $D->descriptionproduct;
	$screen->layout->block->setVar('one_product_description', $the_html);

	$the_html = $this->load_single_block('_prod-area-paysocial.php',FALSE);		
	$screen->layout->block->setVar('one_product_socialpay', $the_html);

	$the_html = $this->load_single_block('_prod-area-info-downloads.php',FALSE);		
	$screen->layout->block->setVar('one_product_moreinfo_01', $the_html);

	$the_html = $this->load_single_block('_prod-area-info-views.php',FALSE);		
	$screen->layout->block->setVar('one_product_moreinfo_02', $the_html);
	
	$screen->layout->block->save('main_content');

	/**************************************************************/
	
	$screen->layout->useBlock('foot');

	$the_html = $this->load_single_block('_foot.php',FALSE);
	$screen->layout->block->setVar('foot_info', $the_html);

	$screen->layout->block->save('foot_content');
	
	/**************************************************************/
	
	$screen->display();
    
    $pivot->countViewProduct($D->idproduct);
?>