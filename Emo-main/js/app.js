$(document).ready(function(){
	var dateskrg = new Date();
	var month = dateskrg.getMonth();
	var day = dateskrg.getDate();
	var oke = false;
	if (month < 10){
		month = "0"+dateskrg.getMonth();
	}
	if (day < 10){
		day = "0"+dateskrg.getDate();
	}
	$("#tgllahir").val((dateskrg.getFullYear()+"-"+month+"-"+day));
	
	$("#password").keyup(function(){
		check_daftar();
	});
	$("#repassword").keyup(function(){
		check_daftar();
	});
	$("#agreement").change(function(){
		check_daftar();
	});
	$("#deposit-page").click(function(){
		$('#main-content').load('page/deposit.html');

	});
	$("#daftarakun").click(function(){
		if ($("#password").val() !== $("#repassword").val()){
			alert("Gagal Daftar. Password tidak sama");
		}else{
			if ($("#password").val() !== "" && $("#nd").val() !== ""  && $("#nb").val() !== ""  && $("#hp").val() !== "" 
			&& $("#email").val() !== ""  && $("#tgllahir").val() !== ""  && $("#alamat").val() !== ""){
				$.ajax({
					url:"api/api.php ",
					type:"POST",
					dataType: "json",
					data:{
						t: "register",
						namadepan: $("#nd").val(),
						namabelakang: $("#nb").val(),
						email: $("#email").val(),
						nohp: $("#hp").val(),
						tgl: $("#tgllahir").val(),
						alamat: $("#alamat").val(),
						pw: $("#password").val(),
						repw: $("#repassword").val()
					},
					success:function(response) {
						if (response.success){
							alert("Berhasil daftar");
							document.location.href='login.php';
						}else{
							alert("Pendaftaran gagal. "+response.response);
						}
					},
				});
			}else{
				alert("Gagal Daftar. Pastikan semua form terisi.");
			}
		}
	});
	function check_daftar(){
		if ($("#password").val() === "" || $("#repassword").val() === ""){
			if($("#password").val() === ""){
				$("#password").css('border', '1px solid #e74c3c');
			}else{
				$("#repassword").css('border', '1px solid #e74c3c');
			}
			$("#warnregister").html("*Password harus diisi");
		}else{
			
			$("#password").css('border', '1px solid #bdc3c7');
			$("#repassword").css('border', '1px solid #bdc3c7');
			if ($("#password").val() !== $("#repassword").val()){
				$("#repassword").css('border', '1px solid #e74c3c');
				$("#warnregister").html("*Kedua password harus sama");
			}else{
				$("#repassword").css('border', '1px solid #bdc3c7');
				if ($("#password").val().length < 8){
					$("#password").css('border', '1px solid #e74c3c');
					$("#repassword").css('border', '1px solid #e74c3c');
					$("#warnregister").html("*Password minimal 8 karakter");
				}else{
					$("#password").css('border', '1px solid #bdc3c7');
					$("#repassword").css('border', '1px solid #bdc3c7');
					if($("#agreement").is(':checked')){	
						$("#warnregister").html("");
						oke=true;
					}else{
						$("#warnregister").html("*Persetujuan harus dicentang");
						oke=false;
					}
				}
			}
		}
		if (oke){
			$("#daftarakun").prop('disabled', false);
		}else{
			$("#daftarakun").prop('disabled', true);
		}
	}
});