<?php
    session_start();
    include_once 'dbh.inc.php';
    $searchusername=$_SESSION['searchusername'];
    $sql = "SELECT * FROM users WHERE user_uid='$searchusername'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $friendpoints = $row['user_points'];
    $friendfollowers = $row['user_followers'];
    $friendfollowing = $row['user_following'];
    $friendfirst = $row['user_first'];
    $friendlast = $row['user_last'];
    $_SESSION['friendpoints']=$friendpoints;
    $_SESSION['friendfollowing']=$friendfollowing;
    $_SESSION['friendfollowers']=$friendfollowers;
    $_SESSION['friendfirst']=$friendfirst;
    $_SESSION['friendlast']=$friendlast;
    header("Location: ../searchUserProfile.php");
    exit();