<?php
include '../lib/koneksi.php';
?>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="../css/page.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro">
<h1 class="page-title">• Riwayat Deposit & Withdrawal</h1>
<br/>
<h2>Deposit user:</h2>
<table>
	<tr>
		<th>User</th>
		<th>Via</th>
		<th>Jumlah</th>
		<th>Time</th>
	<tr/>
	<?php
		$q = $con->query("SELECT * FROM transaksi where tipe='Deposit' ORDER BY time DESC");
		while ($r = $q->fetch_assoc()){
			$e = explode(' ', $r['deskripsi']);
			echo "<tr>";
			echo "<td>".$con->query("SELECT email from user where id='".$r['id_user']."'")->fetch_assoc()['email']."</td>";
			echo "<td>".$e[1]." ".$e[2]."</td>";
			echo "<td>".number_format($r['jumlah'], 0, '.', '.')."</td>";
			echo "<td>".$r['time']."</td>";
			echo "</tr>";
			
		}
	?>
</table>
<br/>
<br/>
<h2>Withdrawal user:</h2>
<table>
	<tr>
		<th>User</th>
		<th>Deskripsi</th>
		<th>Jumlah</th>
		<th>Time</th>
	<tr/>
	<?php
		$q = $con->query("SELECT * FROM transaksi where tipe like '%withdraw%' ORDER BY time DESC");
		while ($r = $q->fetch_assoc()){
			//$e = explode(' ', $r['deskripsi']);
			echo "<tr>";
			echo "<td>".$con->query("SELECT email from user where id='".$r['id_user']."'")->fetch_assoc()['email']."</td>";
			echo "<td>".$r['deskripsi']."</td>";
			echo "<td>".number_format($r['jumlah'], 0, '.', '.')."</td>";
			echo "<td>".$r['time']."</td>";
			echo "</tr>";
			
		}
	?>
</table>