<?php
	$tenmaychu="localhost";
	$tentaikhoan="root";
	$pass="";
	$csdl="QLBanHang";
	$conn=@mysql_connect($tenmaychu,$tentaikhoan,$pass,$csdl) or die("Không thể kết nối đến database");
	@mysql_select_db($csdl,$conn);
?>