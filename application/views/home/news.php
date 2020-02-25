<?php if($posts){?>
<?php foreach($posts as $row){?>
<div class="single-news mb-lg-3 mb-4  col-md-6">

    <!-- Grid row -->
    <div class="row">

        <!-- Grid column -->
        <div class="col-md-5">

            <!--Image-->
            <a href="<?php echo base_url('home/post/'.$row->id);?>">
            <div class="view overlay rounded mb-lg-0 mb-4 pb-1">
                <img  class="img-fluid" src="<?php echo $row->image;?>" alt="Sample image">
            </div>
            </a>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-7">

            <!-- Excerpt -->
            <p class="dark-grey-text" style="font-size:12px;">
                <a href="<?php echo base_url('home/post/'.$row->id);?>" class="justify-content-between red-text font-weight-bold" style="font-size:16px;line-height: 1.1em; "><?php echo substr($row->title,0,200);?></a>
                <?php echo $row->date_posted;?>
                <br/>
            </p>

        </div>
        <!-- Grid column -->

    </div>
    <!-- Grid row -->

</div>
<?php }?>
<?php }?>