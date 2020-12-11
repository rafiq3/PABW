<?php
include '../lib/koneksi.php';
session_start();
$getUserLogin = $con->query("SELECT * from user where email='".$_SESSION['email']."' LIMIT 1")->fetch_assoc();

?>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="../css/page.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro">
<h1 class="page-title">• Withdraw</h1>
<br/>
<div class="row">
<div class="column">
<h3><u>Withdraw Rupiah</u></h3>
<label for="nominal">Nominal</label><br/>
<?php
if ($getUserLogin['aset'] < 10000){
	echo '<input type="number" id="nominal" style="width:85%" onkeyup="wdrek();" min="10000" class="input-text" placeholder="10000" disabled/><br/><br/>';
}else{
	echo '<input type="number" id="nominal" style="width:85%" onkeyup="wdrek();" min="10000" class="input-text" placeholder="10000"/><br/><br/>';
}
?>
<label for="bpengirim">Bank Penerima</label><br/>
<input type="text" id="bpenerima" style="width:85%" onkeyup="wd();" class="input-text" placeholder="Masukkan nama bank"/><br/><br/>
<label for="pengirim">Nomor Rekening Penerima</label><br/>
<input type="number" id="penerima" style="width:85%" onkeyup="wd();" class="input-text" placeholder="Masukkan nomor rekening"/><br/><br/>
</div>
<div class="column">
<br/><br/>
<div class="widget">
<div class="row">
<div class="column">
<h3>Yang diterima sebesar:</h3>
<h3>Rp</h3><h2 id="nom">0</h2><br/>
</div>
<div class="column">
<h3>Ke rekening:</h3>
<h2 id="norek">7135260801</h2> <h3 id="bp">BCA</h3><br/>
</div>
</div><br/>
<button id="wdrek" onclick="wdrek(<?= $getUserLogin['id']; ?>)" class="btn" style="background:white;color:black;">Konfirmasi Withdraw</button>
</div>
</div>
</div>
<hr style="width:100%;border-size:1px;"/>

<div class="row">
<div class="column">
<h3><u>Withdraw Emas Antam</u></h3>
<label for="nominal">Berat <span style="font-size:10px;">(gr)</span></label><br/>
<?php
	if (number_format($getUserLogin['aset']/$con->query("SELECT harga from riwayat_harga ORDER BY waktu DESC limit 1")->fetch_assoc()['harga'], 4, '.', '') < 1){
?>
<select onchange="berat()" class="input-text" id="berat" disabled>
<option value="1">1 gram</option>
<option value="2">2 gram</option>
<option value="3">3 gram</option>
<option value="5">5 gram</option>
<option value="10">10 gram</option>
<option value="25">25 gram</option>
</select>
<?php
	}else{
?>
<select onchange="berat()" class="input-text" id="berat">
<option value="1">1 gram</option>
<option value="2">2 gram</option>
<option value="3">3 gram</option>
<option value="5">5 gram</option>
<option value="10">10 gram</option>
<option value="25">25 gram</option>
</select>
<?php
	}
?>

