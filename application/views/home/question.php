

    <div id="page_title" class="row bg-danger px-4 pt-3 pb-0 mb-0" style="background:#b71c1c !important">
        <div class="col-sm-8 pl-0">
            <h3 class="white-text font-weight-bolder"><?php echo ucfirst($this->uri->segment(2));?> <button type="button" id="btn-add" class="btn bg-white red-text btn-sm btn-circle">Reply&emsp;<i class="fa fa-plus"></i></button></h3>
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
                        <thead>
                            <tr>
                            <!-- <div class="pt-3">
                            <div class="row">
                                <div class="col-sm-6">
                                <p><span class="blue-text"><?php echo $question->fullname;?></span> posted:</p>      
                                </div>
                                <div class="col-sm-6">
                                <p class="text-right"><?php echo $question->date_posted;?></p>
                                </div>
                            </div>
                              <p class="font-weight-bolder"><?php echo $question->question;?></p>  
                            </div> -->
                            <th>
                                <p class="text-right"><?php echo $question->date_posted;?></p>
                                <p><span class="blue-text"><?php echo $question->fullname;?></span> posted:</p>
                                <p class="font-weight-bolder"><?php echo $question->question;?></p>  
                            </th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php foreach($answer as $row){?>
                            <tr>
                              <!-- <div class="pt-3">
                            
                              <div class="row">
                                <div class="col-sm-6">

                                <p><span class="blue-text"><?php echo $row->fullname;?></span> replied:</p>
                                </div>
                                <div class="col-sm-6">
                                <p class="text-right"><?php echo $row->date_posted;?></p>
                                </div>

                            </div>
                            
                              <p class="font-weight-bolder grey-text"><?php echo $row->answer;?></p>  
                            </div>  
                             -->
                           <!--  <?php if($this->session->userdata('id')==$row->user_id){?>
                                    <button name="<?php echo $row->id;?>" id="btn-edit" class="btn-edit btn orange btn-sm btn-warning">edit</button>
                                    <button name="<?php echo $row->id;?>" id="btn-delete" class="btn-delete btn btn-delete btn-sm">delete</button>
                                <?php }?> -->
                            <td>
                                <p class="text-right"><?php echo $row->date_posted;?></p>
                                <p><span class="blue-text"><?php echo $row->fullname;?></span> posted:</p>
                                <p class="font-weight-bolder"><?php echo $row->answer;?></p>  
                                 <?php if($this->session->userdata('id')==$row->user_id){?>
                                    <button name="<?php echo $row->id;?>" id="btn-edit" class="btn-edit btn orange btn-sm btn-warning">edit</button>
                                    <button name="<?php echo $row->id;?>" id="btn-delete" class="btn-delete btn red white-text btn-sm">delete</button>
                                <?php }?>
                            </td>
                            </tr>
                            
                            <?php }?>
                            
                        </tbody>
                    </table>
                
                </div>
            </div>
            <div class="" id="div_form" style="display:none;">
                <?php $attributes = array('name'=>'dataform','id'=>'dataform','type'=>'');?>
                <?php echo form_open_multipart('admin/postData',$attributes);?>
                    <input type="hidden" id="table" value="answer" name="table" />
                    <input type="hidden" id="id" name="id" value="0" />
                    <input type="hidden" id="user_id" name="user_id" value="<?php echo $this->session->userdata('id');?>" />
                    <input type="hidden" id="question_id" name="question_id" value="<?php echo $question->id; ?>" />
                    <textarea class="ckeditor" id="content" required name="answer">

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