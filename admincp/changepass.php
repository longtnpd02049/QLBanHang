<div align="center">
<?php
	if(isset($_POST['doimatkhau'])){
		$matkhaucu=$_POST['matkhaucu'];
		$matkhaumoi=$_POST['matkhaumoi'];
		$sql="select *from admin where username='admin' limit 1";
		$query=@mysql_query($sql);
		$info=@mysql_fetch_array($query);
		if($info['password']!=$matkhaucu){
			echo '<script>alert("mật khẩu cũ không đúng")</script>';
		}else{
			$sql_capnhat=@mysql_query("update admin set password='$matkhaumoi'");
			echo '<script>alert("Đổi mật khẩu thành công")</script>';
		}
	}
?>
<h3>Đổi mật khẩu Admin</h3>
<form action="" method="post">
	<label>Mật khẩu cũ: <label>
    <input type="password" name="matkhaucu"/><br><br>
    <label>Mật khẩu mới: </label>
    <input type="password" name="matkhaumoi"/><br><br>
    <input type="submit" name="doimatkhau" value="Đổi mật khẩu"/>
</form>
</div>