<section class="my-3 ">

   
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
            <?php echo form_open('login/signin',$attributes);?>
                <p class="h4 mb-4">Sign in</p>

                <!-- Email -->
                <input name="username" type="text" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="username">

                <!-- Password -->
                <input name="password" type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">

                <div class="d-flex justify-content-around">
                    <div>
                        <!-- Remember me -->

                    </div>
                </div>

                <!-- Sign in button -->
                <button class="btn btn-danger btn-block my-4" type="submit">Sign in</button>

                <!-- Register -->
                <p>Not a member?
                    <a href="">Register</a>
                </p>

            <?php echo form_close();?>
            <!-- Default form login -->

        </div>
        <!--Grid column-->

    </div>

</section>