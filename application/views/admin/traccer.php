<div id="page_title" class="row bg-danger px-4 pt-3 pb-0 mb-0" style="background:#b71c1c !important">
    <div class="col-sm-8 pl-0">
        <h3 class="white-text font-weight-bolder"><?php echo ucfirst($this->uri->segment(2));?> <button type="button" id="btn-add" class="btn bg-white red-text btn-sm btn-circle"><i class="fa fa-plus"></i></button></h3>
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
                            <th>Traccer Class</th>
                            <th>Title</th>
                            <th>Date Posted</th>
                            <th>Action</th>
                    </thead>
                        <?php foreach($traccer as $row){?>
                        <tr class="">
                            <td><?php echo $row->traccer_type;?></td>
                            <td><?php echo $row->item;?></td>
                            <td><?php echo $row->date_posted;?></td>
                            <td class="text-center">
                                <div class="float-center btn-group  ">
                                <button name="<?php echo $row->id;?>" class="btn btn-warning btn-sm">edit</button>
                                <button name="<?php echo $row->id;?>" class="btn btn-danger  btn-sm">delete</button>
                                </div>
                            </td>
                        </tr>
                        <?php }?>
                </table>
            
            </div>
        </div>
        <div class="" id="div_form" style="display:none;">
            <?php $attributes = array('name'=>'dataform','id'=>'dataform','type'=>'postDataWithOptionalImageOptionalAttachment');?>
            <?php echo form_open_multipart('admin/postDataWithOptionalImageOptionalAttachment',$attributes);?>
                <input type="hidden" id="table" value="traccer" name="table" />
                <input type="hidden" id="id" name="id" value="0" />
                <div class="md-form" id="div_title">
                    <input type="text" id="item" name="item" class="form-control" required>
                    <label id="lbl_title" for="form1">Title</label>
                </div>
                
                <div class="md-form" id="div_title">

                </div>
                <select name="traccer_type_id" id="traccer_type_id" class="browser-default custom-select mb-2" style="width:20%;">
                        <?php foreach($traccer_types as $row){?>
                        <option value="<?php echo $row->id;?>"><?php echo $row->traccer_type;?></option>>
                        <?php }?>
                </select>
                <div class="input-group my-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                  </div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" accept="image/*" id="inputGroupFile01"
                      aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label"  for="inputGroupFile01">Display Image</label>
                  </div>
                </div>   
                
                <textarea class="ckeditor" id="content" required name="description">

                </textarea>

                <div class="input-group my-2">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                  </div>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="attachment"  id="inputGroupFile02"
                      aria-describedby="inputGroupFileAddon02">
                    <label class="custom-file-label" for="inputGroupFile02">Attachment</label>
                  </div>
                </div> 
                
                
            
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

