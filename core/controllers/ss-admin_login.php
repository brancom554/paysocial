<?php
    if ($this->user->is_logged) {
        $this->redirect('ss-admin/general');
    }

    $this->loadLanguage('strings.php');

    $D->colortheme = $K->THEME_COLOR;

    $info_header = array(
        'page_title' => $this->lang('admin_login_title').' | '.$this->lang('admin_title_general'),
        'html_class' => '',
        'body_class' => '',
        'header_data' => "<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>"
    );

    $screen = new template( $info_header, 'admin_layout' );

    /**************************************************************/

    $screen->layout->useBlock('top-login');
    $screen->layout->block->setVar('logo_top', $K->BASE_URL.'images/'.$D->colortheme.'/logo-inside.png');
    $screen->layout->block->save('top_content');

    $screen->layout->useBlock('ss-admin-login');
    $screen->layout->block->setVar('login_title', $this->lang('admin_login_title'));
    $screen->layout->block->setVar('login_email', $this->lang('admin_login_email'));
    $screen->layout->block->setVar('login_password', $this->lang('admin_login_password'));
    $screen->layout->block->setVar('login_bsubmit', $this->lang('admin_login_bsubmit'));
    $screen->layout->block->save('main_content');

    /**************************************************************/

    $screen->layout->useBlock('foot');

    $the_html = $this->load_single_block('_foot.php',FALSE);
    $screen->layout->block->setVar('foot_info', $the_html);

    $screen->layout->block->save('foot_content');

    /**************************************************************/

    $screen->display();
?>