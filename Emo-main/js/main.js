function switchPage(p){
	switch(p){
		case "aset":
			document.getElementById("main-content").innerHTML='<object type="text/html" width="100%" height="100%" data="page/aset.php" ></object>';
			document.title = "Aset - Emo";
		break;
		case "transaksi":
			document.getElementById("main-content").innerHTML='<object type="text/html" width="100%" height="100%" data="page/transaksi.php" ></object>';
			document.title = "Transaksi - Emo";
		break;
		case "deposit":
			document.getElementById("main-content").innerHTML='<object type="text/html" width="100%" height="100%" data="page/deposit.php" ></object>';
			document.title = "Deposit - Emo";
		break;
		case "withdraw":
			document.getElementById("main-content").innerHTML='<object type="text/html" width="100%" height="100%" data="page/withdraw.php" ></object>';
			document.title = "Withdraw - Emo";
		break;
		case "riwayat":
			document.getElementById("main-content").innerHTML='<object type="text/html" width="100%" height="100%" data="page/riwayat_login.php" ></object>';
			document.title = "Riwayat Login - Emo";
		break;
		case "admin":
			document.getElementById("main-content").innerHTML='<object type="text/html" width="100%" height="100%" data="page/beranda-admin.php" ></object>';
		break;
		case "deposit-admin":
			document.getElementById("main-content").innerHTML='<object type="text/html" width="100%" height="100%" data="page/deposit-admin.php" ></object>';
		break;
		case "bantuan":
			document.getElementById("main-content").innerHTML='<object type="text/html" width="100%" height="100%" data="page/bantuan.php" ></object>';
		break;
		default:
			document.getElementById("main-content").innerHTML='<object type="text/html" width="100%" height="100%" data="page/beranda.php" ></object>';
			document.title = "Dashboard - Emo";
		break;
	}
}

