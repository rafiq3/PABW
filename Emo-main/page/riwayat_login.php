<?php
include '../lib/koneksi.php';
session_start();

$getUserLogin = $con->query("SELECT * from user where email='".$_SESSION['email']."' LIMIT 1")->fetch_assoc();
$getLoginHistory = $con->query("SELECT * from riwayat_login where id_user='".$getUserLogin['id']."'");
?>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="../css/page.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro">
<h1 class="page-title">• Riwayat Login</h1>
<br/>
<h2>Riwayat login:</h2>
<table>
	<tr>
		<th>#</th>
		<th>IP</th>
		<th>Useragent</th>
		<th>Waktu</th>
		<th>Aksi</th>
	<tr/>
	<?php
		$i = 1;
		while($r = $getLoginHistory->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$i."</td>";
			echo "<td>".$r['ip']."</td>";
			echo "<td>".$r['ua']."</td>";
			echo "<td>".$r['time']."</td>";
			echo "<td><a href=\"\"><button class=\"btn\">Bukan saya</button></a></td>";
			$i++;
			echo "</tr>";
		}
	?>
	
</table>