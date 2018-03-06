<?php
	$id=$_GET['id'];
	include("../config.php");
	$tensp=$_POST["tensp"];
	$mota=$_POST["motasp"];
	$gia=$_POST["gia"];
	$thutu=$_POST['thutu'];
	$loaisp=$_POST["loaisp"];
	$hinhanh=$_FILES['hinhanh']['name'];
	$hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
	move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);

	if(isset($_POST["them"])){
		if ( mysql_num_rows(mysql_query("select *from chitietsp WHERE tensp='$tensp'"))>0) {
			echo '<script>alert("Sản phẩm này đã tồn tại");
				window.history.back();
				</script>';
				exit;
		}
		//thêm
		$sql="insert into chitietsp (tensp,thutu,mota,gia,id_loaisp,hinhanh) value('$tensp','$thutu','$mota','$gia','$loaisp','$hinhanh')";
		mysql_query($sql);
		header("location:../../index.php?quanly=quanlychitietsp&act=them");
	}elseif(isset($_POST["sua"])){
		//sửa
		if($hinhanh!=''){
		$sql="update chitietsp set tensp='$tensp',thutu='$thutu',mota='$mota',gia='$gia',id_loaisp='$loaisp',hinhanh='$hinhanh' where id_sp='$id'";
		mysql_query($sql);
		header("location:../../index.php?quanly=quanlychitietsp&act=sua&id=".$id);
		}else{
		$sql="update chitietsp set tensp='$tensp',thutu='$thutu',mota='$mota',gia='$gia',id_loaisp='$loaisp' where id_sp='$id'";
		mysql_query($sql);
		header("location:../../index.php?quanly=quanlychitietsp&act=sua&id=".$id);	
		}
	}else{
		//xóa
		$sql="delete from chitietsp where id_sp='$id'";
		mysql_query($sql);
		header("location:../../index.php?quanly=quanlychitietsp&act=them");
	}
?>