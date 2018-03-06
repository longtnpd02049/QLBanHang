
<?php
	$sql_chitietsp="select *from chitietsp where id_sp=$_GET[id]";
	$query_chitietsp=mysql_query($sql_chitietsp);
	$dong_chitietsp=mysql_fetch_array($query_chitietsp);
?>
<table width="100%" border="1" cellspacing="10" style="border-collapse:collapse;margin:10px;padding:10px;height:auto;width:760px;">
  <tr>
    <td colspan="2"><div align="center">Chi tiết sản phẩm</div></td>
  </tr>
  <tr>
    <td rowspan="2"><div align="center"><img alt="<?php echo $dong_chitietsp['hinhanh'] ?>" src="admincp/modules/quanlychitietsp/uploads/<?php echo $dong_chitietsp['hinhanh'] ?>" width="200" height="200"/></div></td>
    <td><div align="center">Tên sản phẩm: <a style="color:red;font-weight:bold;"><?php echo $dong_chitietsp['tensp'] ?></a></div></td>
  </tr>
  <tr>
    <td><div align="center">Giá sản phẩm: <a style="color:red;font-weight:bold;"><?php echo number_format($dong_chitietsp['gia'])?>đ<a></div></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">Mô tả</div></td>
  </tr>
  <tr>
    <td colspan="2"><a style="float:left;margin:10px;"><?php echo $dong_chitietsp['mota']?></a></td>
  </tr>
</table>
  <a href="index.php?act=giohang&add=<?php echo $dong_chitietsp['id_sp'] ?>" style="float:right;"><img src="images/buynow-blue.png"/>				</a>
  <?php
  	$query_loaisp = mysql_query("select *from chitietsp where id_loaisp='$_GET[idloaisp]' and chitietsp.id_sp<>$_GET[id] order by RAND() limit 8");
  ?>
  <p style="text-align:center;color:red;padding:10px;font-weight:bold;clear:both;">SẢN PHẨM CÙNG LOẠI</p>
<div class="sanphamall">
	<?php
        while($dong_loaisp=mysql_fetch_array($query_loaisp)){
    ?>
    <div class="sanpham">
        <a style="color:red;text-decoration:none;" href="index.php?act=chitietsanpham&idloaisp=<?php echo $dong_loaisp['id_loaisp'] ?>&id=<?php echo $dong_loaisp['id_sp'] ?>"><img src="admincp/modules/quanlychitietsp/uploads/<?php echo $dong_loaisp['hinhanh'] ?>" width="100" height="100"/></a><br><br>
        <div class="ten"><?php echo $dong_loaisp['tensp']?></div>
        <div class="gia">
           <?php echo number_format($dong_loaisp['gia'])?>đ
        </div>
        <div class="chitiet-sp">
            <a style="text-decoration:none;" href="index.php?act=chitietsanpham&idloaisp=<?php echo $dong_loaisp['id_loaisp'] ?>&id=<?php echo $dong_loaisp['id_sp'] ?>">Chi tiết</a>
        </div>
        </a>
    </div>
    <?php
		}
	?>
</div><!---Kết thúc sản phẩm all-->