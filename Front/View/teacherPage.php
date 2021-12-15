<?php
include_once "../config.php";

session_start();
if(!isset($_SESSION['loggedIn']) )
    header('location:login.html');
else if($_SESSION['loggedIn'] != true)
    header('location:login.html');

    function getTeacherCourses($userId){
        $db = config::getconnexion();

    try {
        $query = $db->query(
        "SELECT * FROM courses where teacher='$userId'"
        );
        return $query;

    } catch (PDOException $e) {
        $e->getMessage();
        }
    }

    $courseList = getTeacherCourses($_SESSION['userId']);


    
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

    <?php include "headers/TeacherMainHeader.php" ?>

    <!-- ===============HEADER PART ENDS============= -->
    <div class="tab-content" id="myTabContent" style="margin:2rem;">
        <div class="tab-pane fade show active" id="courses-grid" role="tabpanel" aria-labelledby="courses-grid-tab">
            <div class="row">
                <?php foreach($courseList as $Course){ ?>
                <div class="col-lg-3 col-md-4">
                    <div class="singel-course mt-30">
                        <div class="thum">
                            <div class="image">
                                <img src="images/course/<?php echo $Course['image'] ?>" alt="Course"
                                    style="height:10rem;">
                            </div>
                        </div>
                        <div class="cont">
                            <a href="singleCoursePage.php?id=<?php echo $Course['id'] ?>">
                                <h4><?php echo $Course['name']; ?>
                                </h4>
                            </a>
                            <div class="course-teacher">
                                <div class="thum">
                                    <a><img src="images/course/teacher/<?php echo $Course['teacher_image'] ?>"
                                            alt="teacher"></a>
                                </div>
                                <div class="name">
                                    <a>
                                        <h6><?php echo $_SESSION['userName']; ?></h6>
                                    </a>
                                </div>
                                <div class="admin">
                                    <ul>
                                        <li><a><i
                                                    class="fa fa-user"></i><span><?php echo $Course['numberOfStudentsRegistered']; ?></span></a>
                                        </li>
                                        <li><a><i
                                                    class="fa fa-heart"></i><span><?php echo $Course['numberOfLikes']; ?></span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- singel course -->
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
    
    <!-- ===================FOOTER PAGE STARTS========== -->
    <?php include "headers/footer.php" ?>
    <!-- ===================FOOTER PAGE STOPS========== -->

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