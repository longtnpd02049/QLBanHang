<?php
	if(isset($_GET['trang'])){
		$get_trang=$_GET['trang'];
	}else{
		$get_trang='';	
	}
	if($get_trang==''||$get_trang==1){
		$trang1=0;
	}else{
		$trang1=($get_trang*12)-12;	
	}
	$query_all="select *from chitietsp order by thutu desc limit $trang1,12";
	$run_all=mysql_query($query_all);
?>
<p style="text-align:center;color:red;padding:10px;font-weight:bold;">TẤT CẢ SẢN PHẨM</p>
<div class="sanphamall">
	<?php
        while($dong_all=mysql_fetch_array($run_all)){
    ?>
    <div class="sanpham">
        <a style="color:red;text-decoration:none;" href="index.php?act=chitietsanpham&idloaisp=<?php echo $dong_all['id_loaisp'] 
		?>&id=<?php echo $dong_all['id_sp'] ?>"><img src="admincp/modules/quanlychitietsp/uploads/<?php echo $dong_all['hinhanh'] ?>" width="100" height="100"/></a><br><br>
        <div class="ten"><?php echo $dong_all['tensp']?></div>
        <div class="gia">
           <?php echo number_format($dong_all['gia'])?>đ
        </div>
        <div class="chitiet-sp">
            <a href="index.php?act=chitietsanpham&idloaisp=<?php echo $dong_all['id_loaisp'] ?>&id=<?php echo $dong_all['id_sp'] ?>">Chi tiết</a>
        </div>
        </a>
    </div>
    <?php
		}
	?>
</div><!---Kết thúc sản phẩm all-->
<p style="clear:both;"></p>
<br>
<center>

<?php

	$sql_trang=mysql_query("select *from chitietsp");
	$count=mysql_num_rows($sql_trang);
	$a=ceil($count/12); //mỗi trang hiển thị 12 sản phẩm
	if($get_trang>$a){
		echo 'Trang này không tồn tại</br>';
		exit;
	}
	
	if($a>1){
		echo 'Trang:';
		for($b=1;$b<=$a;$b++){
			echo '<a href="index.php?trang='.$b.'" style="margin-left:15px;text-decoration:none;">'.$b.'</a>';
		}
		if($get_trang<>''){
			echo '<br>Trang hiện tại: '.$get_trang;
		}
	}
?>
</center>