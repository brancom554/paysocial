<?php
/*******************************************************************************/
/* Main functions for the applicaction */
/*******************************************************************************/

	function __autoload($theClass) {
		global $K;
		require_once( $K->INCPATH.'classes/class_'.$theClass.'.php' );
	}
	
	/*******************************************************************************/
	
	function cookie_domain() {
		global $K;
		$tmp = $GLOBALS['K']->DOMAIN;
		$pos = strpos($tmp, '.');
		if (FALSE === $pos) return '';
		if (preg_match('/^[0-9\.]+$/', $tmp)) return $tmp;
		return '.'.$tmp;
	}
	
	/*******************************************************************************/

	function changeTemplateArray( &$val) {
		$val = '{%'. $val .'%}';
	}
	
	/*******************************************************************************/
	
	function emailValid($e) {
		return preg_match('/^[a-zA-Z0-9._%-]+@([a-zA-Z0-9.-]+\.)+[a-zA-Z]{2,4}$/u', $e);
	}
	
	/*******************************************************************************/
	
	function validateUsername($username) { 
		return preg_match("/^[A-Za-z0-9][A-Za-z0-9_]{5,14}$/", $username);
	}
	
	/*******************************************************************************/

	function strJS($text) {
		$text = addslashes($text);	
		$text = html_entity_decode($text);
		return $text;	
	}
	
	/*******************************************************************************/
	
	function getCode($numcharacters,$withrepeated) {
		$code = '';
		$characters = "0123456789abcdfghjkmnpqrstvwxyzBCDFGHJKMNPQRSTVWXYZ";
		$i = 0;
		while ($i < $numcharacters) {
			$char = substr($characters, mt_rand(0, strlen($characters)-1), 1);	
			if ($withrepeated == 1) {
				$code .= $char;
				$i += 1;			
			} else {
				if(!strstr($code,$char)) {
					$code .= $char;
					$i += 1;
				}
			}
		}
		return $code;
	}

	/*******************************************************************************/

	function verifyCode($code, $table, $field) {			
		$db2 = $GLOBALS["db2"];		
		$r = $db2->query("SELECT ".$field." FROM ".$table." WHERE ".$field."='".$code."' LIMIT 1");
		$numusers = $db2->num_rows($r);
	
		if ($numusers==0) return FALSE;
		else return TRUE;			
	}

	/*******************************************************************************/
	
	function codeUniqueInTable($numcharacters, $withrepeated, $table, $field) {
		$code = getCode($numcharacters, $withrepeated);
		while (verifyCode($code, $table, $field)) $code = getCode(11, 1);
		return $code;
	}
	
	/*******************************************************************************/
	
	function getNumProductsByCategory($idcategory) {
		$db2 = $GLOBALS["db2"];		
		$r = $db2->fetch_field("SELECT count(idproduct) FROM products WHERE idcategory=".$idcategory);
		return $r;
	}
	
	/*******************************************************************************/
	
	function sendMail($to, $subject, $message, $from) {
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'From: '.$from.'' . "\r\n";
		$headers .= 'Reply-To: '.$from . "\r\n";
		$headers .= 'X-Mailer: PHP/' . phpversion();	
		return @mail($to, $subject, $message, $headers);
	}
	
	/*******************************************************************************/
	
	function sendMail_PHPMailer($to, $subject, $message) {
		require("class.phpmailer.php");
		global $K;
		$mymail = new PHPMailer();
		$mybody = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Email from '.$K->MAIL_FROMNAME.'</title>
		</head><body>';
		$mybody .= $message;
		$mybody .= '</body></html>';
		
		$mymail->From = $K->MAIL_FROM;
		$mymail->FromName = $K->MAIL_FROMNAME;
		$mymail->Host = $K->MAIL_HOST;
		$mymail->Port = $K->MAIL_PORT;
		$mymail->Mailer = 'smtp';
		$mymail->AddAddress($to);
		$mymail->Subject = $subject;
		$mymail->Body = $mybody;
		$mymail->SMTPAuth = "true";
		$mymail->Username = $K->MAIL_USERNAME;
		$mymail->Password = $K->MAIL_PASSWORD;
		
		$mymail->IsHTML(true);    
		
		if(!$mymail->Send()) return FALSE;
		else return TRUE;
	}
	
	function findStr($cad , $find, $separator) {
		$there = 0;
		$array = explode($separator, $cad);
		foreach($array as $one) {
			if ($one == $find) $there = 1;
		}
		return $there;
	}

	function get_available_languages($even_if_beta=FALSE)
	{
		global $K;
		$data	= array();
		$path	= $K->INCPATH.'languages/';
		$tmp	= opendir($path);
		while($f = readdir($tmp)) {
			if( $f == '.' || $f == '..' ) {
				continue;
			}
			$lang_code	= $f;
			$lang_path	= $path.$f.'/';
			if( ! is_dir($lang_path) ) {
				continue;
			}
			$lang_metafile	= $lang_path.'language.php';
			if( ! file_exists($lang_metafile) ) {
				continue;
			}
			$current_language	= FALSE;
			include($lang_metafile);
			if( !$current_language || !is_object($current_language) || !isset($current_language->name) || empty($current_language->name) ) {
				continue;
			}
			$lang_name	= trim($current_language->name);
			if( isset($current_language->is_beta) && $current_language->is_beta ) {
				if( ! $even_if_beta ) {
					continue;
				}
			}
			$data[$lang_code]	= $current_language;
		}
		closedir($tmp);
		asort($data);
		return $data;
	}
?>