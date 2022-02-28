<?php
class user 
{
    public $id;
    public $pivot;
    public $is_logged;
    public $info;
    public $sess;
    private static $_user_ident;

    public function __construct() 
    {
        $this->id = FALSE;
        $this->pivot = &$GLOBALS['pivot'];
        $this->db1 = &$GLOBALS['db1'];
        $this->db2 = &$GLOBALS['db2'];
        $this->info = new stdClass;
        $this->is_logged = FALSE;
        $this->sess = array();
        self::$_user_ident = FALSE;
    }

    public function loadUp() 
    {
        global $K;
        $this->_session_start();
        if( isset($this->sess['IS_LOGGED'], $this->sess['LOGGED_USER']) && $this->sess['IS_LOGGED'] && $this->sess['LOGGED_USER'] ) {
            $u = & $this->sess['LOGGED_USER'];
            $u = $this->pivot->getUserbyId($u->iduser);
            if (!$u) return FALSE;

            $this->is_logged = TRUE;
            $this->info = & $u;

            $this->id = $this->info->iduser;
            $this->db2->query('UPDATE users SET lastclick="'.time().'" WHERE iduser="'.$this->id.'" LIMIT 1');

            if ($this->info->active == 0) {
                $this->logout();
                return FALSE;
            }

            return $this->id;
        }

        return FALSE;
    }

    private function _session_start() 
    {
        if( ! isset($_SESSION['USER_DATA']) ) $_SESSION['USER_DATA'] = array();
        $this->sess = & $_SESSION['USER_DATA'];
    }

    public function login($login, $pass) 
    {
        global $K;
        if ($this->is_logged) return FALSE;

        if (empty($login)) return FALSE;

        $login = $this->db2->e($login);
        $pass = $this->db2->e($pass);
        $this->db2->query('SELECT iduser FROM users WHERE email="'.$login.'" AND password="'.$pass.'" AND active=1 LIMIT 1');

        if (!$obj = $this->db2->fetch_object()) return FALSE;

        $this->info = $this->pivot->getUserbyId($obj->iduser, TRUE);

        if (!$this->info) return FALSE;

        $this->is_logged = TRUE;
        $this->sess['IS_LOGGED'] = TRUE;
        $this->sess['LOGGED_USER'] = & $this->info;
        $this->id = $this->info->iduser;

        $ip = $this->db2->e( ip2long($_SERVER['REMOTE_ADDR']) );
        $this->db2->query('UPDATE users SET lastaccess="'.time().'", iplastaccess="'.$ip.'", lastclick="'.time().'" WHERE iduser="'.$this->id.'" LIMIT 1');

        return TRUE;
    }

    public function logout() 
    {
        if (!$this->is_logged) return FALSE;

        $this->sess['IS_LOGGED'] = FALSE;
        $this->sess['LOGGED_USER'] = NULL;
        unset($this->sess['IS_LOGGED']);
        unset($this->sess['LOGGED_USER']);
        $this->id = FALSE;
        $this->info = new stdClass;
        $this->is_logged = FALSE;
    }

}
?>