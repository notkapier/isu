<div class="row pb-3 pt-4">

    <!-- Grid column -->
    <div class="col-lg-3 text-center text-lg-left">
        <div class="single-news mb-4">
            <!-- Grid row -->
            <div class="row pl-4">
                <?php foreach($about_tabs as $row){?>
                <button id="<?php echo $row->id;?>" class="btn btn-danger text-left about_tab" name="" style="width:100%;background-color:#b71c1c !important;" type="button"><?php echo $row->about_tab;?></button>
                <?php }?>
            </div>
        </div>
        
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-lg-9">
        <div class="row px-4">
          <div class="col-sm-12" id="data_container">
            <h3 id="about_tab" class="font-weight-bolder text-danger"><?php echo $about_tabs[0]->about_tab;?></h3>
            <?php if($about_tabs[0]->image!=""){?>
            <img id="image" src="<?php echo $about_tabs[0]->image?>">
            <?php }?>
            <div class="row mx-1">
                <p id="description"><?php echo $about_tabs[0]->description;?></p>
            </div>
            
          </div>
      </div>
    </div>
    <!--Grid column-->

</div>
<!-- Grid row -->
</div>