<?php

include_once "../config.php";

session_start();

function addCoursesToMyCourses($userId,$courseId){
    $db = config::getConnexion();

    try {
        $query = $db->prepare(
            'INSERT INTO followcourse (userId,courseId) 
                VALUES (:userId,:courseId) '
        );
        $query->execute([
            'userId' => $userId,
            'courseId' => $courseId
        ]);
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

function removeCoursesFromMyCourses($userId,$courseId){
        $db = config::getConnexion();
        try {
            $query = $db->prepare(
                'DELETE FROM followcourse WHERE userId = :userId and courseId= :courseId'
            );
            $query->execute([
                'userId' => $userId,
                'courseId' => $courseId
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
}

function updateNumberOfparticipants($courseId,$action){
    $db = config::getconnexion();
    $newNumber=0;
    $actualNbofParticipants=0;
    try {
        $query = $db->query(
        "SELECT * FROM courses where courseId='$courseId'"
        );
        echo $actualNbofParticipants;

    } catch (PDOException $e) {
        $e->getMessage();
    }

        if($action == "increment"){
            $newNumber = $actualNbofParticipants+1;
        }
        else if($action == "decrement"){
            $newNumber = $actualNbofParticipants-1;
        }

        try{
            $query2 = $db->prepare(
                'UPDATE courses SET nbOfStudentsRegistered= :nbOfStudentsRegistered where courseId = :courseId'
            );
            $query2 = $query2->execute([
                'nbOfStudentsRegistered' => $newNumber,
                'courseId' => $courseId
            ]);
        }catch(PDOException $e){
            $e->getMessage();
        }
}

function updateNumberOfLikes($courseId,$action){
    $db = config::getconnexion();
    $newNumber=0;
    $actualNb=0;
    try {
        $query = $db->query(
        "SELECT * FROM courses where courseId='$courseId'"
        );
        $actualNb = $query['numberOfLikes'];
        $newNumber = $actualNb+1;

    } catch (PDOException $e) {
        $e->getMessage();
    }

        if($action == "increment"){
            $newNumber = $actualNb+1;
        }
        else if($action == "decrement"){
            $newNumber = $actualNb-1;
        }

        try{
            $query = $db->prepare(
                'UPDATE courses SET numberOfLikes= :numberOfLikes where courseId = :courseId'
            );
            $query = $query->execute([
                'numberOfLikes' => $newNumber,
                'courseId' => $courseId
            ]);
        }catch(PDOException $e){
            $e->getMessage();
        }
}

function LikeCourse($userId,$courseId)
{
    $db = config::getConnexion();
        try {
            $query = $db->prepare(
                'DELETE FROM followcourse WHERE userId = :userId and courseId= :courseId'
            );
            $query->execute([
                'userId' => $userId,
                'courseId' => $courseId
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
}

if(isset($_GET['courseNum']) && isset($_SESSION['userId']) && isset($_GET['action']) && $_GET['action']=='Join'){
    $courseId = $_GET['courseNum'];
    $userId = $_SESSION['userId'];
    addCoursesToMyCourses($userId,$courseId);
    updateNumberOfparticipants($courseId,"increment");
    header("location:../View/ShowFreeCourses.php");
}
else if(isset($_GET['courseNum']) && isset($_SESSION['userId']) && isset($_GET['action']) && $_GET['action']=='Drop'){
    $courseId = $_GET['courseNum'];
    $userId = $_SESSION['userId'];
    removeCoursesFromMyCourses($userId,$courseId);
    updateNumberOfparticipants($courseId,"decrement");
    header("location:../View/ShowFreeCourses.php");
}
else if(isset($_GET['courseNum']) && isset($_SESSION['userId']) && isset($_GET['action']) && $_GET['action']=='Like'){
    $courseId = $_GET['courseNum'];
    $userId = $_SESSION['userId'];
    
    updateNumberOfLikes($courseId,"decrement");
    header("location:../View/ShowFreeCourses.php");
}


?>