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
	
	$D->opcSelected = 0;

    /**************************************************************/    
    
    $screen->layout->useBlock('top-inside');

    $the_html = $this->load_single_block('_top-inside.php',FALSE);

    $screen->layout->block->setVar('info_top_inside', $the_html);

    $screen->layout->block->save('top_content');

    /**************************************************************/

	$D->section = 'about';
	if ($this->param('s')) $D->section = $db2->e($this->param('s'));
    
    /****** sanitize param ********/

    $the_sanitaze = new sanitize();
    $D->section = $the_sanitaze->str_nohtml($D->section, 11);
    
    /******************************/    
	
	$D->htmlSection = '';

	$D->isSectionContact = FALSE;
			
	switch($D->section) {
		case 'about':
			$D->htmlSection = $db2->fetch_field('SELECT texthtml FROM sections WHERE section="'.$D->section.'" LIMIT 1');
			$D->titleSection = stripslashes($this->lang('sections_about_title'));
			break;
			
		case 'privacy':
			$D->htmlSection = $db2->fetch_field('SELECT texthtml FROM sections WHERE section="'.$D->section.'" LIMIT 1');
			$D->titleSection = stripslashes($this->lang('sections_privacy_title'));
			break;
			
		case 'termsofuse':
			$D->htmlSection = $db2->fetch_field('SELECT texthtml FROM sections WHERE section="'.$D->section.'" LIMIT 1');
			$D->titleSection = stripslashes($this->lang('sections_termsofuse_title'));
			break;
			
		case 'disclaimer':
			$D->htmlSection = $db2->fetch_field('SELECT texthtml FROM sections WHERE section="'.$D->section.'" LIMIT 1');
			$D->titleSection = stripslashes($this->lang('sections_disclaimer_title'));
			break;
			
		case 'contact':
			$D->htmlSection = $db2->fetch_field('SELECT texthtml FROM sections WHERE section="'.$D->section.'" LIMIT 1');
			$D->titleSection = stripslashes($this->lang('sections_contact_title'));
			$D->iscontact = TRUE;
			break;
			
		default:
			$D->section = 'about';
			$D->htmlSection = $db2->fetch_field('SELECT texthtml FROM sections WHERE section="'.$D->section.'" LIMIT 1');
			$D->titleSection = stripslashes($this->lang('sections_about_title'));
	}
	
	$D->htmlSection = stripslashes($D->htmlSection);
	
	$screen->layout->useBlock('section');
	$screen->layout->block->setVar('section_title_bar', $D->titleSection);
	$screen->layout->block->setVar('section_text_html', $D->htmlSection);
	
	$screen->layout->block->save('main_content');

	/**************************************************************/
	
	$screen->layout->useBlock('foot');

	$the_html = $this->load_single_block('_foot.php',FALSE);
	$screen->layout->block->setVar('foot_info', $the_html);

	$screen->layout->block->save('foot_content');
	
	/**************************************************************/
	
	$screen->display();
?>