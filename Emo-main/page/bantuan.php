<?php
include '../lib/koneksi.php';
session_start();
$getUserLogin = $con->query("SELECT * from user where email='".$_SESSION['email']."' LIMIT 1")->fetch_assoc();

?><meta name="viewport" content="width=device-width, initial-scale=1">

<link href="../css/page.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro">
<h1 class="page-title">• Bantuan</h1>
<div class="widget">
<u><b>Informasi:</b></u>
<p>Bantuan atau pertanyaan akan di tanggapi paling lama dalam 14 hari.</p>
</div><br/>
<br/>
<div class="widget">
<label for="nama">Nama Pengirim:</label><br/>
<input type="text" style="width:85%;" id="nama" class="input-text" readonly/><br/><br/>
<label for="email">Email Pengirim:</label><br/>
<input type="email" style="width:85%;" id="email" class="input-text" readonly/><br/><br/>
<label for="judul">Perihal:</label><br/>
<input type="text" style="width:85%;" id="judul" class="input-text"/><br/><br/>
<label for="ket">Keterangan:</label><br/>
<textarea style="width:85%;height:100px;" class="input-text"></textarea><br/><br/><br/>
<button class="btn" id="konf" onclick="" style="background:white;color:black;" disabled>Kirim Tiket</button>
</div>

<br/>
<b id="suc"></b>
<script type="text/javascript">

</script>
