<table id="tablex" class="table table-borderless table-sm" style="padding:0px;margin:0px;border:none;">
    <thead>
        <tr>
            <th style="width:70%;">Title</th>
            <th>Date Posted</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($traccer as $row){?>
        <tr>
            <th><a  class="blue-text" href="<?php echo site_url('home/traccer_item/').$row->id;?>"><?php echo $row->item?></a></th>
            <th><?php echo $row->date_posted;?></th>
        </tr>
        <?php }?>
    </tbody>
</table>