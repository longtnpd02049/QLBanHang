<?php 
	$sql_tenloaisp="select *from loaisp where id_loaisp='$_GET[id]'";
	$query_tenloaisp=mysql_query($sql_tenloaisp);
	$dong_tenloaisp=mysql_fetch_array($query_tenloaisp);
?>
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
?>
<?php
	$sql_chitietloaisp="select *from chitietsp where id_loaisp='$_GET[id]' order by thutu desc limit $trang1,12";
	$query_chitietloaisp=mysql_query($sql_chitietloaisp);
?>
<p style="text-align:center;color:red;padding:10px;font-weight:bold;"><?php echo $dong_tenloaisp['tenloaisp'] ?></p>
<div class="sanphamall">
	<?php
		while($dong_chitietloaisp=mysql_fetch_array($query_chitietloaisp)){
	?>
    <div class="sanpham">
            <a href="index.php?act=chitietsanpham&idloaisp=<?php echo $dong_chitietloaisp['id_loaisp'] ?>&id=<?php echo $dong_chitietloaisp['id_sp'] ?>"><img src="admincp/modules/quanlychitietsp/uploads/<?php echo $dong_chitietloaisp['hinhanh']?>" width="100" height="100"/></a>
            <br><br>
            <div class="ten"><?php echo $dong_chitietloaisp['tensp'] ?></div>
            <div class="gia">
                <?php echo number_format($dong_chitietloaisp['gia']) ?>đ
            </div>
            <div class="chitiet-sp">
                <a href="index.php?act=chitietsanpham&idloaisp=<?php echo $dong_chitietloaisp['id_loaisp'] ?>&id=<?php echo $dong_chitietloaisp['id_sp'] ?>">Chi tiết</a>
            </div>
        </a>
    </div>
    <?php
		}
	?>
</div><!---Kết thúc sản phẩm all-->
<center>
<?php
	$sql_chitietsp="select * from chitietsp where chitietsp.id_loaisp='$_GET[id]'";
	$sql_chitietsp_run=mysql_query($sql_chitietsp);
	$count_chitietsp=mysql_num_rows($sql_chitietsp_run);
	$sodong=ceil($count_chitietsp/12);
	//echo $sodong;
	if($get_trang>$sodong){
		echo 'Trang này không tồn tại</br>';
		exit;
	}
	
	if($sodong>1){
		echo 'Trang:';
		for($b=1;$b<=$sodong;$b++){
			echo '<a href="?act=chitietloaisanpham&id='.$_GET["id"].'&trang='.$b.'" style="margin-left:15px;text-decoration:none;">'.$b.'</a>';
		}
		if($get_trang<>''){
			echo '<br>Trang hiện tại: '.$get_trang;
		}
	}
?>
</center>