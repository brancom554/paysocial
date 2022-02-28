<?php
class designer
{

    public function getMetaData() 
    {
        global $K;
        $html = '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />'."\n";
        $html .= '<meta name="keywords" content="'.$K->SITE_KEYWORDS.'">'."\n";
        $html .= '<meta name="description" content="'.$K->SITE_DESCRIPTION.'">'."\n";
        return $html;
    }

    public function loadJSData() 
    {
        global $K, $page;

        $html = '<script type="text/javascript"> var siteurl = "'. $K->SITE_URL .'"; </script>'."\n";
        $base_files_location = $K->BASE_URL.'js/';

        foreach ($this->base_files as $f) {
            $html .= '<script type="text/javascript" src="'.$base_files_location.$f.'.js?v='.$K->VERSION.'"></script>'."\n";
        }

        if ($K->THEME != 'default') {
            if ($handle = @opendir($K->INCPATH.'../themes/'.$K->THEME.'/js/')) {
                while (FALSE !== ($entry = readdir($handle))) {
                    if ($entry !== '.' && $entry !== '..') {
                        $html .= '<script type="text/javascript" src="'.$K->SITE_URL.'themes/'.$K->THEME.'/js/'. $entry .'?v='.$K->VERSION.'"></script>'."\n";
                    }
                }
                closedir($handle);
            }
        }

        $html .= $this->_getFilesPlugins('js', array('<script type="text/javascript" src="'.$K->SITE_URL.'plugins/', '"></script>'."\n"));

        return $html;
    }

    public function loadCSSData() 
    {
        global $K, $page;

        $html = '';
        $base_files_location = $K->BASE_URL.'css/';

        if (!isset($K->THEME_CSS_OVERWRITE)) {
            foreach ($this->base_files as $f ) {
                $html .= '<link href="'. $base_files_location . $f .'.css?v='. $K->VERSION .'" type="text/css" rel="stylesheet" />'."\n";
            }
        } else {
            foreach ($this->base_files as $f) {
                if ($f !== 'base') {
                     $html .= '<link href="'. $base_files_location . $f .'.css?v='. $K->VERSION .'" type="text/css" rel="stylesheet" />'."\n";
                }
            }
        }

        if ($K->THEME !== 'default') {
            if ($handle = @opendir($K->INCPATH.'../themes/'.$K->THEME.'/css/')) {

                while (FALSE !== ($entry = readdir($handle))) {
                    if ( $entry !== '.' && $entry !== '..' ) {
                        $html .= '<link href="'.  $K->SITE_URL .'themes/'. $K->THEME .'/css/'. $entry .'?v='. $K->VERSION .'" type="text/css" rel="stylesheet" />'."\n";
                    }
                }
                closedir($handle);
            }
        }

        $html .= $this->_getFilesPlugins('css', array('<link href="'. $K->SITE_URL .'plugins/', '" type="text/css" rel="stylesheet" />'."\n"));
        return $html;
    }

    private function _getFilesPlugins( $file_type, $file_credentials) 
    {
        global $K, $pluginsControl;

        $html = '';

        $installed_plugins = $pluginsControl->getInstalledPluginNames();
        foreach ($installed_plugins as $p) {
            if (is_dir( $K->PLUGINS_DIR.$p.'/base/'.$file_type.'/')) {
                if ($handle = @opendir($K->PLUGINS_DIR.$p.'/base/'.$file_type.'/')) {

                    while (FALSE !== ($entry = readdir($handle))) {
                        if ($entry !== '.' && $entry !== '..'){
                            $html .= $file_credentials[0]. $p . '/base/'.$file_type.'/' . $entry .'?v='.$K->VERSION. $file_credentials[1];
                        }
                    }
                    closedir($handle);
                }
            }
        }
        return $html;
    }

    public function getFaviconData( $get_link = FALSE ) 
    {
        global $K;

        $html = '<link href="'. $K->BASE_URL .'images/favicon.ico" type="image/x-icon" rel="shortcut icon" />';

        return $html;
    }

    public function getJSData() 
    {
        global $K;

        $this->base_files = array(
                'jquery',
                'bootstrap/js/bootstrap.min',
                'jasny-bootstrap',
                'base',
        );

        return $this->loadJSData();
    }

    public function getCSSData() 
    {
        global $K;

        $this->base_files = array(
                'bootstrap/css/bootstrap.min',
                'bootstrap.vertical-tabs',
                'jasny-bootstrap',
                $K->THEME_COLOR,
                'base'
        );

        return $this->loadCSSData();
    }

}
?>