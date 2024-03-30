<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Rental Management App | Login</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url('theme/'); ?>favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="<?php echo base_url('theme/'); ?>assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('theme/'); ?>assets/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url('theme/'); ?>assets/css/authentication.css">
    <link rel="stylesheet" href="<?php echo base_url('theme/'); ?>assets/css/color_skins.css">
</head>

<body class="theme-purple authentication sidebar-collapse">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
    <div class="container">        
        <div class="navbar-translate n_logo">
            <a class="navbar-brand" href="#" title="" target="_blank"><h4 class="text-light mt-0">RENTAL</h4></a>
            <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav">
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link" href="/">Home</a>-->
                <!--</li>-->
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link" href="#">Search Result</a>-->
                <!--</li>-->
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link" title="Follow us on Twitter" href="#" target="_blank">-->
                <!--        <i class="zmdi zmdi-twitter"></i>-->
                <!--        <p class="d-lg-none d-xl-none">Twitter</p>-->
                <!--    </a>-->
                <!--</li>-->
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link" title="Like us on Facebook" href="#" target="_blank">-->
                <!--        <i class="zmdi zmdi-facebook"></i>-->
                <!--        <p class="d-lg-none d-xl-none">Facebook</p>-->
                <!--    </a>-->
                <!--</li>-->
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link" title="Follow us on Instagram" href="#" target="_blank">                        -->
                <!--        <i class="zmdi zmdi-instagram"></i>-->
                <!--        <p class="d-lg-none d-xl-none">Instagram</p>-->
                <!--    </a>-->
                <!--</li>                -->
                <!--<li class="nav-item">-->
                <!--    <a class="nav-link btn btn-primary btn-round" href="<?=base_url('app/signup');?>">SIGN UP</a>-->
                <!--</li>-->
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="page-header">
    <div class="page-header-image" style="background-image:url(<?php echo base_url('theme/'); ?>assets/images/login.jpg)"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain">
                <form class="form" method="post" action="<?php echo base_url('app/login');  ?>">
                    <div class="header">
                        <div class="logo-container">
                            <img src="assets/images/logo.svg" alt="">
                        </div>
                        <h5>Log in</h5>
                    </div>
                    <div class="content">     
                        <?php 
                            if($msg = $this->session->flashdata('error_msg')){
                                echo '<div classs="alert alert-danger">'.$msg.'</div>';
                            }
                            if($msg = $this->session->flashdata('success_msg')){
                                echo '<div classs="alert alert-success">'.$msg.'</div>';
                            }
                        ?>
                        <div class="input-group input-lg">
                            <input type="text" name="username" class="form-control" placeholder="Enter User Name">
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                        </div>
                        <div class="input-group input-lg">
                            <input type="password" name="password" placeholder="Password" class="form-control" />
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <button type="submit" class="btn l-cyan btn-round btn-lg btn-block waves-effect waves-light">SIGN IN</button>
                        <h6 class="m-t-20"><a href="#" class="link">Forgot Password?</a></h6>
                    </div>
                </form>
            </div>
        </div>
    </div>
   <footer class="footer">
        <div class="container">
            <nav>
                <!--<ul>-->
                <!--    <li><a href="http://thememakker.com/contact/" target="_blank">Contact Us</a></li>-->
                <!--    <li><a href="http://thememakker.com/about/" target="_blank">About Us</a></li>-->
                <!--    <li><a href="#">FAQ</a></li>-->
                <!--</ul>-->
            </nav>
            <div class="copyright">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>,
                <span>Designed by <a href="https://rentkart.in/" target="_blank">Rentkart.in</a></span>
            </div>
        </div>
    </footer>
</div>

<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script>
   $(".navbar-toggler").on('click',function() {
    $("html").toggleClass("nav-open");
});
//=============================================================================
$('.form-control').on("focus", function() {
    $(this).parent('.input-group').addClass("input-group-focus");
}).on("blur", function() {
    $(this).parent(".input-group").removeClass("input-group-focus");
});
</script>
</body>
</html>