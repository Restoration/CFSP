<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Contact Form FrameWork</title>
	<link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
	<form action="thanks.php" method="POST">

		<p class="conf_value"><?php echo h($name)?></p>

		<p class="conf_value"><?php echo h($email)?></p>

		<p class="conf_value"><?php echo h($message)?></p>

		<input type="hidden" name="token" value="<?php echo h($token);?>">

		<input type="submit" value="Submit">

	</form>
</body>
</html>