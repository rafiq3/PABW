<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "emo";
$con = new mysqli($host, $user, $pass, $db);
if ($con->connect_error){
	die("Koneksi ke database gagal");
}
?>