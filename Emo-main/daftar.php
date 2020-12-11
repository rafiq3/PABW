<?php
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
	<title>Daftar - Emo</title>
	<link href="css/style.css" rel="stylesheet"/>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro">
</head>
<body>
	<div class="section centered primary">
		<h1 class="title bigger">Daftar Akun</h1><br/>
		<h2 class="title">Data Personal</h2>
			<label for="first">Nama Depan</label><br/>
			<input type="text" class="input-text" id="nd" name="first" placeholder="Masukkan nama" required><br/><br/>
			<label for="last">Nama Belakang</label><br/>
			<input type="text" class="input-text" id="nb" name="last" placeholder="Masukkan nama" required><br/><br/>
			<label for="email">Email</label><br/>
			<input type="email" class="input-text" id="email" name="email" placeholder="Masukkan email" required><br/><br/>
			<label for="nohp">No Handphone</label><br/>
			<input type="number" class="input-text" id="hp" name="nohp" placeholder="Masukkan nomor hp" required><br/><br/>
			<label for="tgllahir">Tanggal Lahir</label><br/>
			<input id="tgllahir" class="input-text" type="date" required><br/><br/>

			<label for="alamat">Alamat tempat tinggal</label><br/>
			<textarea class="input-text" id="alamat"  style="width:730px;height:90px;" placeholder="Masukkan alamat" required></textarea><br/><br/>
			<hr/><br/>
			<h2 class="title">Keamanan</h2>
			<div class="row">
				<div class="column" style="margin-left:25%;">
					<label for="password">Password</label><br/>
					<input type="password" class="input-text" name="password" id="password" placeholder="Masukkan password" required><br/><br/>
				</div>
				<div class="column" style="margin-right:25%;">
					<label for="repassword">Re-password</label><br/>
					<input type="password" class="input-text" name="repassword" id="repassword" placeholder="Masukkan ulang password" required><br/><br/>
				</div>
			</div>
			<p id="warnregister" style="color:#f9ca24;font-size:15px;"></p>
			<input type="checkbox" id="agreement" name="agreement" value="1">
			<label for="agreement"> Menyetujui ketentuan & persyaratan</label><br><br/>
			<button class="daftar" id="daftarakun" value="Register" style="width:10%;padding:7px;" disabled>Daftar</button><br/>
			<p>Sudah punya akun? <a href="login.php">Masuk</a> sekarang.</p>
	</div>
	<footer>
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