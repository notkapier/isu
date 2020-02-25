<?php if($announcements){?>
<div class="col-lg-3 col-md-12 ">

    <div class="card z-depth-0 rounded mb-0 border text-white bg-danger mb-3" style="max-width: 18rem;background: #b71c1c !important;">
        <div class="card-header" style=""><h5>Announcements</h5></div>
        <div class="card-body white">
        	<?php foreach($announcements as $row){?>
            <a class="red-text">
                <p class="" style="line-height: 1.2em;font-size:15px;"><i class="far fa-calendar-alt"></i>&emsp;<u><?php echo $row->date_posted;?></u><span class="grey-text" style="color:#;"><br><?php echo substr($row->title,0,200);?></span><?php if($row->attachment){?><i class="fas fa-paperclip blue-text"></i><?php }?></p>
            </a>
        	<?php }?>
        </div>
    </div>

</div>
<?php }?>