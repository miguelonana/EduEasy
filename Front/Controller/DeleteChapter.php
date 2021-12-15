<?php
include_once "../config.php";

function deleteChapter($chapterId){
    $db = config::getConnexion();
        try {
            $query = $db->prepare(
                'DELETE FROM chapter WHERE id = :id'
            );
            $query->execute([
                'id' => $chapterId
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
}

if(isset($_GET['id'])){
    deleteChapter($_GET['id']);
    $id=$_GET['id'];
    header("location:../View/singleCoursePage.php?id=".$id);
}



?>