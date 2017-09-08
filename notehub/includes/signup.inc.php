<?php
session_start();
if (isset($_POST['submit'])) {
    include 'dbh.inc.php';
    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    //Error handlers
    //Check for empty fields
    if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
        header("Location: ../firstpage.html?signup=empty");
        exit();
    } else {
        //Check if input characters are valid
        if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
            header("Location: ../firstpage.html?signup=invalid");
            exit();
        } else {
            //Check if email is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header("Location: ../firstpage.html?signup=invalidEmail");
                exit();
            } else {
                //Check if checkbox ticked
                if (isset($_POST['checkAgree'])) {
                    $sql = "SELECT * FROM users WHERE user_uid ='$uid'";
                    $result = mysqli_query($conn, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    if ($resultCheck > 0) {
                        header("Location: ../firstpage.html?signup=usernameTaken");
                        exit();
                    } else {
                        //Hashing the password
                        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                        //Insert the user into the database
                        date_default_timezone_set("Europe/London");
                        $date = date("Y-m-d");
                        $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd, user_points, user_following, user_followers, joindate) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd', '0', '0', '0', '$date');";
                        mysqli_query($conn, $sql);
                        $login = "SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";
                        $result = mysqli_query($conn, $login);
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['u_id'] = $row['id'];
                        $_SESSION['u_first'] = $row['user_first'];
                        $_SESSION['u_last'] = $row['user_last'];
                        $_SESSION['u_email'] = $row['user_email'];
                        $_SESSION['u_uid'] = $row['user_uid'];
                        $_SESSION['u_points'] = $row['user_points'];
                        $_SESSION['u_following'] = $row['user_following'];
                        $_SESSION['u_followers'] = $row['user_followers'];
                        header("Location: ../main.php");
                        exit();
                    }
                } else {
                    header("Location: ../firstpage.html?signup=checkboxNotTicked");
                    exit();
                }
            }
        }
    }
} else {
    header("Location: ../firstpage.html");
    exit();
}