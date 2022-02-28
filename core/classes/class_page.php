<?php
class page 
{
    public function __construct() 
    {
        $this->pivot = & $GLOBALS['pivot'];
        $this->user = & $GLOBALS['user'];
        $this->db1 = & $GLOBALS['db1'];
        $this->db2 = & $GLOBALS['db2'];
        $this->request = array();
        $this->params = new stdClass;
        $this->params->user = FALSE;
        $this->title = NULL;
        $this->html = NULL;
        $this->controllers = $GLOBALS['K']->INCPATH.'controllers/';
        $this->lang_data = array();
        $this->tpl_name = 'default';
        $this->plugin_name = FALSE;
    }

    public function loadUp() 
    {
        $this->_parse_input();
        $this->_set_template();
        $this->_send_headers();
        $this->_load_controller();
    }

    private function _parse_input() 
    {
        global $K;
        $this->params->user = FALSE;
        $request = $_SERVER['REQUEST_URI'];
        $pos = strpos($request, '?');
        if ( FALSE !== $pos ) {
            $request = substr($request, 0, $pos);
        }
        if ( FALSE !== strpos($request, '//') ) {
            $request = preg_replace('/\/+/iu', '/', $request);
        }
        $tmp = str_replace(array('http://','https://'), '', $K->SITE_URL);
        if ( FALSE !== strpos($tmp, '//') ) {
            $tmp = preg_replace('/\/+/iu', '/', $tmp);
        }
        $tmp = substr($tmp, strpos($tmp, '/'));
        if ( substr($request,0,strlen($tmp)) == $tmp ) {
            $request = substr($request, strlen($tmp));
        }
        $request = '/'.ltrim($request);

        $is_plugin = FALSE; 
        if ( substr($request, 0, 8) == '/plugin/' ) {
            $is_plugin = TRUE;
            if ( !$this->user->is_logged ) {
                $is_plugin = FALSE;
            }
        }

        if ( $is_plugin ) {
            $tmp = trim( $request, '/' );
            $tmp = array_fill_keys( explode('/', $tmp), 1 );
            if ( isset($tmp['m']) ) {
                unset ($tmp['m']);
            }
            $tmp = array_keys($tmp);

            if ( count($tmp) < 3 ) {
                $this->redirect('home');
            }

            $plugin_name = $tmp[1];

            if ( is_dir($K->PLUGINS_DIR.$plugin_name.'/core/controllers/') ){

                $this->controllers = $K->PLUGINS_DIR.$plugin_name.'/core/controllers/';

                $request = str_replace('/plugin/'.$plugin_name.'/', '/', $request);
                $this->plugin_name = $plugin_name;
            }

        }

        if ( $_SERVER['HTTP_HOST'] != $K->DOMAIN && FALSE!==strpos($_SERVER['HTTP_HOST'], '.'.$K->DOMAIN) ) {
            $tmp = str_replace('.'.$K->DOMAIN, '', $_SERVER['HTTP_HOST']);
            $tmp = preg_replace('/^www\./', '', $tmp);
            $tmp = trim($tmp);
            if ( ! empty($tmp) ) {
                $request = $tmp.'/'.$request;
            }
        }
        $request = trim($request, '/');
        if ( empty($request) ) {
            $this->request[] = 'home';
            return;
        }
        $request = explode('/', $request);
        foreach ($request as $i=>$one) {
            if ( FALSE!==strpos($one,':') && preg_match('/^([a-z0-9\-_]+)\:(.*)$/iu',$one,$m) ) {
                $this->params->{$m[1]} = $m[2];
                unset($request[$i]);
                continue;
            }
            if ( ! preg_match('/^([a-z0-9\-\._]+)$/iu', $one) ) {
                unset($request[$i]);
                continue;
            }
        }
        $request = array_values($request);

        if( 0 == count($request) ) {
            $this->request[] = 'home';
            return;
        }
        if ( $request[0] == 'oauth' || $request[0] === '1' ) {
            $this->controllers = $GLOBALS['K']->INCPATH.'controllers/api/';
            if ( $request[0] == 'oauth' ) {
                $this->controllers .= 'oauth/';
            }
            unset($request[0]);
            foreach ($request as &$v) {
                if ( preg_match('/\.(xml|json|rss|atom)$/iu', $v, $m) ) {
                    $v = str_ireplace('.'.$m[1], '', $v);
                    $this->params->format = strtolower($m[1]);
                }
            }
            $request = array_values($request);
            foreach ($request as $i=>$one) {
                $t = $this->request;
                $t[] = $one;
                if ( file_exists( $this->controllers.implode('_', $t).'.php') ) {
                    $this->request[] = $one;
                    unset($request[$i]);
                    continue;
                }
                break;
            }
            $request = array_values($request);
            if( 0 == count($this->request) ) {
                $this->request[] = 'home';
            }
            $this->params->more = $request;
            return;
        }
        $first = $request[0];
        if ( file_exists($this->controllers.$first.'.php') ) {
            $this->request[] = $first;
        } else {
            $this->request[] = 'home';
            return;
        }
        unset($request[0]);
        foreach ($request as $one) {
            $t = $this->request;
            $t[] = $one;
            if ( file_exists( $this->controllers.implode('_', $t).'.php') ) {
                $this->request[] = $one;
                continue;
            }
            break;
        }

        if ( 0 == count($this->request) ) {
            $this->request[] = 'home';
            return;
        }
    }

