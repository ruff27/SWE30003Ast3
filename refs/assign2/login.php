<!DOCTYPE html>
<html lang="en">
<head>
	<title>Foo Motor Corporation | Login</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<meta name="keywords" content="HTML, CSS, car, sales" />
	<meta name="description" content="Login Page" />
	<meta name="author" content="WebsiteWizard&trade;" />
	<link href="styles/style.css" rel="stylesheet" />
</head>
<body>
	<main>
	<?php include "includes/navbar.inc" ?>
	<section id="login">
		<form action="manage.php" class="loginForm">
			<div class="container">
				<legend>Login</legend>
				<label for="username">Username</label>
				<input type="text" name="username" id="username" pattern="[a-zA-Z]+" maxlength="25" required="required"/>
				<span class="error-message"></span>
				<label for="password">Password</label>
				<input type="password" name="password" id="password" pattern="[a-zA-Z]+" maxlength="25" required="required"/>
				<span class="error-message"></span>
				<button type="submit">Login</button>
			</div>
		</form>
	</section>
	<?php include "includes/footer.inc" ?>
</body>
</html>