<?php
    $this->loadLanguage('strings.php');

    $D->colortheme = $K->THEME_COLOR;

    $info_header = array(
        'page_title' => $this->lang('home_title_page', array('[SITE_TITLE]'=>$K->SITE_TITLE)),
        'html_class' => '',
        'body_class' => '',
        'header_data' => "<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>"
    );

    $screen = new template( $info_header, 'home_layout' );

    /**************************************************************/

    $screen->layout->useBlock('top-home');

    $screen->layout->block->setVar('code_js_init', "<script>var msg_error_conection = '".$this->lang('general_txt_cannotperform')."';</script>");

    $the_html = $this->load_single_block('_top-home.php',FALSE);

    $screen->layout->block->setVar('top_home_info', $the_html);

    $screen->layout->block->save('top_content_top');

    /**************************************************************/

    $D->recent_in_home = 8;
    $D->prods = $pivot->getRecentsForHome($D->recent_in_home);

    $screen->layout->useBlock('recent-home');

    $the_html = $this->lang('home_title_recent');
    $screen->layout->block->setVar('home_title_recent', $the_html);

    $the_html = $this->load_single_block('_prods-in-squares-for-home.php',FALSE);
    $screen->layout->block->setVar('home_recent_products', $the_html);
    
    $theCodeAds = $pivot->getAds('AD_BLOCK_1');
    if (!empty($theCodeAds)) {
        $theCodeAds = '<div id="ads-in-home-top">'.stripslashes($theCodeAds).'</div>';
        $screen->layout->block->setVar('home_ads_top', $theCodeAds);
    }

    $theCodeAds = $pivot->getAds('AD_BLOCK_2');
    if (!empty($theCodeAds)) {
        $theCodeAds = '<div id="ads-in-home-bottom">'.stripslashes($theCodeAds).'</div>';
        $screen->layout->block->setVar('home_ads_bottom', $theCodeAds);
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