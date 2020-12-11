<?php
function encryptPw($s){
	return base64_encode(strrev(base64_encode(base64_encode(strrev($s)))));
}
function decryptPw($s){
	return strrev(base64_decode(base64_decode(strrev(base64_decode($s)))));
}
?>