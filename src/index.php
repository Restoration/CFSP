<?php

session_start();

include_once(dirname(__DIR__).'/contact/lib/define.php');


if(!isset($_SESSION['token'])){
	$_SESSION['token'] = base64_encode(openssl_random_pseudo_bytes(32));
}
$token = $_SESSION['token'];

require_once(dirname(__DIR__).'/contact/view/index.php');