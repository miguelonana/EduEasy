<?php 
    session_start();
    require('actions/questions/showAllQuestionsAction.php');

if(!isset($_SESSION['loggedIn']) )
    header('location:../../View/login.html');
else if($_SESSION['loggedIn'] != true)
    header('location:../../View/login.html');

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
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


<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>

    <div class="container">

        <form method="GET">

            <div class="form-group row">

                <div class="col-8">
                    <input type="search" name="search" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-success" type="submit">Rechercher</button>
                </div>

            </div>
        </form>

        <br>

        <?php 
            while($question = $getAllQuestions->fetch()){
                ?>
        <div class="card">
            <div class="card-header">
                <a href="article.php?id=<?= $question['id']; ?>">
                    <?= $question['titre']; ?>
                </a>
            </div>
            <div class="card-body">
                <?= $question['description']; ?>
            </div>
            <div class="card-footer">
                Publié par <a
                    href="profile.php?id=<?= $question['id_auteur']; ?>"><?= $question['pseudo_auteur']; ?></a> le
                <?= $question['date_publication']; ?>
            </div>
        </div>
        <br>
        <?php
            }
        ?>

    </div>
    <?php include "../headers/footer.php" ?>
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