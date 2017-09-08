<?php 
    session_start();
    include_once 'includes/dbh.inc.php';
    include_once 'includes/header.html';
    $first = $_SESSION['u_first'];
    $last = $_SESSION['u_last']; 
    $uid = $_SESSION['u_uid'];
    $userpoints=$_SESSION['userpoints'];
    $userfollowing=$_SESSION['userfollowing'];
    $userfollowers=$_SESSION['userfollowers'];
?>
<div class="profileContainer">
            <div id="logoutform">
                <form action='includes/logout.inc.php' method='POST'>
                    <button type="submit" name="submit">Log Out</button>
                </form>
            </div>
<div class=content> 
    <?php
        echo "<h1 id='fixtitle'>Welcome,<br>"."$first"." "."$last"."!</h1>";
?>
    <div class="links">
            <a href="main.php">Main</a><hr>
            <a href="forum.php">Forum</a><hr>
            <a href="exams.php">Exams</a><hr>
            <a class="active" href="includes/checkuserstats.php">Profile</a><hr>
            <a href="findpeople.php">Find People</a><hr>
            <a href="about.php">About</a><hr>
            <a href="planner.php">Planner</a><hr>
            <a href="contact.php">Contact</a>
    </div>
    <div class="profile1">
        <span id="profiletitle">
            <?php
                echo "<h1>"."$first"." "."$last"."</h1>";
            ?>
            </span>
        <div class="profileinfo">
            <div class="left">
                <h1>Stats</h1>
                <?php
                echo "<h2>Points = ".$userpoints."</h2>";
                echo "<h2>Followers = ".$userfollowers."</h2>";
                echo "<h2>Following = ".$userfollowing."</h2>";
                ?>
                <br><br><br>
                <a href="editprofile.php">Edit Your Profile</a>
                <h3>(Upload a profile picture, write a short biography, choose your nationality and more!)</h3>
            </div>
            <div class="right">
                <img src="uploads/defaultUser.png" width=200px height=200px>
                <?php
                    echo "<h2>("."$uid".")</h2>";
                ?>
                <div class="extra">
                    <h2>Gender =  Nationality =  Age = </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="profile2">
        <span id="center"><h1>Feed</h1></span>
        <div id="userfeedshow">           
            <?php
                $sql = "SELECT * FROM posts";
                $result = mysqli_query($conn, $sql);
                $totalrows = mysqli_num_rows($result);
                $i = $totalrows;
                while ($i>0) {
                    $getpost = "SELECT * FROM posts WHERE id = '$i'";
                    $getresult = mysqli_query($conn, $getpost);
                    $row = mysqli_fetch_assoc($getresult);
                    if ($row['username']==$uid && $row['id']==$i) {
                        $date = $row['postdate'];
                        echo "<div class='feedpostarea'>";
                        echo "<h3>Posted on ".$date."</h3>";
                        $post = $row['post'];
                        echo "<h2>".$post."</h2>";
                        echo "<div class='userfeedbuttons'>";
                        echo "<form action='includes/postsettings.inc.php' method='POST'>";
                        echo "<button id='delete' name='delete'><i class='fa fa-trash-o' aria-hidden='true'></i></button>";
                        echo "<button id='edit' name='edit'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button>";
                        echo "<button id='privacy' name='privacy'><i class='fa fa-lock' aria-hidden='true'></i></button>";
                        echo "<button id='tag' name='tag'><i class='fa fa-tags' aria-hidden='true'></i></button>";
                        echo "</form>";
                        echo "</div>";
                        echo "</div>";
                        $i--;
                    } else {
                        $i--;
                    }
                }
            ?>
        </div>
        </div>
    </div>
</div>
<?php
    include_once 'includes/footer.html';
?>
