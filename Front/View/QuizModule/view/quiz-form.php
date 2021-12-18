<?php 
	include('../controller/quizC.php');
	session_start();
	quiz_form();
?>
<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--====== Title ======-->
<title>EduEasy</title>

<!--====== Favicon Icon ======-->
<link rel="shortcut icon" href="../../images/favicon.png" type="image/png">

<!--====== Slick css ======-->
<link rel="stylesheet" href="../../css/slick.css">

<!--====== Animate css ======-->
<link rel="stylesheet" href="../../css/animate.css">

<!--====== Nice Select css ======-->
<link rel="stylesheet" href="../../css/nice-select.css">

<!--====== Nice Number css ======-->
<link rel="stylesheet" href="../../css/jquery.nice-number.min.css">

<!--====== Magnific Popup css ======-->
<link rel="stylesheet" href="css/magnific-popup.css">

<!--====== Bootstrap css ======-->
<link rel="stylesheet" href="../../css/bootstrap.min.css">

<!--====== Fontawesome css ======-->
<link rel="stylesheet" href="../../css/font-awesome.min.css">

<!--====== Default css ======-->
<link rel="stylesheet" href="../../css/default.css">

<!--====== Style css ======-->
<link rel="stylesheet" href="../../css/style.css">

<!--====== Responsive css ======-->
<link rel="stylesheet" href="../../css/responsive.css">
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="host_version">

    <!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header tit-up">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Customer Login</h4>
                </div>
                <div class="modal-body customer-box">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li><a class="active" href="#Login" data-toggle="tab">Login</a></li>
                        <li><a href="#Registration" data-toggle="tab">Registration</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="Login">
                            <form role="form" class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input class="form-control" id="email1" placeholder="Name" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input class="form-control" id="exampleInputPassword1" placeholder="Email"
                                            type="email">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-light btn-radius btn-brd grd1">
                                            Submit
                                        </button>
                                        <a class="for-pwd" href="javascript:;">Forgot your password?</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="Registration">
                            <form role="form" class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input class="form-control" placeholder="Name" type="text">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input class="form-control" id="email" placeholder="Email" type="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input class="form-control" id="mobile" placeholder="Mobile" type="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input class="form-control" id="password" placeholder="Password"
                                            type="password">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <button type="button" class="btn btn-light btn-radius btn-brd grd1">
                                            Save &amp; Continue
                                        </button>
                                        <button type="button" class="btn btn-light btn-radius btn-brd grd1">
                                            Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader-container">
            <div class="progress-br float shadow">
                <div class="progress__item"></div>
            </div>
        </div>
    </div>
    <!-- END LOADER -->

    <!-- Start header -->
    <?php include "../../headers/notLoggedInHeader.php" ?>
    <!-- End header -->

    <div class="all-title-box">
        <div class="container text-center">
            <h1>Take The Quiz</h1>
        </div>
    </div>

    <div id="overviews" class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 blog-post-single">
                    <div class="blog-item">
                        <div class="image-blog">
                            <img src="images/blog_single.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="post-content">
                            <div class="blog-desc">
                                <br><br>
                                <blockquote class="default">
                                    <div class="blog-title">
                                        <h2>You Can Get Your Mark After Filling The Form</h2>
                                    </div>
                                    <form method="POST" action="quiz-form.php?inscrire">
                                        <Label>Your first name :</Label>
                                        <input name="fname" type="text">
                                        <br>
                                        <Label>Your last name :</Label>
                                        <input name="lname" type="text">
                                        <br>
                                        <Label>Your Email :</Label>
                                        <input type="email" name="email">
                                        <br>
                                        <input style="right:150%" type="submit" name="submit" class="btn btn-secondary"
                                            value="Proceed to quiz">
                                    </form>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                    <br><br>
                </div><!-- end col -->
            </div><!-- end container -->
        </div><!-- end section -->

        <div class="parallax section dbcolor">
            <div class="container">
                <div class="row logos">
                    <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                        <a href="#"><img src="images/logo_01.png" alt="" class="img-repsonsive"></a>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                        <a href="#"><img src="images/logo_02.png" alt="" class="img-repsonsive"></a>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                        <a href="#"><img src="images/logo_03.png" alt="" class="img-repsonsive"></a>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                        <a href="#"><img src="images/logo_04.png" alt="" class="img-repsonsive"></a>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                        <a href="#"><img src="images/logo_05.png" alt="" class="img-repsonsive"></a>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-6 wow fadeInUp">
                        <a href="#"><img src="images/logo_06.png" alt="" class="img-repsonsive"></a>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end section -->
<!-- Footer -->
        <?php include "../../headers/footer.php"?>
		<!--Footer end  -->
        <div class="copyrights">
            <div class="container">
                <div class="footer-distributed">
                    <div class="footer-center">
                        <p class="footer-company-name">All Rights Reserved. &copy; 2018 <a href="#">SmartEDU</a> Design
                            By : <a href="https://html.design/">html design</a></p>
                    </div>
                </div>
            </div><!-- end container -->
        </div><!-- end copyrights -->

        <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

        <!-- ALL JS FILES -->
        <script src="js/all.js"></script>
        <!-- ALL PLUGINS -->
        <script src="js/custom.js"></script>
		<!--====== jquery js ======-->
		<script src="js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="js/bootstrap.min.js"></script>

    <!--====== Slick js ======-->
    <script src="js/slick.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="js/jquery.magnific-popup.min.js"></script>

    <!--====== Counter Up js ======-->
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>

    <!--====== Nice Select js ======-->
    <script src="js/jquery.nice-select.min.js"></script>

    <!--====== Nice Number js ======-->
    <script src="js/jquery.nice-number.min.js"></script>

    <!--====== Count Down js ======-->
    <script src="js/jquery.countdown.min.js"></script>

    <!--====== Validator js ======-->
    <script src="js/validator.min.js"></script>

    <!--====== Ajax Contact js ======-->
    <script src="js/ajax-contact.js"></script>

    <!--====== Main js ======-->
    <script src="js/main.js"></script>

    <!--====== Map js ======-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
    <script src="js/map-script.js"></script>


</body>

</html>