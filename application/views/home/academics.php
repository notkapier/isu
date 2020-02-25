<div class="row pb-3 pt-4">

    <!-- Grid column -->
    <div class="col-lg-5 text-center text-lg-left">
        <img class="img-fluid  " src="<?php echo base_url();?>assets/img/ccsict.jpg" alt="Sample image">
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-lg-7">

        <?php foreach($courses as $row){?>
        <div class="row mb-3">

            <!-- Grid column -->
            <div class="col-1">

            </div>
            <!-- Grid column -->

            <!-- Grid column -->

            <div class="col-xl-10 col-md-11 col-10">
                <h5 class="font-weight-bolder mb-3 styled3 " style="font-size:20px;"><?php $course = explode('-',$row->course)?><?php echo $course[0];?></h5>
                <p class="grey-text font-weight-bolder"><?php echo $row->description;?></p>
            </div>
            <!-- Grid column -->

        </div>
        <?php }?>
 
 

    </div>
    <!--Grid column-->

</div>
<!-- Grid row -->
</div>