<table id="tablex" class="table table-borderless table-sm" style="padding:0px;margin:0px;border:none;">
    <thead>
        <tr>
            <th>Reference Type</th>
            <th style="width:70%;">Title</th>
            <th>Author</th>
        </tr>
    </thead>
    <tbody>
        <?php if(count($reference)>0){?>
        <?php foreach($reference as $row){?>
        <tr>
            <th><?php echo $row->reference_type;?></th>
            <th ><a class="blue-text" href="<?php echo site_url('home/reference/'.$row->id);?>"><?php echo $row->title?></a></th>
            <th><?php echo $row->author;?></th>
        </tr>
        <?php }?>
        <?php }else{
            echo "No reference Found!";
        }?>
    </tbody>
</table>