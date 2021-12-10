<?php

/******* 
 * This script and  its functions are aimed at managing notifications
 * contains 3 functions. 2 of them a used to modify Notification status and 1 to delete a notification
 ********/ 

include_once "../config.php";

function markAsRead($notificationNumber){
    $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE notification SET status= :status where number = :number'
            );
            $query = $query->execute([
                'number' => $notificationNumber,
                'status' => "read"
            ]);
        }catch(PDOException $e){
            $e->getMessage();
        }
}

function markAsUnread($notificationNumber){
    $db = config::getConnexion();
        try{
            $query = $db->prepare(
                'UPDATE notification SET status= :status where number = :number'
            );
            $query = $query->execute([
                'number' => $notificationNumber,
                'status' => "unread"
            ]);
        }catch(PDOException $e){
            $e->getMessage();
        }
}

function deleteNotification($notificationNumber){
    $db = config::getConnexion();
        try {
            $query = $db->prepare(
                'DELETE FROM notification WHERE number = :number'
            );
            $query->execute([
                'number' => $notificationNumber
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
}

if(isset($_GET['number']) && isset($_GET['status'])){
$notificationNumber = $_GET['number'];
$notificationStatus = $_GET['status'];

if($notificationStatus=="unread")
    markAsRead($notificationNumber);
else if($notificationStatus=="read")
    markAsUnread($notificationNumber);
}
else if(isset($_GET['number'])){
    $notificationNumber = $_GET['number'];
    deleteNotification($notificationNumber);
}
    
header("location:../View/ShowNotifications.php");

?>