<?php
    $this->loadLanguage('strings.php');

    $D->colortheme = $K->THEME_COLOR;

    $info_header = array(
        'page_title' => $this->lang('home_title_page', array('[SITE_TITLE]'=>$K->SITE_TITLE)),
        'html_class' => '',
        'body_class' => '',
        'header_data' => "<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>"
    );

    $screen = new template( $info_header, 'inside_layout' );

    $D->opcSelected = 3;

    /**************************************************************/    
    
    $screen->layout->useBlock('top-inside');

    $the_html = $this->load_single_block('_top-inside.php',FALSE);

    $screen->layout->block->setVar('info_top_inside', $the_html);

    $screen->layout->block->save('top_content');

    /**************************************************************/

    $D->prods = $pivot->getProductsMostViewed($K->MOSTVIEWED_PER_PAGE);

    $screen->layout->useBlock('mostviewed');

    $the_html = $this->lang('mostviewed_title');
    $screen->layout->block->setVar('mostviewed_title', $the_html);

    $the_html = $this->load_single_block('_prods-in-squares.php',FALSE);
    $screen->layout->block->setVar('mostviewed_products', $the_html);

    $theCodeAds = $pivot->getAds('AD_BLOCK_5');
    if (!empty($theCodeAds)) {
        $theCodeAds = '<div id="ads-in-mostviewed-top">'.stripslashes($theCodeAds).'</div>';
        $screen->layout->block->setVar('mostviewed_ads_top', $theCodeAds);
    }

    $theCodeAds = $pivot->getAds('AD_BLOCK_6');
    if (!empty($theCodeAds)) {
        $theCodeAds = '<div id="ads-in-mostviewed-bottom">'.stripslashes($theCodeAds).'</div>';
        $screen->layout->block->setVar('mostviewed_ads_bottom', $theCodeAds);
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