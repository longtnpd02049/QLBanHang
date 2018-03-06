<?php
	session_start();
?>
<h1>Giỏ hàng</h1>
<?php
	//session_destroy();
	//thêm sản phẩm
	if(isset($_GET['add']) && !empty($_GET['add'])){
		$id=$_GET['add'];
		@$_SESSION['cart_'.$id]+=1;
		header('location:index.php?act=giohang');
	}
	//Cộng sản phẩm
	if(isset($_GET['them'])){	
		$_SESSION['cart_'.$_GET['them']]+=1;
		header('location:index.php?act=giohang');
	}
	//trừ sản phẩm
	if(isset($_GET['tru'])){
		if($_SESSION['cart_'.$_GET['tru']]!=1){
			$_SESSION['cart_'.$_GET['tru']]--;
			header('location:index.php?act=giohang');
		}
	}
	//xóa sản phẩm
	if(isset($_GET['xoa'])){
		$_SESSION['cart_'.$_GET['xoa']]=0;
		header('location:index.php?act=giohang');
	}
	?>
	<center><table width="90%" border="1" cellspacing="10" style="border-collapse:collapse;text-align:center;border:1px dotted;">
   <tr>
    <td><a style="font-weight:bold;">Hình ảnh</a></td>
    <td><a style="font-weight:bold;">Tên sản phẩm</a></td>
    <td><a style="font-weight:bold;">Giá sản phẩm</a></td>
    <td><a style="font-weight:bold;">Số lượng</a></td>
    <td><a style="font-weight:bold;">Tổng tiền</a></td>
    <td><a style="font-weight:bold;">Thêm</a></td>
    <td><a style="font-weight:bold;">Giảm</a></td>
    <td><a style="font-weight:bold;">Xóa</a></td>
  </tr>
  <?php
	//hiển thị sản phẩm đã thêm
	$tongtien=0;
	$thanhtien=0;
	foreach($_SESSION as $name => $value){
		if($value>0){
			if(substr($name,0,5)=='cart_'){
				$id=substr($name,5,strlen($name-5));
				$sql='SELECT * FROM chitietsp where id_sp="'.$id.'"';
				$query=mysql_query($sql);
				/*if(!$query)
				{
					echo 'Lỗi SQL: '.mysql_error();
					echo "\r\n<br />";
					echo 'SQL: '.$sql;
					exit;
				}*/
				while($dong=mysql_fetch_array($query)){
					$tongtien=$dong['gia']*$value;
					?>
                      <tr>
                      	<td><img src="admincp/modules/quanlychitietsp/uploads/<?php echo $dong['hinhanh']?>" width="70" height="70"/><br></td>
						<td><a style="font-weight:bold;color:blue;"><?php echo $dong['tensp'] ?></a></td>
                        <td><a style="font-weight:bold;color:red;"><?php echo number_format($dong['gia']) ?>đ</a></td>
						<td><a style="font-weight:bold;color:blue;"><?php echo $value?></a></td>
                        <td><a style="font-weight:bold;color:red;"><?php echo number_format($tongtien) ?>đ</a></td>
						<td><?php echo '<a href="index.php?act=giohang&them='.$id.'" style="margin:10px;"><img src="images/them.png" width="30" height="30"/></a>' ?></td>
						<td><?php echo '<a href="index.php?act=giohang&tru='.$id.'" style="margin:10px;"><img src="images/tru.png" width="27" height="27"/></a>' ?></td>
						<td><?php echo '<a href="index.php?act=giohang&xoa='.$id.'" style="margin:10px;"><img src="images/delete.png" width="30" height="30"/></a>' ?></td>
					  </tr>
                    <?php
                    $thanhtien+=$tongtien;
				}			
			}
			
		}
	}
	if($thanhtien==0){
	?>
    	<tr>
		<td colspan="8"><a style="font-weight:bold;color:red;text-align:center;">Giỏ hàng trống</a></td>
        </tr>
	<?php
    }else{
		?>
		<tr>
			<td colspan="8"><a style="font-weight:bold;"><br>Tổng số tiền tất cả sản phẩm cần thanh toán: </a><a style="color:red;font-weight:bold;"><?php echo number_format($thanhtien) ?>đ</a></td>
		</tr>	
	<?php 
	}
	?>
	</table></center><br><br>
    <?php
    if($thanhtien<>0){
		echo '<p style="float:right;"><a href="index.php?act=thanhtoan">Thanh toán</a></p>';
    }
	?>