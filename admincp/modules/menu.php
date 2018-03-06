<?php
	if(isset($_GET['act'])&&$_GET['act']=='logout'){
		unset($_SESSION['dangnhapadmin']);
		header("location:login.php");
	}
?>
<div class="menu">
    <ul>
        <li><a href="index.php">Trang chủ</a></li>
        <li><a href="index.php?quanly=quanlyloaisp&act=them">Quản lý loại sản phẩm</a></li>
        <li><a href="index.php?quanly=quanlychitietsp&act=them">Quản lý chi tiết sản phẩm</a></li>
        <li><a href="index.php?quanly=changepass">Đổi mật khẩu</a></li>
        <li><a href="index.php?act=logout">Đăng xuất</a></li>
    </ul>
</div><!-----Kết thúc menu div----->