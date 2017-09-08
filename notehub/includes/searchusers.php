<?php
session_start();
include 'dbh.inc.php';
$search = mysqli_real_escape_string($conn, $_GET['search']);
//Error handlers
//Check if search is empty
if (empty($search)) {
    header("Location: ../findpeople.php?search=empty");
    exit();
} else {
    $sql = "SELECT * FROM users WHERE user_uid='$search'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $searchusername=$row['user_uid'];
    if (strlen($searchusername)>0) {
        $_SESSION['searchusername']=$searchusername;
        header("Location: checkfriendstats.php");
        exit();
    } else {
        header("Location: ../findpeople.php?noUserCalled"."$search");
        exit();
    }
}