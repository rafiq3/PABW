<?php
include '../lib/koneksi.php';
session_start();
$getUserLogin = $con->query("SELECT * from user where email='".$_SESSION['email']."' LIMIT 1")->fetch_assoc();
?>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="../css/page.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro">
<h1 class="page-title">• Aset</h1>
<div class="widget">

	<div class="3row">
		<div class="3column">
		<b>Rupiah:</b>
		<h1>Rp. <?= number_format($getUserLogin['aset'], 0, '.', '.'); ?></h1>
		</div>
		<div class="3column">
		<b>Emas:</b>
		<h1><?= number_format($getUserLogin['aset']/$con->query("SELECT harga from riwayat_harga ORDER BY waktu DESC limit 1")->fetch_assoc()['harga'], 4, ',', ''); ?> <span style="font-size: 20px;">/gr</span></h1>
		<font style="font-size:10pt"><i>(Sesuai harga emas hari ini)</i></font>
		</div>
	</div>
</div>
