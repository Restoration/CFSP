<?php
session_start();

include_once(dirname(__DIR__).'/contact/lib/define.php');

// Check token key
if (isset($_POST['token']) && isset($_SESSION['token'])) {
  $token = $_POST['token'];
  if ($token != $_SESSION['token']) {
    die('There is doubt of unauthorized access.');
  }
} else {
  die('There is doubt of unauthorized access.');
}

// Check $_POST
$_POST = check_input($_POST);

$name       = isset($_POST['name'   ])   ? $_POST['name'   ]   : '';
$email      = isset($_POST['email'  ])   ? $_POST['email'  ]   : '';
$message    = isset($_POST['message'])   ? $_POST['message']   : '';

// Error message initialization
$err_msg = array();

// Start validate
v_empty($name);
v_email($email);
v_empty($message);

if(count($err_msg) > 0){
	$_SESSION['name']    = $name;
	$_SESSION['email']   = $email;
	$_SESSION['message'] = $message;
	$_SESSION['err_msg']   = $err_msg;
	$return_url = $_SERVER["HTTP_REFERER"];
	header("Location:$return_url");
} else {

require_once(dirname(__DIR__).'/contact/view/conf.php');

}
?>