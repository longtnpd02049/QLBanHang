<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng nhập trang quản trị</title>
</head>
<body>
<?php
	include("modules/config.php");
	session_start();
	//session_destroy();
	if(isset($_POST['login'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$sql="select *from admin where username='$username' and password='$password' limit 1";
		$query=mysql_query($sql);
		$nums=mysql_num_rows($query);
		$dong=mysql_fetch_array($query);
		if($nums>0){
			$_SESSION['dangnhapadmin']=$username;
			if($dong['loai_user']=='Admin'||$dong['loai_user']=='admin'||
			$dong['loai_user']=='moderator'||$dong['loai_user']=='Moderator'){
				header("location:index.php");
			}else{
				//header("location:login.php");
				echo '<center><big><big><big><a style="color:red;">Bạn không có quyền để truy cập vào trang này</a></big></big></big></center><br><br>';
			}
		}else{
			header("location:login.php");
		}
	}
?>
<form action="" method="post">
	<center><table width="200" border="1" cellspacing="10" style="border-collapse:collapse;">
    	<tr>
        	<td colspan="2"><div align="center">Login</div></td>
        </tr>
      	<tr>
        	<td>UserName</td>
        	<td><input type="text" name="username" size="20"/></td>
      	</tr>
      	<tr>
        	<td>PassWord</td>
        	<td><input type="password" name="password" size="20"/></td>
      	</tr>
      	<tr>
            <td colspan="2">
              <div align="center">
                <button name="login">Login</button>
              </div>
            </td>
    	</tr>
    </table></center>
</form>
</body>
</html>