<?php
    if (!$this->user->is_logged) {
        $this->redirect('ss-admin/login');
    }

    $this->loadLanguage('strings.php');

    $D->page_title = $this->lang('admin_title_general');
    $D->fontGoogle = "<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>";

    $D->colortheme = $K->THEME_COLOR;

    $info_header = array(
        'page_title' => $D->page_title,
        'html_class' => '',
        'body_class' => '',
        'header_data' => $D->fontGoogle
    );

    $screen = new template( $info_header, 'admin_layout' );

    $D->opcSelected = 4;

    /***********************************************/

    $screen->layout->useBlock('top-admin-inside');
    $screen->layout->block->setVar('logo_top', $K->BASE_URL.'images/'.$D->colortheme.'/logo-inside.png');
    $screen->layout->block->setVar('title_top_admin', $this->lang('admin_title_general'));

    $screen->layout->block->save('top_content');

    /***********************************************/

    $screen->layout->useBlock('ss-admin-block');

    $menuAdmin = $this->load_single_block('_menu-admin.php',FALSE);
    $screen->layout->block->setVar('admin_menu', $menuAdmin);

    // pagination
    $D->totalProducts = $this->db2->fetch_field('SELECT count(idproduct) FROM products WHERE status=1 ');
    $D->per_page = 10; //$K->PRODUCTS_PER_PAGE;
    $D->totalpages = ceil($D->totalProducts / $D->per_page);
    $D->npage = 1;
    if ($this->param('p')) {
        $param_page = intval($this->param('p'));
        if ($this->param('p') <= $D->totalpages && $this->param('p') > 0) $D->npage = $this->param('p');
    }
    $D->start = ($D->npage - 1) * $D->per_page;
    //end pagination

    $D->arrayProducts = array();
    $r = $db2->query('SELECT products.*, categories.category FROM products, categories WHERE products.idcategory = categories.idcategory ORDER BY idproduct DESC LIMIT '.$D->start.','.$D->per_page);

    while ($obj = $db2->fetch_object($r)) {
        $D->arrayProducts[] = $obj;
    }

    $D->arrayCategories = array();
    $r = $db2->query('SELECT * FROM categories');
    while ($obj = $db2->fetch_object($r)) {
        $D->arrayCategories[] = $obj;
    }

    $D->arraySocialPay = array();
    $r = $db2->query('SELECT idsocialpay, name_socialpay FROM socialpay');

    while ($obj = $db2->fetch_object($r)) {
        $D->arraySocialPay[] = $obj;
    }

    $bodyAdmin = $this->load_single_block('_admin-products-part.php',FALSE);

    if ($D->totalpages > 1) {
        $bodyAdmin = $bodyAdmin . $this->load_single_block('_admin-pagination-products.php',FALSE);
    }

    $screen->layout->block->setVar('admin_body', $bodyAdmin);

    $screen->layout->block->save('main_content');

    /**************************************************************/

    $screen->layout->useBlock('foot');

    $the_html = $this->load_single_block('_foot.php',FALSE);
    $screen->layout->block->setVar('foot_info', $the_html);

    $screen->layout->block->save('foot_content');

    /**************************************************************/

    $screen->display();
?>