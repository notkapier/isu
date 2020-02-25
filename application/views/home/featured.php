<?php if($featured){?>
<div class="single-news mb-4 col-md-12 border border-light rounded mb-0">

<div class="view overlay rounded  mb-4 mt-3">
    <img style="width:100%" class="img-fluid" src="<?php echo $featured->image?>" alt="Sample image">
    <a>
        <div class="mask rgba-white-slight"></div>
    </a>
</div>

<!-- Data -->
<div class="">
    <p class="font-weight-bolder dark-grey-text" style="font-size:12px;">
        </i><?php echo $featured->date_posted?></p>
    <a href="<?php echo base_url('home/post/'.$featured->id);?>" class="light-blue-text">
        <h5 class="font-weight-bolder red-text"></i><?php echo $featured->title?></h5>
    </a>
    
</div>

<!-- Excerpt -->

<p class="dark-grey-text" style="line-height: 1em;"><?php echo substr($featured->description,0,200)?>
    <a href="<?php echo base_url('home/post/'.$featured->id);?>" class="btn btn-success btn-sm">Read more</a>
</p>

</div>
<?php }?>