<br/><br/>
<label for="bpengirim">Nama Penerima</label><br/>
<input type="text" style="width:85%;" id="nmpenerima" class="input-text" placeholder="Masukkan nama penerima" required/><br/><br/>
</div>
<div class="column">
<br/><br/>
<div style="width:75%;" class="widget">
<label for="pengirim">Lokasi Pengambilan</label><br/>
<select class="input-text" id="lokasi">
<option value="ach">Aceh</option>
<option value="bpp">Balikpapan</option>
<option value="bdg">Bandung</option>
<option value="jkt">Jakarta</option>
<option value="mlg">Malang</option>
<option value="smd">Samarinda</option>
<option value="yog">Yogyakarta</option>
</select><br/><br/>
<button class="btn" onclick="wdfisik(<?= $getUserLogin['id']; ?>)" id="wdfisik" style="background:white;color:black;">Konfirmasi Withdraw</button>
</div>
</div>
</div>
<br/>
<b id="suc"></b>
<script type="text/javascript">
function wd(){
	document.getElementById("norek").innerHTML = document.getElementById("penerima").value;
	document.getElementById("bp").innerHTML = document.getElementById("bpenerima").value;
	if (document.getElementById("nominal").value >= 10000){
		if (document.getElementById("nominal").value > <?= $getUserLogin['aset']; ?>){
			document.getElementById("nom").innerHTML = 0;
			document.getElementById("nominal").style.border = "1px solid red";
		}else{
			document.getElementById("nom").innerHTML = document.getElementById("nominal").value;
			document.getElementById("nominal").style.border = "1px solid #bdc3c7";
		}
	}else{
		document.getElementById("nom").innerHTML = 0;
		document.getElementById("nominal").style.border = "1px solid red";
	}
}
function berat(){
	if (document.getElementById("berat").value > <?= number_format($getUserLogin['aset']/$con->query("SELECT harga from riwayat_harga ORDER BY waktu DESC limit 1")->fetch_assoc()['harga'], 4, '.', ''); ?>){
		console.log(document.getElementById("berat").value);
		console.log(<?= number_format($getUserLogin["aset"]/$con->query("SELECT harga from riwayat_harga ORDER BY waktu DESC limit 1")->fetch_assoc()['harga'], 4, '.', ''); ?>);
		document.getElementById("berat").style.border = "1px solid red";
		document.getElementById("wdfisik").disabled = true;
	}else{
		document.getElementById("berat").style.border = "1px solid #bdc3c7";
		document.getElementById("wdfisik").disabled = false;
	}
}
function wdrek(i){
	if (document.getElementById("nominal").value === "" || document.getElementById("penerima").value === "" || document.getElementById("bpenerima").value === ""){
		if (document.getElementById("nominal").value === ""){
			document.getElementById("nominal").style.border = "1px solid red";
		}else{
			document.getElementById("nominal").style.border = "1px solid #bdc3c7";
		}
		if (document.getElementById("penerima").value === ""){
			document.getElementById("penerima").style.border = "1px solid red";
		}else{
			document.getElementById("penerima").style.border = "1px solid #bdc3c7";
		}
		if (document.getElementById("bpenerima").value === ""){
			document.getElementById("bpenerima").style.border = "1px solid red";
		}else{
			document.getElementById("bpenerima").style.border = "1px solid #bdc3c7";
		}
	}else{
		var xmlhttp = new XMLHttpRequest();
		var url = "../api/api.php";
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var data = JSON.parse(this.responseText);
				if (data.success){
					 document.getElementById("suc").innerHTML = "&nbsp;Withdraw Rupiah berhasil, silahkan cek halaman riwayat transaksi.";
				}
			}
		};
		xmlhttp.open("POST", url, true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send("t=wd&nom="+document.getElementById("nominal").value+"&idu="+i+"&bp="+document.getElementById("bpenerima").value+"&p="+document.getElementById("penerima").value);
	}
}
function wdfisik(i){
	if (document.getElementById("nmpenerima").value === ""){
		document.getElementById("nmpenerima").style.border = "1px solid red";
	}else{
		document.getElementById("nmpenerima").style.border = "1px solid #bdc3c7";
		var xmlhttp = new XMLHttpRequest();
		var url = "../api/api.php";
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var data = JSON.parse(this.responseText);
				if (data.success){
					 document.getElementById("suc").innerHTML = "&nbsp;Withdraw Fisik berhasil, silahkan cek halaman riwayat transaksi.";
				}
			}
		};
		xmlhttp.open("POST", url, true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send("t=wd&t2=fis&nom="+document.getElementById("berat").value+"&idu="+i+"&p="+document.getElementById("nmpenerima").value+"&l="+document.getElementById("lokasi").value);
	}
}
</script>
