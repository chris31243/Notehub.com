<?php
    session_start();
    if (isset($_POST['submit'])) {
        include_once "dbh.inc.php";
        $post = mysqli_real_escape_string($conn, $_POST['post']);
        if (empty($post)) {
            header("Location: ../main.php?postEmpty");
        } else {
            $username = $_SESSION['u_uid'];
            $post = mysqli_real_escape_string($conn, $_POST['post']);
            date_default_timezone_set("Europe/London");
            $date = date("Y/m/d H:i:s");
            $sql = "INSERT INTO posts (username, post, postdate) VALUES ('$username', '$post', '$date')";
            $result = mysqli_query($conn, $sql);
            $postid = $row['id'];
            $_SESSION['postid'] = $postid;
            header("Location: ../main.php?postSuccess");
            exit();
        }
    } else {
        header("Location: ../main.php?postError");
    }