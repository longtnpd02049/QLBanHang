<?php 
	if(isset($_POST['search'])){
		$search=$_POST['searchtext'];
		$sql_search="select *from chitietsp where tensp LIKE '%$search%'";
		$query_search=mysql_query($sql_search);	
		$count_search=mysql_num_rows($query_search);
	}
?>
	<?php
		if($count=mysql_num_rows($query_search)==0){
	?>
        <p style="text-align:center;padding:10px;font-weight:bold;">Không tìm thấy sản phẩm nào với từ khóa "</a><a style="color:red;font-weight:bold;"><?php echo $search ?></a>"</p>
        <div class="sanphamall">
    <?php
		}else{
	?>
        <p style="text-align:center;color:red;padding:10px;font-weight:bold;">Sản phẩm tìm thấy</p>
        <p style="text-align:center;padding:10px;font-weight:bold;">Kết quả tìm kiếm với từ khóa "<a style="color:red;"><?php echo $search ?></a>" có <a style="color:red;">
        <?php echo $count_search ?></a> kết quả.
        </p>
        <div class="sanphamall">
	<?php
		while($dong_search=mysql_fetch_array($query_search)){
	?>
    <div class="sanpham">
            
            <a href="index.php?act=chitietsanpham&id=<?php echo $dong_search['id_sp'] ?>"><img src="admincp/modules/quanlychitietsp/uploads/<?php echo $dong_search['hinhanh']?>" width="100" height="100"/></a><br><br>
            <div class="ten"><?php echo $dong_search['tensp'] ?></div>
            <div class="gia">
                Giá: <?php echo number_format($dong_search['gia']) ?>đ
            </div>
            <div class="chitiet-sp">
                <a href="index.php?act=chitietsanpham&idloaisp=<?php echo $dong_search['id_loaisp'] ?>&id=<?php echo $dong_search['id_sp'] ?>">Chi tiết</a>
            </div>
        </a>
    </div>
    <?php
		}
		}
	?>
</div><!---Kết thúc sản phẩm all-->