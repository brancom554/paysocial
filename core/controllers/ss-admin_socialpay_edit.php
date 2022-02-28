<?php
    if (!$this->user->is_logged) {
        $this->redirect('ss-admin/login');
    }

    $this->loadLanguage('strings.php');

    $D->colortheme = $K->THEME_COLOR;

    $info_header = array(
        'page_title' => $this->lang('admin_title_general'),
        'html_class' => '',
        'body_class' => '',
        'header_data' => "<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>"
    );

    $screen = new template( $info_header, 'admin_layout' );

    $D->opcSelected = 2;

    /***********************************************/

    $screen->layout->useBlock('top-admin-inside');
    $screen->layout->block->setVar('logo_top', $K->BASE_URL.'images/'.$D->colortheme.'/logo-inside.png');
    $screen->layout->block->setVar('title_top_admin', $this->lang('admin_title_general'));

    $screen->layout->block->save('top_content');

    /***********************************************/

    $screen->layout->useBlock('ss-admin-block');

    $menuAdmin = $this->load_single_block('_menu-admin.php',FALSE);
    $screen->layout->block->setVar('admin_menu', $menuAdmin);

    $D->codSocialPay = '';
    if ($this->param('s')) $D->codSocialPay = $db2->e($this->param('s'));

    $r = $db2->query("SELECT * FROM socialpay WHERE code='".$D->codSocialPay."'");

    if (!$obj = $db2->fetch_object($r)) $this->redirect($K->SITE_URL.'ss-admin/socialpay');
    else $D->SocialPay = $obj;

    $bodyAdmin = $this->load_single_block('_admin-socialpay-edit-part.php',FALSE);
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