<div class="content">
    <div class="left">
    	<?php
        	include("modules/left/danhsach.php");
		?>
    </div>
    <div class="right">
    	<?php
    		if(isset($_GET['act'])){
				$tam=$_GET['act'];
			}else{
				$tam='';	
			}
			if($tam=='chitietloaisanpham'){
				include('modules/right/chitietloaisanpham.php');
			}elseif($tam=='chitietsanpham'){
				include('modules/right/chitietsanpham.php');	
			}elseif($tam=='giohang'){
				include('modules/right/cart.php');
			}elseif(isset($_POST['search'])){
				include('modules/right/search.php');
			}elseif($tam=='thanhtoan'){
				include('modules/right/thanhtoan.php');
			}else
			include('modules/right/tatcasanpham.php');
		?>
    </div>
</div>
<div class="clear"></div>