    private function _send_headers() 
    {
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', FALSE);
        header('Pragma: no-cache');
        header('Last-Modified: '.gmdate('D, d M Y H:i:s'). ' GMT');
        if ( $this->request[0] == 'services' ) {
            header('Content-type: application/json; charset=utf-8');
        } elseif (isset($this->params->format)) {
            switch ($this->params->format) {
                case 'xml':  header('Content-type: application/xml');
                         break;
                case 'json': header('Content-type: application/json');
                         break;
                case 'rss':  header('Content-type: application/rss+xml');
                         break;
                case 'atom': header('Content-type: application/atom+xml');
                         break;
                default: header('Content-type: application/xml');
                         break;
            }
        } else {
            header('Content-type: text/html; charset=utf-8');
        }
    }

    public function _set_template() 
    {
        $theme_path = $GLOBALS['K']->INCPATH.'../themes/'.$GLOBALS['K']->THEME.'/';

        if ( isset($GLOBALS['K']->THEME) && file_exists($theme_path . 'manifest.json') ) {
            $this->tpl_name = $GLOBALS['K']->THEME;
        }

        $current_theme = FALSE;
        $manifest = json_decode( @file_get_contents( $theme_path . 'manifest.json' ) );
        //@TODO: investigate why sometimes $manifest is not object
        if (is_object($manifest)) {
            $manifest->theme_overwrite_css = strtoupper($manifest->theme_overwrite_css);
        }
        if ( isset($manifest->theme_overwrite_css) && $manifest->theme_overwrite_css === "TRUE" ) {
            $GLOBALS['K']->THEME_CSS_OVERWRITE = TRUE;
        }

        $GLOBALS['K']->THEME = $this->tpl_name;

        return $current_theme;
    }

    private function _load_controller() 
    {
        global $K, $D, $pluginsControl;
        $D = new stdClass;
        $D->page_title = $K->SITE_TITLE;
        $db1 = & $this->db1;
        $db2 = & $this->db2;
        $db = & $db2;
        $user = & $this->user;
        $pivot = & $this->pivot;

        require_once( $this->controllers.implode('_',$this->request).'.php' );
    }

    public function load_single_block($filename, $output_content=TRUE) 
    {
        $filename = explode('.php', $filename);
        $filename = $filename[0];
        global $K, $D;
        $filename = ($this->tpl_name=='default')
                        ? $GLOBALS['K']->INCPATH.'../base/templates/blocks/'.$filename.'.php'
                        : $GLOBALS['K']->INCPATH.'../themes/'.$this->tpl_name.'/templates/blocks/'.$filename.'.php';

        if ( $output_content ) {
            require($filename);
            return TRUE;
        } else {
            ob_start();
            require($filename);
            $cnt = ob_get_contents();
            ob_end_clean();
            return $cnt;
        }
    }

    public function loadLanguage($filename) 
    {
        if ( ! isset($this->tmp_loaded_langfiles) ) {
            $this->tmp_loaded_langfiles = array();
        }
        $this->tmp_loaded_langfiles[] = $filename;
        global $K;
        $lang = array();
        ob_start();
        require( $GLOBALS['K']->INCPATH.'languages/'.$GLOBALS['K']->LANGUAGE.'/'.$filename );
        ob_end_clean();
        if ( ! is_array($lang) ) {
            return FALSE;
        }
        foreach ($lang as $key=>$value) {
            $this->lang_data[$key] = $value;
        }
    }

    public function lang($key, $replace_strings=array()) 
    {
        if( empty($key) ) {
            return '';
        }
        if( ! isset($this->lang_data[$key]) ) {
            return '';
        }
        $txt = $this->lang_data[$key];
        if( 0 == count($replace_strings) ) {
            return $txt;
        }
        return str_replace(array_keys($replace_strings), array_values($replace_strings), $txt);
    }

    public function param($key) 
    {
        if ( FALSE == isset($this->params->$key) ) {
            return FALSE;
        }
        $value = $this->params->$key;

        return $value;
    }

    public function redirect($loc, $abs=FALSE) 
    {
        global $K;
        if ( ! $abs && preg_match('/^http(s)?\:\/\//', $loc) ) {
            $abs = TRUE;
        }
        if ( ! $abs ) {
            if ( $loc{0} != '/' ) {
                $loc = $K->SITE_URL.$loc;
            }
        }
        if ( ! headers_sent() ) {
            header('Location: '.$loc);
        }
        echo '<meta http-equiv="refresh" content="0;url='.$loc.'" />';
        echo '<script type="text/javascript"> self.location = "'.$loc.'"; </script>';
        exit;
    }
}
?>