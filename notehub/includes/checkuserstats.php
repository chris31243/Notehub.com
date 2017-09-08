<?php
    session_start();
    include_once 'dbh.inc.php';
    $uid = $_SESSION['u_uid'];
    $sql = "SELECT * FROM users WHERE user_uid='$uid'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $userpoints = $row['user_points'];
    $userfollowers = $row['user_followers'];
    $userfollowing = $row['user_following'];
    $_SESSION['userpoints']=$userpoints;
    $_SESSION['userfollowing']=$userfollowing;
    $_SESSION['userfollowers']=$userfollowers;
    header("Location: ../profile.php");
    exit();