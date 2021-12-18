<?php

include_once "../config.php";
session_start();

if(!isset($_SESSION['loggedIn']) || isset($_SESSION['loggedIn'])!=true){
    header("location:../View/login.html");
}
else{
    $db = config::getConnexion();

        try {
            
            $query = $db->prepare(
                'INSERT INTO cart (product_name,product_price,product_image,qty,total_price,product_code) 
                    VALUES (:product_name,:product_price,:product_image,:qty,:total_price,:product_code)'
            );
            $query->execute([
                'product_name' => $_GET['courseId'],
                'product_price' => 50,
                'product_image' => "",
                'qty' => 1,
                'total_price' => 50,
                'product_code' => $_SESSION['userId']
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header("location:../View/ShowPaidCourses.php");
}

?>