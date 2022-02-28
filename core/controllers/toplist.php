<?php
	$this->loadLanguage('strings.php');

	$D->page_title = $this->lang('home_title_page', array('[SITE_TITLE]'=>$K->SITE_TITLE));
	$D->fontGoogle = "<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>";

	$D->colortheme = $K->THEME_COLOR;
		
	$info_header = array(
		'page_title' => $D->page_title,
		'html_class' => '',
		'body_class' => '',
		'header_data' => $D->fontGoogle
	);
	
	$screen = new template( $info_header, 'inside_layout' );
	
	$D->opcSelected = 4;
	
    /**************************************************************/    
    
    $screen->layout->useBlock('top-inside');

    $the_html = $this->load_single_block('_top-inside.php',FALSE);

    $screen->layout->block->setVar('info_top_inside', $the_html);

    $screen->layout->block->save('top_content');

    /**************************************************************/
	
	$D->prods = $pivot->getProductsTopList($K->TOPLIST_PER_PAGE);

	$screen->layout->useBlock('toplist');
	
	$the_html = $this->lang('toplist_title');
	$screen->layout->block->setVar('toplist_title', $the_html);
	
	$the_html = $this->load_single_block('_prods-in-squares.php',FALSE);
	$screen->layout->block->setVar('toplist_products', $the_html);
    
    $theCodeAds = $pivot->getAds('AD_BLOCK_3');
    if (!empty($theCodeAds)) {
        $theCodeAds = '<div id="ads-in-toplist-top">'.stripslashes($theCodeAds).'</div>';
        $screen->layout->block->setVar('toplist_ads_top', $theCodeAds);
    }

    $theCodeAds = $pivot->getAds('AD_BLOCK_4');
    if (!empty($theCodeAds)) {
        $theCodeAds = '<div id="ads-in-toplist-bottom">'.stripslashes($theCodeAds).'</div>';
        $screen->layout->block->setVar('toplist_ads_bottom', $theCodeAds);
    }
	
	$screen->layout->block->save('main_content');

	/**************************************************************/
	
	$screen->layout->useBlock('foot');

	$the_html = $this->load_single_block('_foot.php',FALSE);
	$screen->layout->block->setVar('foot_info', $the_html);

	$screen->layout->block->save('foot_content');
	
	/**************************************************************/
	
	$screen->display();
?>