<?php
include 'lib/koneksi.php';
include 'lib/function.php';
session_start();
if (!empty($_SESSION['email'])){
	header('location: dashboard.php');
}
?>
<html>
<head>
	<!-- Meta -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - Emo</title>
	<link href="css/style.css" rel="stylesheet"/>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro">
</head>
<body class="primary">
	<div class="box">
	<?php
	if (isset($_POST['login'])){
		if($con->query("SELECT * FROM user where email='".$_POST['email']."'")->num_rows > 0){
			$get = $con->query("SELECT id, email, nama_depan, password FROM user where email='".$_POST['email']."' LIMIT 1")->fetch_assoc();
			if ($get['password'] != encryptPw($_POST['password'])){
				echo "<center><br/><font color=\"red\">Email atau password salah</font><br/><br/></center>";
			}else{
				$con->query("UPDATE user set last_login=CURRENT_TIMESTAMP where email='".$_POST['email']."'");
				$_SESSION['email'] = $get['email'];
				$_SESSION['namadepan'] = $get['nama_depan'];
				$con->query("INSERT INTO riwayat_login (id_user, ua, ip) values ('".$get['id']."', '".$_SERVER['HTTP_USER_AGENT']."', '".$_SERVER['REMOTE_ADDR']."')");
				header('location: dashboard.php');
			}
		}else{
			echo "<center><br/><font color=\"red\">Email atau password salah</font><br/><br/></center>";
		}
		
	}
	?>
	<form action="" method="POST">
		<label for="email">Email</label><br/>
		<input type="text" id="login-email" name="email" class="input-text" placeholder="Login email" required><br/><br/>
		<label for="password">Password</label><br/>
		<input type="password" id="login-pass" name="password" class="input-text" autocomplete="off" placeholder="Login password" name="pw" required><br/></br>
		<input type="submit" class="btn btn-masuk" name="login" autocomplete="off" value="Login"/> 
	</form>
	<a href="#"><button class="btn btn-fp" value="Lupa password">Lupa password</button></a>
	<p>Belum punya akun? <a href="daftar.php">Daftar</a> yuk!</p>
	</div>
	<footer class="footer-login">
	<div class="row">
		<div class="column">
			&copy; Copyright 2020&nbsp;<b>Emo</b>
		</div>
		<div class="column">
			<a href="index.php">Homepage</a> | <a href="login.php">Login</a>
		</div>
	</div>
	</footer>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="js/app.js" type="text/javascript"></script>
</body>
</html>