<?php
include '../lib/koneksi.php';
session_start();
?>
<link href="../css/page.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro">
<h1 class="page-title">• Selamat datang <?= $_SESSION['namadepan']; ?>!</h1>
<div class="widget">
<h3>HARGA EMAS TERKINI:</h3>
<?php
$data = $con->query("SELECT * from riwayat_harga ORDER BY waktu DESC limit 1")->fetch_assoc();
echo "<h1>Rp.".number_format($data['harga'], 0, '.', '.')."<font size=4>/gr</font></h1>";
echo "<i>Terakhir update ".$data['waktu']."</i>";
?>
<br/><br/>
<h4>HARGA EMAS SEBELUMNYA:</h4>
<?php
$data2 = $con->query("select * from (select * from riwayat_harga order by id desc limit 2) riwayat_harga order by id limit 1")->fetch_assoc();
echo "<h2>Rp.".number_format($data2['harga'], 0, '.', '.')."<font size=4>/gr</font></h2>";
?>
</div><br/>
<br/>