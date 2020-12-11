<?php
session_start();
include '../lib/koneksi.php';
$getUserLogin = $con->query("SELECT * from user where email='".$_SESSION['email']."' LIMIT 1")->fetch_assoc();

?>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="../css/page.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro">
<h1 class="page-title">• Riwayat Transaksi</h1>
<br/>
<h2>Riwayat deposit:</h2>
<table>
	<tr>
		<th>#</th>
		<th>Tipe</th>
		<th>Deskripsi</th>
		<th>Jumlah</th>
		<th>Waktu</th>
	<tr/>
	<?php
		$q = $con->query("SELECT * FROM transaksi where id_user='".$getUserLogin['id']."' and tipe like '%deposit%' ORDER BY time DESC");
		$i = 1;
		while ($r = $q->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$i."</td>";
			echo "<td>".$r['tipe']."</td>";
			echo "<td>".$r['deskripsi']."</td>";
			echo "<td>".number_format($r['jumlah'], 0, '.', '.')."</td>";
			echo "<td>".$r['time']."</td>";
			echo "</tr>";
			$i++;
		}
	?>
</table>
<br/>
<br/>
<h2>Riwayat Withdrawal:</h2>
<table>
	<tr>
		<th>#</th>
		<th>Tipe</th>
		<th>Deskripsi</th>
		<th>Jumlah</th>
		<th>Waktu</th>
	<tr/>
	<?php
		$q = $con->query("SELECT * FROM transaksi where id_user='".$getUserLogin['id']."' and tipe like '%withdraw%' ORDER BY time DESC");
		$i = 1;
		while ($r = $q->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$i."</td>";
			echo "<td>".$r['tipe']."</td>";
			echo "<td>".$r['deskripsi']."</td>";
			echo "<td>".number_format($r['jumlah'], 0, '.', '.')."</td>";
			echo "<td>".$r['time']."</td>";
			echo "</tr>";
			$i++;
		}
	?>
</table>