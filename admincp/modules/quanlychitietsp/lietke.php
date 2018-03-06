<?php
	$sql="select *from chitietsp,loaisp where loaisp.id_loaisp=chitietsp.id_loaisp order by chitietsp.id_sp desc";
	$run = mysql_query($sql);
	$sql2="select *from loaisp,chitietsp where loaisp.id_loaisp=chitietsp.id_loaisp order by chitietsp.id_sp desc";
	$run2 = mysql_query($sql2);
	?>
<table width="100%" border="1" cellspacing="10">
  <tr>
    <td>ID</td>
    <td>Tên SP</td>
    <td>Hình ảnh</td>
    <td>Giá</td>
    <td>Loại SP</td>
    <td>Thứ Tự</td>
    <td colspan="2">Quản lý</td>
  </tr>
  <?php
  $i=1;
  	while($dong=mysql_fetch_array($run)){
		$dong2=mysql_fetch_array($run2);

  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $dong['tensp']?></td>
    <td style="text-align:center;"><img src="modules/quanlychitietsp/uploads/<?php echo $dong['hinhanh']?>" width="60" height="60"/></td>
    <td><?php echo number_format($dong['gia']).'đ'?></td>
    <td><?php echo $dong['tenloaisp']?></td>
    <td><?php echo $dong2['thutu'] ?></td>
    <td><a href="index.php?quanly=quanlychitietsp&act=sua&id=<?php echo $dong['id_sp']?>">Sửa</a></td>
    <td><a href="modules/quanlychitietsp/xuly.php?id=<?php echo $dong['id_sp']?>">Xóa</a></td>
  </tr>
  <?php
  $i++;
	}
  ?>
</table>
