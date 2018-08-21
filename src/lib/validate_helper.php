<?php
/*-------------------------------------
Auther: Ryota Yamamoto
AutherURI: http://developer-ryota.com
-------------------------------------*/

/*==================================================
Check $_POST value
==================================================*/
function check_input($var){
  if (is_array($var)) {
    return array_map('check_input', $var);
  } else {
    // Null byte attack
    if (preg_match('/\A[\r\n\t[:^cntrl:]]{0,1000}\z/u', $var) == 0) {
      die('It is illegal value.');
    }
    // Encoding check
    if (! mb_check_encoding($var, 'UTF-8')) {
      die('It is illegal value.');
    }
  	// Magic Quart
    if (get_magic_quotes_gpc()) {
      $var = stripslashes($var);
    }
    return $var;
  }
}

/*==================================================
Required item
==================================================*/

function v_empty($var){
	global $err_msg;
	if( $var != null){
		return $var;
	} else{
		$err_msg[] = "Required.";
	}
}

/*==================================================
Single-byte number
==================================================*/

function v_num($var){
	global $err_msg;
	if(preg_match("/^[0-9]+$/", $var ) || $var == "" ){
		return $var;
	} else {
		$err_msg[] = "Please enter in single-byte number.";
	}
}

/*==================================================
Half-width alphabet
==================================================*/

function v_alpha($var){
	global $err_msg;
	if(preg_match("/^[a-zA-Z]+$/",$var) || $var == ""){
		return $var;
	} else{
		$err_msg[] = "Please enter with half-width alphabet.";
	}
}


/*==================================================
Half-width alphanumeric
==================================================*/

function v_alha_num($var){
	global $err_msg;
	if(preg_match("/^[a-zA-Z0-9]+$/", $str) || $str == ""){
		return $var;
	} else {
		$err_msg[] = "Please enter with half-width alphanumeric characters.";
	}
}

/*==================================================
URL
==================================================*/

function v_url($var){
	global $err_msg;
	if(preg_match('/^(http|HTTP|ftp)(s|S)?:\/\/+[A-Za-z0-9]+\.[A-Za-z0-9]/',$var) || $var = ""){
		return $var;
	} else {
		$err_msg[] = "The URL is invalid.";
	}
}

/*==================================================
Email
==================================================*/

function v_email($var){
	global $err_msg;
	if(preg_match('/^([a-z0-9_]|\-|\.|\+)+@(([a-z0-9_]|\-)+\.)+[a-z]{2,6}$/i', $var)){
		return $var;
	} else{
		$err_msg[] = "The mail address is invalid.";
	}
}

/*==================================================
Compare two email addresses
==================================================*/

function v_conf_email($var,$var02){
	global $err_msg;
	if(preg_match('/^([a-z0-9_]|\-|\.|\+)+@(([a-z0-9_]|\-)+\.)+[a-z]{2,6}$/i', $var02)){
		if($var == $var02){
			return $var02;
		}
	} else {
		$err_msg[] = "Mail address doesn't match";
	}
}

/*==================================================
電話番号
==================================================*/

function v_tel($var){
	global $err_msg;
	if(preg_match('/^0\d{9,11}$/', $var) || preg_match('/^(090|080|070)-?\d{4}-?\d{4}$/',$var)){
		return $var;
	} else {
		$err_msg[] = "Telephone number is invalid.";
	}
}

/*==================================================
郵便番号
==================================================*/

function v_zip($var){
	global $err_msg;
	if(preg_match('/^([0-9]{3}-[0-9]{4})?$|^[0-9]{7}+$/i', $var)){
		return $var;
	} else {
		$err_msg[] = "Postal code is invalid.";
	}
}


/*==================================================
Full-width KATAKANA
==================================================*/

function v_zen_kana($var){
	global $err_msg;
	if(preg_match("/^[ァ-ヶ]+$/u",$str) || $str == ""){
    	return $var;
	} else {
		$err_msg[] = "Please enter in the full-width KATAKANA.";
	}
}

/*==================================================
Full-width HIRAGANA
==================================================*/

function v_zen_hira($str){
	global $err_msg;
	if(preg_match("/^[ぁ-ん]+$/u",$str) || $str == ""){
		return $var;
	} else {
		$err_msg[] = "Please enter with full-width HIRAGANA.";
	}
}

/*==================================================
Within x to y words
==================================================*/

function v_zen_leng($var,$min=0, $max=500){
	global $err_msg;
	$utf = "UTF-8";
	if((mb_strlen($var,$utf) >= $min && mb_strlen($var,$utf) <= $max ) || $var == ""){
		return $var;
	} else {
		$err_msg[] = "Within $min to $max words.";
	}
}

/*==================================================
Within x to y words (int)
==================================================*/

function v_rang($var, $min=0, $max=500){
	global $err_msg;
	if(((int)$var >= (int)$min && (int)$var <= (int)$max) || $var == ""){
    	return $var;
	} else {
		$err_msg[] = "Within $min to $max words.";
	}
}

/*==================================================
Radio button
==================================================*/

function v_radio($var,$var01,$var02,$var03){
	if($var == "1"){
		return $var01;
	} elseif($var == "2"){
		return $var02;
	} elseif($var == "3"){
		return $var03;
	}
}


?>
