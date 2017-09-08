<?php
    session_start();
    include_once 'dbh.inc.php';
    $username = $_SESSION['u_uid'];
    $friendname = $_SESSION['searchusername'];
    $check = "SELECT * FROM friendlog WHERE username='$username' AND friendname='$friendname'";
    $checktogether = mysqli_query($conn, $check);
    $resultCheck = mysqli_num_rows($checktogether);
    if ($resultCheck>0) {
        header("Location: ../searchUserProfile.php?alreadyFollowing");
        exit();
    } else {
        $follow = "INSERT INTO friendlog (username, friendname) VALUES ('$username', '$friendname')";
        mysqli_query($conn, $follow);
        $get = "SELECT * FROM users WHERE user_uid='$username'";
        $result = mysqli_query($conn, $get);
        $row = mysqli_fetch_assoc($result);
        $userfollowing = $row['user_following'];
        $userfollowing = $userfollowing + 1;
        $updateuserfollowing = "UPDATE users SET user_following = '$userfollowing' WHERE user_uid='$username'";
        $result=mysqli_query($conn, $updateuserfollowing);
        $get = "SELECT * FROM users WHERE user_uid='$friendname'";
        $result = mysqli_query($conn, $get);
        $row = mysqli_fetch_assoc($result);
        $friendfollowers = $row['user_followers'];
        $friendfollowers = $friendfollowers + 1;
        $updatefriendfollowers = "UPDATE users SET user_followers = '$friendfollowers' WHERE user_uid='$friendname'";
        $result=mysqli_query($conn, $updatefriendfollowers);
        header("Location: searchusers.php");
        exit();
    }