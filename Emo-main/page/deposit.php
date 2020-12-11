<?php
include '../lib/koneksi.php';
session_start();
$getUserLogin = $con->query("SELECT * from user where email='".$_SESSION['email']."' LIMIT 1")->fetch_assoc();

?><meta name="viewport" content="width=device-width, initial-scale=1">

<link href="../css/page.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro">
<h1 class="page-title">• Deposit</h1>
<div class="widget">
<u><b>Informasi:</b></u>
<p>Akan terdapat 3 digit sebagai angka unik untuk pengecekan. Nama pengirim harus sesuai dengan nama akun.<br/>Mohon untuk diperhatikan lebih baik karena kesalahan dapat diproses dalam waktu 24x7 jam.</p>
</div><br/>
<br/>
<div class="row">
<div class="column">
<label for="nominal">Nominal</label><br/>
<input type="number" style="width:85%;" id="nominal" onkeyup="nominal();" min="10000" class="input-text" placeholder="10000"/><br/><br/>
<label for="bpengirim">Bank Pengirim</label><br/>
<input type="text" style="width:85%;" id="bpengirim" class="input-text" placeholder="Masukkan nama bank"/><br/><br/>
<label for="pengirim">Nama Pengirim</label><br/>
<input type="text" style="width:85%;"id="pengirim" class="input-text" placeholder="Masukkan nama"/><br/><br/>
</div>
<div class="column">
<label for="pengirim">Tujuan</label><br/>
<select id="tujuan" onchange="nominal();" class="input-text">
<option value="1">BCA VA (Otomatis)</option>
<option value="2">BNI VA (Otomatis)</option>
<option value="3">BRI VA (Otomatis)</option>
<option value="4">BCA Transfer (Manual)</option>
<option value="5">BNI Transfer (Manual)</option>
<option value="6">BRI Transfer (Manual)</option>
</select>
<br/><br/>
<div class="widget">
<div class="row">
<div class="column">
<h3>Yang harus dibayarkan sebesar:</h3>
<h3>Rp</h3><h2 id="nom">0</h2><br/>
</div>
<div class="column">
<h3>Ke rekening:</h3>
<h2>7135260801</h2> <h3>BCA</h3><br/>
</div>
</div>
<button class="btn" id="konf" onclick="conf(<?= $getUserLogin['id']; ?>)" style="background:white;color:black;" disabled>Konfirmasi Deposit</button>
</div>
</div>
</div>
<br/>
<b id="suc"></b>
<script type="text/javascript">
var unique=0;
function generateU(){
	unique = parseInt(document.getElementById("nominal").value)+Math.floor(Math.random() * (999 - 101) ) + 101;
}
function conf(i){
	if (document.getElementById("nominal").value === "" || document.getElementById("bpengirim").value === "" || document.getElementById("pengirim").value === ""){
		if (document.getElementById("nominal").value === ""){
			document.getElementById("nominal").style.border = "1px solid red";
		}else{
			document.getElementById("pengirim").style.border = "1px solid #bdc3c7";
		}
		if (document.getElementById("pengirim").value === ""){
			document.getElementById("pengirim").style.border = "1px solid red";
		}else{
			document.getElementById("pengirim").style.border = "1px solid #bdc3c7";
		}
		if (document.getElementById("bpengirim").value === ""){
			document.getElementById("bpengirim").style.border = "1px solid red";
		}else{
			document.getElementById("bpengirim").style.border = "1px solid #bdc3c7";
		}
	}else{
		document.getElementById("pengirim").style.border = "1px solid #bdc3c7";
		document.getElementById("nominal").style.border = "1px solid #bdc3c7";
		document.getElementById("bpengirim").style.border = "1px solid #bdc3c7";
		
		var xmlhttp = new XMLHttpRequest();
		var url = "../api/api.php";

		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var adata = JSON.parse(this.responseText);
				if (adata.success){
					 document.getElementById("suc").innerHTML = "&nbsp;Deposit berhasil, silahkan cek halaman riwayat transaksi.";
				}
			}
		};
		xmlhttp.open("POST", url, true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send("t=deposit&nom="+document.getElementById("nominal").value+"&idu="+i+"&via="+document.getElementById("tujuan").value);
	}
}
function nominal(){
	if (document.getElementById("nominal").value >= 10000){
		if (document.getElementById("tujuan").value >= 4){
			if (unique == 0){
				generateU();
			}
			document.getElementById("nom").innerHTML = unique;
		}else{
			document.getElementById("nom").innerHTML = document.getElementById("nominal").value;
			document.getElementById("konf").disabled = false;
		}
		document.getElementById("nominal").style.border = "1px solid #bdc3c7";
	}else{
		document.getElementById("konf").disabled = true;
		document.getElementById("nom").innerHTML = 0;
		document.getElementById("nominal").style.border = "1px solid red";
	}
}
</script>
