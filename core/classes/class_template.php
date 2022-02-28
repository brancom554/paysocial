<?php
class template extends templateBase 
{
    private $page;
    private $user;
    private $pivot;    
    public $title;
    public $body_class;
    public $controller;
    public $layout;
    public $directHTML;
    private $default_load;
    private $pluginsControl;
    public $designer;
    public $layout_body;

    public function __construct( $params = array(), $layout_body, $default_load = TRUE, $actions_plugins = TRUE) 
    {
        global $K;

        $this->user = & $GLOBALS['user'];
        $this->page = & $GLOBALS['page'];
        $this->pivot = & $GLOBALS['pivot'];
        $this->pluginsControl = & $GLOBALS['pluginsControl'];

        $this->designer = new designer();

        $this->layout = FALSE;
        $this->directHTML = FALSE;
        $this->html = '';
        $this->header_data  = '';
        $this->default_load = $default_load;

        if ($actions_plugins) $this->pluginsControl->onPageLoad();

        if ( $this->default_load ) {

            if (empty($layout_body)) $this->layout_body = 'layout_empty';
            else $this->layout_body = $layout_body;

            //$this->pluginsControl->onPageLoad();

            $this->useLayout( 'header' );

            $action = 'replace';
            foreach ($params as $k=>$v) {
                ($action == 'add') ? ($this->layout->assigned_vars['{%'. $k . '%}'] .= $v) : ($this->layout->assigned_vars['{%'. $k . '%}'] = $v);
            }

            $lang_abbrv = explode( '.', $K->PHP_LOCALE );
            if ( is_array($lang_abbrv) ) $lang_abbrv = explode('_', $lang_abbrv[0]);

            $lang_abbrv = (isset($lang_abbrv[0]))? strtolower($lang_abbrv[0]) : 'en';
            $this->layout->setVar( 'html_lang_abbrv', $lang_abbrv );

            $tmp = $this->designer->getMetaData().$this->designer->getCSSData().$this->designer->getFaviconData().$this->designer->getJSData();

            $this->layout->setVar( 'header_data', $tmp );

            $this->useLayout( $this->layout_body );

        } else { 
            $this->useLayout( $layout_body );
        }
    }

    public function useLayout( $layout_name, $plugin = FALSE ) 
    {

        if ($this->layout) {
            $this->layout->saveVars();
            $this->html .= $this->layout->html;

            $this->layout = FALSE;
        }
        $this->layout = new layout( $layout_name, $plugin, $this );

    }

    public function display( $return_html = FALSE ) 
    {

        global $K;

        if ( $this->default_load ) $this->useLayout( 'footer' );

        if ($this->layout) {
            $this->layout->saveVars();
            $this->html .= $this->layout->html;
            $this->layout = FALSE;
        }

        $this->removeTemplateVars();

        if ( !$return_html ) echo $this->html;
        else return $this->html;

        if ($K->DEBUG_MODE && $this->default_load && $K->DEBUG_CONSOLE) {
            $this->page->load_single_block('debug-console');
        }
    }

    public function useDirectHTML() 
    {
        if ( $this->directHTML === FALSE ) $this->directHTML = new directHTML( $this->layout  );
    }

}
?>