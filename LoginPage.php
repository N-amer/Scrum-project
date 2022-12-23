<?php
session_start();
$servername = "localhost";
$username = "bit_academy";
$password = "bit_academy";
$test1 = "<h4 class='center'";
$test2 = "</h4>";
try {
	$conectie = new PDO("mysql:host=$servername;dbname=jarvisvault", $username, $password);

	$conectie->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	echo $e->getMessage();
};

if (isset($_POST["submit"])) {
	$username2 = $_POST["username"];
	@$password2 = $_POST["password1"];

	$sql = $conectie->query("SELECT * FROM gebruikers_accounts WHERE username = '$username2' AND password = '$password2'")->fetch();
	if ($sql) {
		$_SESSION['id'] = $sql['id'];
		header("Location: index.php");
	} else {
		echo "<h1 class='center'>wachtwoord/username is niet validate! </h1>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel='stylesheet'>
	<style>
		* {
			box-sizing: border-box;
			margin: 0;
			padding: 0;
			font-family: raley, sans-serif;
			overflow: hidden;
		}

		.center {
			display: flex;
			justify-content: center;
			align-items: center;
		}

		body {
			background: linear-gradient(90deg, #C7C5F4, #776BCC);
		}

		.container {
			display: flex;
			align-items: center;
			justify-content: center;
			min-height: 100vh;
		}

		.screen {
			background: linear-gradient(90deg, #5D54A4, #7C78B8);
			position: relative;
			height: 600px;
			width: 360px;
			box-shadow: 0px 0px 24px #5C5696;
		}

		.screen__content {
			z-index: 1;
			position: relative;
			height: 100%;
		}

		.screen__background {
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			z-index: 0;
			-webkit-clip-path: inset(0 0 0 0);
			clip-path: inset(0 0 0 0);
		}


		.login {
			width: 320px;
			padding: 30px;
			padding-top: 156px;
		}

		.login__field {
			padding: 20px 0px;
			position: relative;
		}

		.login__icon {
			position: absolute;
			top: 30px;
			color: #7875B5;
		}

		.login__input {
			border: none;
			border-bottom: 2px solid #D1D1D4;
			background: none;
			padding: 10px;
			padding-left: 24px;
			font-weight: 700;
			width: 75%;
			transition: .2s;
		}



		.login__submit {
			background: #fff;
			font-size: 14px;
			margin-top: 30px;
			padding: 16px 20px;
			border-radius: 26px;
			border: 1px solid #D4D3E8;
			text-transform: uppercase;
			font-weight: 700;
			display: flex;
			align-items: center;
			width: 100%;
			color: #4C489D;
			box-shadow: 0px 2px 2px #5C5696;
			cursor: pointer;
		}


		.button__icon {
			font-size: 24px;
			margin-left: auto;
			color: #7875B5;
		}

		.divback {
			text-align: start;
			font-size: small;
			padding-left: 1rem;
			padding-top: 1rem;
			border: none;
			color: white;
			padding: 20px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			border-radius: 20px;
		}

		.logreg {
			padding-left: 20px;
			padding-bottom: 20px;
			font-size: 10px;
		}

		input[name="submit"]:hover {

			box-shadow: inset 140px 0 0 lightgreen;
			transition: ease-out 1s;
			font-size: 14px;
			border: solid lightgreen 5px;
			padding: 15px;
		}

		#visible {
			display: flex;
			flex-direction: row-reverse;
			justify-content: flex-end;
			padding: 10px;
			color: #F1F5F9;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="screen">
			<div class="screen__content">
				<form class="login" action="LoginPage.php" method="POST">
					<h1>Login</h1>
					<div class="login__field">
						<i class="login__icon fas fa-user"></i>
						<input type="text" class="login__input" placeholder="User name / Email" name="username" required>
					</div>
					<div class="login__field">
						<i class="login__icon fas fa-lock"></i>
						<input type="password" class="login__input" placeholder="Password" name="password1" id="password1" required>
						<div id="visible"><input type="checkbox" onclick="show()"> Wachtwoord zien</div>
						<input type="submit" name="submit">
					</div>
				</form>
				<div class="logreg">
					<a href="register.php" class="bread">
						<h2>Create an account</h2>
					</a>
				</div>

			</div>
			<div class="screen__background">
				<span class="screen__background__shape screen__background__shape4"></span>
				<span class="screen__background__shape screen__background__shape3"></span>
				<span class="screen__background__shape screen__background__shape2"></span>
				<span class="screen__background__shape screen__background__shape1"></span>
			</div>
		</div>
	</div>
	<script>
		function show() {
			var x = document.getElementById("password1");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
	</script>
</body>

</html>