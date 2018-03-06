<?php
	$id=$_GET['id'];
	include("../config.php");
	$tenloaisp=$_POST["tenloaisp"];
	$thutu=$_POST["thutu"];
	if(isset($_POST["them"])){
		//thêm
		$sql="insert into loaisp (tenloaisp,thutu) value('$tenloaisp','$thutu')";
		mysql_query($sql);
		header("location:../../index.php?quanly=quanlyloaisp&act=them");
	}elseif(isset($_POST["sua"])){
		//sửa
		$sql="update loaisp set tenloaisp='$tenloaisp',thutu='$thutu' where id_loaisp='$id'";
		mysql_query($sql);
		header("location:../../index.php?quanly=quanlyloaisp&act=sua&id=".$id);
	}else{
		//xóa
		$sql="delete from loaisp where id_loaisp='$id'";
		mysql_query($sql);
		header("location:../../index.php?quanly=quanlyloaisp&act=them");
	}
?>