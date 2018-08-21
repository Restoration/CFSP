<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Contact Form FrameWork</title>
	<link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
	<form action="conf.php" method="POST">
		<?php
			// Error
			if(isset($_SESSION['err_msg'])){
				foreach($_SESSION['err_msg'] as $value){
					echo '<span style="color: red;">'. h($value) .'</span><br />' . "\n";
				}
			}
			$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
			$email = isset($_SESSION['email']) ? $_SESSION['email'] : '';
			$message = isset($_SESSION['message']) ? $_SESSION['message'] : '';
		?>

		<input type="text" name="name" id="name" value="<?=h($name)?>" placeholder="Name">

		<input type="text" name="email" id="email" value="<?=h($email)?>" placeholder="Email">

		<textarea name="message"><?=h($message)?></textarea>

		<input type="hidden" name="token" value="<?php echo h($token);?>">

		<input type="submit" value="confirm"　/>

	</form>
</body>
</html>