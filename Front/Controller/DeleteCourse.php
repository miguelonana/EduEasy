<?php
include_once "../config.php";
    function deleteCourse($courseId){
        $db = config::getConnexion();
        try {
            $query = $db->prepare(
                'DELETE FROM courses WHERE id = :id'
            );
            $query->execute([
                'id' => $courseId
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    if(isset($_GET['id'])){
        deleteCourse($_GET['id']);
        header("location:../View/teacherpage.php");
    }
?>