<section class=" ">

   
    <br>
    <br>
    <div class="row">

        <!-- Grid column -->
        <div class="col-lg-5 offset-sm-1 text-center text-lg-left">
            <img class="img-fluid  " src="<?php echo base_url();?>assets/img/ccsict.jpg" alt="Sample image">
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-lg-4">
            <!-- Default form login -->
            
            <?php $attributes = array('class'=>'text-center p-5');?>
            <?php echo form_open('login/register',$attributes);?>
                <p class="h4 mb-4">Register</p>

                <!-- Email -->
                <input name="username" type="text" id="username" class="form-control mb-4" placeholder="username">

                <input name="fullname" type="text" id="fullname" class="form-control mb-4" placeholder="fullname">

                <input name="email" type="email" id="email" class="form-control mb-4" placeholder="email">

                <input name="password" type="password" id="password" class="form-control mb-4" placeholder="password">

                <input name="mobile" type="text" id="mobile" class="form-control mb-4" placeholder="mobile">
                <!-- Password -->
                <select name="user_type_id" id="user_type_id" class="browser-default custom-select mb-2" style="">
                    <?php foreach($user_types as $row){?>
                    <?php if($row->user_type!='admin'){?>
                    <option value="<?php echo $row->id;?>"><?php echo ucfirst($row->user_type);?></option>>
                    <?php }?>
                    <?php }?>
                </select>  

                <div class="d-flex justify-content-around">
                    <div>
                        <!-- Remember me -->

                    </div>
                </div>

                <!-- Sign in button -->
                <button class="btn btn-danger btn-block my-4" type="submit">Register</button>

                <!-- Register -->
                <p>Already a member?
                    <a href="<?php echo base_url();?>home/login">Back to Login</a>
                </p>

            <?php echo form_close();?>
            <!-- Default form login -->

        </div>
        <!--Grid column-->

    </div>

</section>
<script>
    $("body").css("overflow", "hidden");
</script>
