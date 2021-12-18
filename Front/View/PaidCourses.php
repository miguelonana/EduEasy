<?php

include_once "../config.php";

function getPaidCourses(){
    $db = config::getconnexion();

    try {
        $query = $db->query(
        "SELECT courses.id, courses.name, courses.category, courses.teacher, courses.teacher_image,  courses.image, courses.numberOfStudentsRegistered, courses.numberOfLikes,teacher.userName FROM courses,teacher WHERE courses.free=0 and teacher.userId=courses.teacher;"
        );
        return $query;

    } catch (PDOException $e) {
        $e->getMessage();
        }
}

function countNbPaidCourses(){
    $db = config::getConnexion();
    
    $Query = "SELECT count(*) AS nb FROM courses where free=0";

    try {
        $res = $db->query($Query);
        $data = $res->fetch();
        $nbCourses = $data['nb'];
        
    } catch (PDOException $e) {
        $e->getMessage();
    }
    return $nbCourses;
}

$PaidcoursesList = getPaidCourses();
$nbCourses = countNbPaidCourses();

?>


<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>EduEasy</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="css/slick.css">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="css/animate.css">

    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="css/nice-select.css">

    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="css/jquery.nice-number.min.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="css/magnific-popup.css">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="css/default.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="css/style.css">

    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="css/responsive.css">


</head>

<body>

    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div>

    <!--====== PRELOADER PART START ======-->

    <!--====== HEADER PART START ======-->

    <?php include "headers/notLoggedInHeader.php" ?>
    <!--====== HEADER PART ENDS ======-->

    <!--====== SEARCH BOX PART START ======-->

    <div class="search-box">
        <div class="serach-form">
            <div class="closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="#">
                <input type="text" placeholder="Search by keyword">
                <button><i class="fa fa-search"></i></button>
            </form>
        </div> <!-- serach form -->
    </div>

    <!--====== SEARCH BOX PART ENDS ======-->

    <section id="page-banner" class="pt-60 pb-60 bg_cover" data-overlay="2"
        style="background-image: url(images/page-banner-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="page-banner-cont">
                        <h2>Our Premuim Courses</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Premuim Courses</a></li>
                            </ol>
                        </nav>
                    </div> <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== PAGE Body ======-->

    <section id="courses-part" class="pt-120 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="courses-top-search">
                        <ul class="nav float-left" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="courses-grid-tab" data-toggle="tab" href="#courses-grid"
                                    role="tab" aria-controls="courses-grid" aria-selected="true"><i
                                        class="fa fa-th-large"></i></a>
                            </li>
                            <li class="nav-item">
                                <a id="courses-list-tab" data-toggle="tab" href="#courses-list" role="tab"
                                    aria-controls="courses-list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                            </li>
                            <li class="nav-item">Showing <?php echo $nbCourses; ?> Results</li>
                        </ul> <!-- nav -->

                        <div class="courses-search float-right">
                            <form action="#">
                                <input type="text" placeholder="Search">
                                <button type="button"><i class="fa fa-search"></i></button>
                            </form>
                        </div> <!-- courses search -->
                    </div> <!-- courses top search -->
                </div>
            </div> <!-- row -->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="courses-grid" role="tabpanel"
                    aria-labelledby="courses-grid-tab">
                    <div class="row">
                        <?php foreach($PaidcoursesList as $PaidCourse){ ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="singel-course mt-30">
                                <div class="thum">
                                    <div class="image">
                                        <img src="images/course/cu-1.jpg" alt="Course">
                                    </div>
                                    <div class="price">
                                    </div>
                                </div>
                                <div class="cont">
                                    <span href="#"> 
                                        <h4><?php echo $PaidCourse['name']; ?>
                                        </h4>
                                       
                                    </span><h6>price: 50DT</h5>
                                    <div class="course-teacher">
                                        <div class="thum">
                                            <a href="#"><img src="images/course/teacher/t-1.jpg" alt="teacher"></a><a
                                                href="#">
                                                <h6><?php echo $PaidCourse['userName']; ?></h6>
                                            </a>
                                        </div>
                                        <div class="course-teacher">
                                            <div class="admin">
                                                <a href="#" class="main-btn">Buy Course</a>
                                                <ul>
                                                    <center>
                                                        <li><a href="#"><i
                                                                    class="fa fa-user"></i><span><?php echo $PaidCourse['numberOfStudentsRegistered']; ?></span></a>
                                                        </li>
                                                        <li><a href="#"><i
                                                                    class="fa fa-heart"></i><span><?php echo $PaidCourse['numberOfLikes']; ?></span></a>
                                                        </li>
                                                    </center>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- singel course -->
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>




    <!--====== FOOTER PART START ======-->

    <?php include "headers/footer.php" ?>
    <!--====== FOOTER PART ENDS ======-->


    <!--====== BACK TO TP PART START ======-->

    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!--====== BACK TO TP PART ENDS ======-->








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