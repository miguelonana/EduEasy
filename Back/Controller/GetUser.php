<?php

include_once "../Model/User.php";
include_once "../config.php";



    function getAllStudents(){
        $db = config::getconnexion();

        try {
            $query = $db->query(
            "SELECT * FROM student"
            );
            return $query;

        } catch (PDOException $e) {
            $e->getMessage();
        }
    }



    function getAllTeachers(){
        $db = config::getconnexion();

        try {
            $query = $db->query(
            "SELECT * FROM teacher"
            );
            return $query;

        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

function getAllAdministrators(){
    $db = config::getconnexion();

    try {
        $query = $db->query(
        "SELECT * FROM administrator"
        );
        return $query;

    } catch (PDOException $e) {
        $e->getMessage();
    }
}
?>