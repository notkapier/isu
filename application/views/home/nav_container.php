<body>

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark red darken-4 scrolling-navbar styled">
            <div class="container">

                <!-- Brand -->
                <a class="navbar-brand font-weight-bold" href="<?php echo base_url();?>/">CCSICT</a>

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="<?php echo base_url();?>">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="<?php echo base_url();?>home/vtour">Take a Tour</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="<?php echo base_url();?>home/academics">Academics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="<?php echo base_url();?>home/alumni">Alumni</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="<?php echo base_url();?>home/digitallibrary">Digital Library</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="<?php echo base_url();?>home/traccer">Traccer</a>
                        </li>
                        <?php if($this->session->userdata('user_type')){?>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="<?php echo base_url();?>home/forum">Forum</a>
                        </li>
                        <?php }?>
                       <!--  <?php      {?>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="<?php echo base_url();?>home/contact">Contact Us</a>
                        </li>
                        <?php }?>
 -->                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="<?php echo base_url();?>home/aboutus">About Us</a>
                        </li>
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a href="<?php echo base_url();?>assets/old/https://www.facebook.com/mdbootstrap" class="nav-link waves-effect" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url();?>assets/old/https://twitter.com/MDBootstrap" class="nav-link waves-effect" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <?php if($this->session->userdata('username')==""){?>
                        <li class="nav-item">
                            <a href="<?php echo base_url();?>home/login" class="nav-link rounded waves-effect">
                                <i class="fas fa-user mr-2"></i>Login
                            </a>
                        </li>
                        <?php }?>
                        <?php if(!$this->session->userdata('username')==""){?>
                        <li class="nav-item">
                            <a href="<?php echo base_url();?>home/logout" class="nav-link rounded waves-effect">
                                <i class="fas fa-user mr-2"></i>Logout
                            </a>
                        </li>
                        <?php }?>
                        
                    </ul>

                </div>

            </div>
        </nav>
        <!-- Navbar -->

    </header>

    <main class="mt-5 pt-4">
        <div class="container z-depth-1 py-1 rounded mb-0" style="min-height: 400px;">
            <section class="">
                <img style="height:4em;" class="float-left" src="<?php echo base_url();?>assets/img/ccsict.jpg" />
                <p class=" pt-2  dark-grey-text">&emsp;<span class="h6">College of Computing Studies, Information and Communication Technology </span>
                    <br> &emsp;Isabela State University - Cabagan, Isabela
                </p>
            </section>
            <!-- <hr style="color:#f73344;background-color: #f73344;border-color: #f73344;height: .5em;"> -->