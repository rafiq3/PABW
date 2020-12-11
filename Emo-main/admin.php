<html>
<head>
	<!-- Meta -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard - Emo</title>
	<link href="css/style.css" rel="stylesheet"/>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro">
</head>
<body style="background:white">
	<div class="sidenav">
		<img src="https://cdn.iconscout.com/icon/free/png-512/account-profile-avatar-man-circle-round-user-30452.png" class="profile-img"/>
		<center><p><b>admin</b></p></center><br/>
		<hr style="border: 1px solid #f6b1a7;width:100%;"/><br/>
		<a href="#" onclick="switchPage('admin')">Beranda</a>
		<a href="#" onclick="switchPage('deposit-admin')">Deposit User</a>
		<a href="#">Help</a>
	</div>
	<div class="main" id="main-content">
		<object type="text/html" width="100%" height="100%" data="page/beranda-admin.php" ></object>
	</div>
	<script src="js/main.js" type="text/javascript"></script>
</body>
</html>