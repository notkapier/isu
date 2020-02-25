<div class="">
    <section class="magazine-section ">
        <div class="row ml-1">
            <div class="col-lg-9 col-md-12">
                <hr>
                <div class="row">
                            <div class="col-sm-12">
                            <h5 class="font-weight-bolder red-text "></i><?php echo $post->title?></h5>
                            </div>
                            <p class="font-weight-bolder grey-text mx-3" style="font-size:14px;">
                            <?php echo $post->date_posted?></p>

                            
                    <div class="single-news mb-4 col-md-12 rounded mb-0">
                    <div class="view overlay rounded  mb-4 mt-3">
                        <img style="width:100%" class="img-fluid" src="<?php echo $post->image;?>" alt="Sample image">
                        <a>
                            <div class="mask rgba-white-slight"></div>
                        </a>
                    </div>

                    <!-- Data -->
                    <div class="">
                        
                        
                        

                    <p class="dark-grey-text justify-text" style="line-height: 1em;"><?php echo $post->description?>
                    </p>

                    </div>
                </div>
            </div>
           <!-- <?php $this->load->view('home/announcement');?> -->
        </div>
    </section>
</div>