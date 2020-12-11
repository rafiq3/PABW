<?php
session_start();
if (empty($_SESSION['email'])){
	header('location: login.php');
}
?>
<html>
<head>
	<!-- Meta -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard - Emo</title>
	<link href="css/style.css" rel="stylesheet"/>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro">
</head>
<body style="background:white">
	<div class="sidenav">
		<img src="https://cdn.iconscout.com/icon/free/png-512/account-profile-avatar-man-circle-round-user-30452.png" class="profile-img"/>
		<center><p><b><?= $_SESSION['namadepan']; ?></b></p></center><br/>
		<hr style="border: 1px solid #f6b1a7;width:100%;"/><br/>
		<a href="#" onclick="switchPage(0)">Beranda</a>
		<a href="#" onclick="switchPage('deposit')">Deposit</a>
		<a href="#" onclick="switchPage('withdraw');">Withdraw</a>
		<a href="#" onclick="switchPage('aset')">Aset</a>
		<a href="#" onclick="switchPage('transaksi');">Transaksi</a>
		<a href="#" onclick="switchPage('riwayat');">Riwayat Login</a>
		<a href="#" onclick="switchPage('bantuan');">Help</a>
		<a href="logout.php"><b>Logout</b></a>
	</div>
	<div class="main" id="main-content">
		<object type="text/html" width="100%" height="100%" data="page/beranda.php" ></object>
	</div>
	<script src="js/main.js" type="text/javascript"></script>
</body>
</html>