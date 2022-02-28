<?php
class plugin 
{
    protected $pluginsControl;
    protected $db2;
    protected $pivot;
    protected $page;
    protected $user;

    public function __construct() 
    {
        $this->pluginsControl = & $GLOBALS['pluginsControl'];
        $this->db2 = & $GLOBALS['db2'];
        $this->pivot = & $GLOBALS['pivot'];
        $this->page = & $GLOBALS['page'];
        $this->user = & $GLOBALS['user'];
    }

    final protected function setVar( $name, $value, $action = 'add', $priority = 0 ) 
    {
        $this->pluginsControl->setVar( $name, $value, $action, $priority );
    }

    final protected function setDelimiter( $value ) 
    {
        $this->pluginsControl->delimiter = $value;
    }

    final protected function getCurrentController() 
    {
        return implode('/', $this->page->request);
    }

    final protected function getCurrentTab() 
    {
        return $this->page->param('tab');
    }

}
?>