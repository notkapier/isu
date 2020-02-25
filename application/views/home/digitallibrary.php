<div class="row pb-3 pt-4">

    <!-- Grid column -->
    <div class="col-lg-3 text-center text-lg-left">

      <h5 class="styled4 text-danger"></i>Masterlist of Collections </h5>
        <div class="single-news mb-4">
            <!-- Grid row -->
            <div class="row pl-4">
                <!-- Grid column -->
                <?php foreach($reference_type as $row){?>
                <button id="<?php echo $row->id;?>" class="btn btn-danger text-left library" name="" style="width:100%;background-color:#b71c1c !important;" type="button"><?php echo $row->reference_type;?></button>
              <?php }?>
                <!-- Grid column -->
            </div>
        </div>
        
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-lg-9">
        <div class="row px-4">
          <div class="col-sm-12" id="table_container">
            <?php $this->load->view('home/reference_table');?>
          </div>
      </div>
    </div>
    <!--Grid column-->

</div>
<!-- Grid row -->
</div>