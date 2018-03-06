<div class="left">
	<?php
    	if(isset($_GET['act'])){
			$tam=$_GET['act'];
		}else{
			$tam='';	
		}
		if($tam=='them'){
			include('modules/quanlychitietsp/them.php');	
		}
		if($tam=='sua'){
			include('modules/quanlychitietsp/sua.php');	
		}
	?>
</div>
<div class="right">
	<?php
		include('modules/quanlychitietsp/lietke.php');
	?>
</div>