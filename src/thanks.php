<?php

session_start();

include_once(dirname(__DIR__).'lib/send.php');
include_once(dirname(__DIR__).'lib/define.php');

// For japanese language setting
// mb_language('ja');
// mb_internal_encoding('UTF-8');
$result = sendmail($name,$email,$mailTo,$subject,$message,$mailTo);
if($result){
	require_once(dirname(__DIR__).'view/thanks.php');
	$_SESSION = array();
	session_destroy();
} else {
	$message = 'Transmission failure.';
	echo $message;
}
?>