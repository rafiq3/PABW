<?php
include '../lib/koneksi.php';
?>
<link href="../css/page.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro">
<h1 class="page-title">• Selamat datang admin!</h1>
<div class="widget">
<h2>Update harga emas</h2>
<form action="" method="POST">
<input type="number" id="emas" name="harga-emas" min="10000" class="input-text" placeholder="10000"/><br/><br/>
<input type="submit" id="emas" value="Update Harga" name="update" min="10000" class="btn" style="background:white;color:black;" placeholder="10000"/><br/><br/>
</form>
</div><br/>
<?php
if (isset($_POST['update'])){
	$hargaOld = $con->query("SELECT harga from riwayat_harga ORDER BY waktu DESC limit 1")->fetch_assoc()['harga'];
	$q = $con->query("INSERT INTO riwayat_harga (harga, waktu) values ('".$_POST['harga-emas']."',CURRENT_TIMESTAMP)");
	$percent = abs(($_POST['harga-emas']-$hargaOld)/$hargaOld*100);
	if ($_POST['harga-emas'] > $hargaOld){
		$con->query("update user set aset=aset+aset*".$percent."/100 where aset>0");
	}else{
		$con->query("update user set aset=aset-aset*".$percent."/100 where aset>0");
	}
}
?>
<br/>
<h2>Riwayat Harga emas:</h2>
<table>
	<tr>
		<th>Harga/gr</th>
		<th>Harga/5gr</th>
		<th>Harga/10gr</th>
		<th>Waktu</th>
	<tr/>
	<?php
	$q = $con->query("SELECT * FROM riwayat_harga order by waktu desc");
	while ($rows = $q->fetch_assoc()){
		echo "<tr>";
		echo "<td>Rp. ".number_format($rows['harga'], 0, '.', '.')."</td>";
		echo "<td>Rp. ".number_format($rows['harga']*5, 0, '.', '.')."</td>";
		echo "<td>Rp. ".number_format($rows['harga']*10, 0, '.', '.')."</td>";
		echo "<td>".$rows['waktu']."</td>";
		echo "</tr>";
	}
	?>
</table>
	