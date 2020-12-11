<?php
include '../lib/koneksi.php';
include '../lib/function.php';

if (empty($_POST['t'])){
	$result = ["success" => false, "reason" => "unknown parameter"];
}else{
	switch($_POST['t']){
		case 'register':
			if($_POST['pw'] != $_POST['repw']){
					$result = ["success" => false, "reason" => "password tidak sama"];
				}else{
					if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
						$result = ["success" => false, "reason" => "Email tidak sesuai"];
					}else{
						if ($con->query("SELECT * FROM user where email='".$_POST['email']."'")->num_rows  > 0){
							$result = ["success" => false, "reason" => "email telah terdaftar"];
						}else{
							$pw = strrev(base64_encode(base64_encode(strrev($_POST['pw']))));
							$query = "INSERT INTO user (email, password, nama_depan, nama_belakang, no_hp, tanggal_lahir, alamat, register_date)
							values ('".$_POST['email']."', '".$pw."', '".$_POST['namadepan']."', '".$_POST['namabelakang']."', '".$_POST['nohp']."', '".$_POST['tgl']."', '".$_POST['alamat']."', '".date('Y-m-d')."')
							";
							if ($con->query($query)){
								$result = ["success" => true];
							}else{
								$result = ["success" => false, "reason" => $con->error];
							}
						}
					}
				}
		break;
		case 'deposit':
			switch($_POST['via']){
				case 1:
				$via = "BCA VA";
				break;
				case 2:
				$via = "BNI VA";
				break;
				case 3:
				$via = "BRI VA";
				break;
				case 4:
				$via = "BCA TRF";
				break;
				case 5:
				$via = "BNI TRF";
				break;
				case 6:
				$via = "BRI TRF";
				break;
				default:
				break;
			}
			$v = "via ".$via;
			$q = $con->query("INSERT INTO transaksi (id_user, tipe, deskripsi, jumlah, time) values ('".$_POST['idu']."', 'Deposit', '".$v."', '".$_POST['nom']."', CURRENT_TIMESTAMP)");
			if ($q){
				$aset = $con->query("SELECT aset FROM user where id='".$_POST['idu']."'")->fetch_assoc()['aset']+$_POST['nom'];
				$con->query("UPDATE user set aset='".$aset."' where id='".$_POST['idu']."'");
				$result = ["success" => true];
			}else{
				$result = ["success" => false, "reason" => "unknown parameter"];
			}
		break;
		case 'wd':
			if(empty($_POST['t2'])){
				$v = "ke ".$_POST['bp']." ".$_POST['p'];
				$q = $con->query("INSERT INTO transaksi (id_user, tipe, deskripsi, jumlah, time) values ('".$_POST['idu']."', 'Withdraw (Rupiah)', '".$v."', '".$_POST['nom']."', CURRENT_TIMESTAMP)");
				if ($q){
					$aset = $con->query("SELECT aset FROM user where id='".$_POST['idu']."'")->fetch_assoc()['aset']-$_POST['nom'];
					$con->query("UPDATE user set aset='".$aset."' where id='".$_POST['idu']."'");
					$result = ["success" => true];
				}else{
					$result = ["success" => false, "reason" => "unknown parameter"];
				}
			}else{
				$v = "Penerima: ".$_POST['p']." Lokasi: ".$_POST['l'];
				$nom = $con->query("SELECT harga from riwayat_harga ORDER BY waktu DESC limit 1")->fetch_assoc()['harga']*$_POST['nom'];
				$q = $con->query("INSERT INTO transaksi (id_user, tipe, deskripsi, jumlah, time) values ('".$_POST['idu']."', 'Withdraw (Fisik)', '".$v."', '".$nom."', CURRENT_TIMESTAMP)");
				if ($q){
					$aset = $con->query("SELECT aset FROM user where id='".$_POST['idu']."'")->fetch_assoc()['aset']-$nom;
					$con->query("UPDATE user set aset='".$aset."' where id='".$_POST['idu']."'");
					$result = ["success" => true];
				}else{
					$result = ["success" => false, "reason" => "unknown parameter"];
				}
			}
		break;
		default:
			$result = ["success" => false, "reason" => "unknown parameter"];
		break;
	}
}
print_r(json_encode($result));

?>