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
	
	$D->opcSelected = 2;
	
    /**************************************************************/    
    
    $screen->layout->useBlock('top-inside');

    $the_html = $this->load_single_block('_top-inside.php',FALSE);

    $screen->layout->block->setVar('info_top_inside', $the_html);

    $screen->layout->block->save('top_content');

    /**************************************************************/

	$filter_param = '';
	$D->paramInPagination = '';

    // INIT SANITAZE, for protection of params.
    $the_sanitaze = new sanitize();
	
	///// filter by category
	
	$D->param_category = '';
    
	if ($this->param('c')) {
        
        $D->param_category = $the_sanitaze->int($this->param('c'));

        if (!($D->param_category > 0)) $this->redirect('products');
        
    }
    
	if ($D->param_category > 0) {

		$filter_param = ' AND idcategory='.$D->param_category;
		$D->paramInPagination = 'c:'.$D->param_category.'/';

	}
	
	//filter by search
	
	$D->param_search = '';
	if ($this->param('q')) $D->param_search = $the_sanitaze->str_nohtml($this->param('q'));

	if (!empty($D->param_search)) {
		$parts_of_searchs = explode('+', $D->param_search);
		$filter_param = ' AND (';
		foreach($parts_of_searchs as $onepart) {
			if (strlen($onepart)>2) $filter_param = $filter_param . ' title LIKE "%'.$onepart.'%" OR';
		}
		$filter_param = trim($filter_param,' OR');
		$filter_param = $filter_param . ')';
		
		$D->paramInPagination = 'q:'.$D->param_search.'/';
		
	}

	// pagination
	$D->totalProducts = $this->db2->fetch_field('SELECT count(idproduct) FROM products WHERE status=1 '.$filter_param);
	$D->per_page = $K->PRODUCTS_PER_PAGE;
	$D->totalpages = ceil($D->totalProducts / $D->per_page);	
	$D->npage = 1;
	if ($this->param('p')) {
		$param_page = $the_sanitaze->int($this->param('p')); // sanitaze param.
		if ($param_page <= $D->totalpages && $param_page > 0) $D->npage = $param_page;
	}
	$D->start = ($D->npage - 1) * $D->per_page;
	//end pagination

	$listProducts = $this->db2->fetch_all("SELECT idproduct, code, title, imageproduct, numviews, numactionsok FROM products WHERE status=1 ".$filter_param." ORDER BY idproduct DESC LIMIT ".$D->start.",".$D->per_page);
	$htmlProducts = '';
	foreach ($listProducts as $oneProduct) {
		$D->idproduct = $oneProduct->idproduct;
		$D->title = stripslashes($oneProduct->title);
		$D->imageproduct = $oneProduct->imageproduct;
		$D->numviews = $oneProduct->numviews;
		$D->numactionsok = $oneProduct->numactionsok;
		$D->urlProduct = $K->SITE_URL.'product/p:'.stripslashes($oneProduct->code);
        $htmlProducts = $htmlProducts.$this->load_single_block('_table-one-product.php',FALSE);
	}
	unset($listProducts, $oneProduct);
	
	$D->arrayCategories = array();
	$r = $db2->query('SELECT * FROM categories');
	while ($obj = $db2->fetch_object($r)) {
		$D->arrayCategories[] = $obj;
	}
	
	$screen->layout->useBlock('products');

	$thefilters = $this->load_single_block('_filters_products.php',FALSE);
	$screen->layout->block->setVar('products_filters', $thefilters);

	$headTable = $this->load_single_block('_table-head-list-product.php',FALSE);
	$screen->layout->block->setVar('head_table_product_list', $headTable);
	
	$screen->layout->block->setVar('table_product_list', $htmlProducts);
	
	if ($D->totalpages > 1) {
		$D->htmlPagination = $this->load_single_block('_pagination-products.php',FALSE);
		$screen->layout->block->setVar('pagination_products', $D->htmlPagination);
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