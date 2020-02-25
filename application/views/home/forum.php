

    <div id="page_title" class="row bg-danger px-4 pt-3 pb-0 mb-0" style="background:#b71c1c !important">
        <div class="col-sm-8 pl-0">
            <h3 class="white-text font-weight-bolder"><?php echo ucfirst($this->uri->segment(2));?> <button type="button" id="btn-add" class="btn bg-white red-text btn-sm btn-circle">Create New Thread  <i class="fa fa-plus"></i></button></h3>
        </div>
        <div class="col-sm-4 justify-content-between">
            <div class="float-right" id="searchbox" >
            </div>
        </div>
    </div>
    <div class="container" id="data_container">
        <div id="div_table" class="row">
                    <div class="col-sm-12" style="width: 100% !important;">
                    <table id="tablex" class="table table-responsive table" style="">
                        <thead style="white-space: nowrap;">
                                <th style="width:60%;">Title</th>
                                <th style="width:20%;">Posted By</th>
                                <th style="width: 10%;">Replies</th>
                                <th>Action</th>
                        </thead>
                            <?php foreach($forum as $row){?>
                            <tr class="">
                                <td class="font-weight-bolder grey-text"><?php if(strlen($row->question)>200){echo substr($row->question,0,150). '. . .';}else{echo $row->question;}?>&nbsp;</td>
                                <td><?php echo $row->fullname;?></td>
                                <td><?php if($row->counter==0){ echo '0';}
                                else{ echo $row->counter;}?><span> Replies</span></td>
                                <td class="">
                                    <div class="float-center btn-group  ">
                                    <a href="<?php echo site_url('home/forum/'.$row->id);?>" name="<?php echo $row->id;?>" id="btn-view" class="btn btn-sm green white-text">View</a>
                                    <?php if($row->username==$this->session->userdata('username')){?>
                                    <button name="<?php echo $row->id;?>" id="btn-edit" class="btn  btn-sm btn-warning white-text">Edit</button>
                                    <button name="<?php echo $row->id;?>" id="btn-delete" class="btn  btn-sm red white-text btn-delete">Delete</button>
                                    </div>
                                    <?php }?>
                                </td>
                            </tr>
                            <?php }?>
                    </table>
                
                </div>
            </div>
            <div class="" id="div_form" style="display:none;">
                <?php $attributes = array('name'=>'dataform','id'=>'dataform','type'=>'');?>
                <?php echo form_open_multipart('home/postData',$attributes);?>
                    <input type="hidden" id="table" value="question" name="table" />
                    <input type="hidden" id="id" name="id" value="0" />
                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $this->session->userdata('id');?>" />
                    <textarea class="ckeditor" id="content" required name="question">

                    </textarea>
                <div class="btn-toolbar " >
                        <button class="btn btn-secondary btn-sm text-right" id="btn-cancel">
                            Cancel
                        </button>
                        <button onclick="save()" class="btn btn-success btn-sm text-right" id="btn-save">
                            Save
                        </button>
                    </div>
                </form>

            </div>
    </div>  
