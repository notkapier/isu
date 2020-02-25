
	<?php 
		$monthNum  = date('m');
		$monthName = date('F', mktime(0, 0, 0, $monthNum, 10));
	?>
    <div id="page_title" class="row bg-danger px-4 pt-3 pb-0 mb-0" style="background:#b71c1c !important">
        <div class="col-sm-8 pl-0">
            <h3 class="white-text font-weight-bolder"><?php echo $monthName.' '. date('Y');?></h3>
        </div>
        <div class="col-sm-4 justify-content-between">
            <div class="float-right" id="searchbox" >
            </div>
        </div>
    </div>
    <div class="container" id="data_container">
        <canvas class="p-4"  style="height:200px;" id="lineChart"></canvas>
    </div>  
    



