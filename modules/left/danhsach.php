<?php
	header('Content-Type: text/html; charset=utf-8');
	$sql_loaisp="select *from loaisp order by thutu";
	$query=mysql_query($sql_loaisp);
?>
<p style="text-align:center;color:red;padding:10px;font-weight:bold;">DANH MỤC SẢN PHẨM</p>
<div class="danhsachsanpham">
    <ul>
    	<?php
			while($dong_sp=mysql_fetch_array($query)){
		?>
        <li><a href="index.php?act=chitietloaisanpham&id=<?php echo $dong_sp['id_loaisp']?>"><?php echo $dong_sp['tenloaisp']?></a></li>
        <?php
			}
		?>
    </ul>
</div> <!--Kết thúc danh mục sản phẩm-->
<p style="text-align:center;color:red;padding:10px;font-weight:bold;">HÃNG SẢN PHẨM</p>
<div class="hangsanpham">
    <ul>
        <li><a href="#">Đồng hồ nữ TiTan</a></li>
        <li><a href="#">Đồng hồ nữ Carnival</a></li>
        <li><a href="#">Đồng hồ AS-VELA</a></li>
        <li><a href="#">Đồng hồ Mwatch</a></li>
    </ul>
</div> <!--Kết thúc hãng sản phẩm-->