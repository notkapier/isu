<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CCSICT - Homepage</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/old/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="<?php echo base_url();?>assets/old/css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="<?php echo base_url();?>assets/old/css/style.min.css" rel="stylesheet">

    <link href="<?php echo base_url();?>assets/plugin/slick/slick.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/plugin/slick/slick-theme.css">
    <link href="<?php echo base_url();?>assets/css/addons/datatables.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-2.2.js"></script>
    <link href="<?php echo base_url('assets/plugin/')?>sweetalert/sweetalert.css" rel="stylesheet">
   
  <script src="<?php echo base_url()."assets/"?>plugin/sweetalert/sweetalert.min.js"></script>
    <style>
        .styled {
            text-shadow: rgb(128, 20, 20) 0px 0px 0px, rgb(134, 21, 21) 1px 1px 0px, rgb(140, 21, 21) 2px 2px 0px, rgb(146, 22, 22) 3px 3px 0px, rgb(153, 23, 23) 4px 4px 0px, rgb(159, 24, 24) 5px 5px 0px, rgb(165, 25, 25) 6px 6px 0px, rgb(171, 26, 26) 7px 7px 0px, rgb(177, 27, 27) 8px 8px 0px;
            font-size: 16px;
            color: rgb(255, 255, 255);
        }
        
        .styledx {
            text-shadow: rgb(128, 20, 20) 0px 0px 0px, rgb(134, 21, 21) 1px 1px 0px, rgb(140, 21, 21) 2px 2px 0px, rgb(146, 22, 22) 3px 3px 0px, rgb(153, 23, 23) 4px 4px 0px, rgb(159, 24, 24) 5px 5px 0px, rgb(165, 25, 25) 6px 6px 0px, rgb(171, 26, 26) 7px 7px 0px, rgb(177, 27, 27) 8px 8px 0px;
            font-size: 20px;
            color: rgb(255, 255, 255);
        }
        
        .styled2 {
            text-shadow: rgb(179, 179, 179) 0px 0px 0px, rgb(188, 188, 188) 1px 1px 0px, rgb(198, 198, 198) 2px 2px 0px, rgb(207, 207, 207) 2px 2px 0px, rgb(217, 217, 217) 3px 3px 0px, rgb(226, 226, 226) 3px 3px 0px, rgb(236, 236, 236) 4px 4px 0px, rgb(245, 245, 245) 4px 4px 0px;
            font-size: 5vh;
            "

        }
        
        .styled3 {
            text-shadow: rgb(179, 179, 179) 0px 0px 0px, rgb(188, 188, 188) 1px 1px 0px, rgb(198, 198, 198) 2px 2px 0px, rgb(207, 207, 207) 1px 1px 0px, rgb(217, 217, 217) 1px 1px 0px, rgb(226, 226, 226) 1px 1px 0px, rgb(236, 236, 236) 1px 1px 0px, rgb(245, 245, 245) 1px 1px 0px;
            font-size: 5vh;
            "

        }
        
        .styled4 {
            text-shadow: rgb(179, 179, 179) 0px 0px 0px, rgb(188, 188, 188) 1px 1px 0px, rgb(198, 198, 198) 1px 1px 0px, rgb(207, 207, 207) 1px 1px 0px, rgb(217, 217, 217) 1px 1px 0px, rgb(226, 226, 226) 1px 1px 0px, rgb(236, 236, 236) 1px 1px 0px, rgb(245, 245, 245) 1px 1px 0px;
            "

        }
        .ui-datatable.borderless thead th,
        .ui-datatable.borderless tbody,
        .ui-datatable.borderless tbody tr,
        .ui-datatable.borderless tbody td {
        border-style: none;
        }
        .btn-circle.btn-sm { 
            width: 30px; 
            height: 30px; 
            padding: 6px 0px; 
            border-radius: 15px; 
            font-size: 8px; 
            text-align: center; 
        } 
        .btn-circle.btn-md { 
            width: 50px; 
            height: 50px; 
            padding: 7px 10px; 
            border-radius: 25px; 
            font-size: 10px; 
            text-align: center; 
        } 
        .btn-circle.btn-xl { 
            width: 70px; 
            height: 70px; 
            padding: 10px 16px; 
            border-radius: 35px; 
            font-size: 12px; 
            text-align: center; 
        } 

    </style>
    <style>
        body {
            background: ;
        }
        
        .slider {
            width: 100%;
            margin: 2px auto;
        }
        
        .slick-slide {}
        
        .slick-slide img {
            width: 100%;
            height: 400px;
        }
        
        .slider-nav img {
            height: 70px;
            width: 70%;
        }
        
        .slick-slide {
            transition: all ease-in-out .3s;
            opacity: .2;
        }
        
        .slick-active {
            opacity: .5;
        }
        
        .slick-current {
            opacity: 1;
        }
        .dataTables_wrapper .dataTables_filter {
    float: right;
    text-align: right;
}
    </style>

</head><body>

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark red darken-4 scrolling-navbar styled">
            <div class="container">

                <!-- Brand -->
                <a class="navbar-brand font-weight-bold" href="<?php echo base_url('admin')?>">Admin Panel</a>

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="<?php echo base_url('admin/chart');?>">User Stats
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="<?php echo base_url('admin/user');?>">Users
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="<?php echo base_url('admin/element');?>">Elements
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="<?php echo base_url('admin/post');?>">Post
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="<?php echo base_url();?>admin/announcement">Announcements</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="<?php echo base_url();?>admin/course">Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="<?php echo base_url();?>admin/alumni">Alumni</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="<?php echo base_url();?>admin/reference">Digital Library</a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="<?php echo base_url();?>admin/traccer">Traccer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="<?php echo base_url();?>admin/aboutus">About Us</a>
                        </li>
                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a href="<?php echo base_url('admin/logout')?>" class="nav-link rounded waves-effect">
                                <i class="fas fa-user mr-2"></i>Logout
                            </a>
                        </li>
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
           