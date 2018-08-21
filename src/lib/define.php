<?php
// Escape
function h($var){
	if(is_array($var)){
		return array_map('h',$var);
	} else {
		return htmlspecialchars($var,ENT_QUOTES,'UTF-8');
	}
}

// Measures Click Jacking
header('X-FREAM-OPTIONS: SAMEORIGIN');

include_once(dirname(__DIR__).'/lib/validate_helper.php');

include_once(dirname(__DIR__).'/lib/form_helper.php');
