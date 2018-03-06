<div class="left">
	<?php
    	if(isset($_GET['act'])){
			$tam=$_GET['act'];
		}else{
			$tam='';	
		}
		if($tam=='them'){
			include('modules/quanlyloaisp/them.php');	
		}
		if($tam=='sua'){
			include('modules/quanlyloaisp/sua.php');	
		}
	?>
</div>
<div class="right">
	<?php
		include('modules/quanlyloaisp/lietke.php');
	?>
</div>