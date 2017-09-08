<?php
    session_start();
    include_once 'includes/header.html';
    include_once 'includes/dbh.inc.php';
    $first = $_SESSION['u_first'];
    $last = $_SESSION['u_last'];
    $search = $_SESSION['searchusername'];
    $searchusername=$_SESSION['searchusername'];
    $searchfirst=$_SESSION['friendfirst'];
    $searchlast=$_SESSION['friendlast'];
    $searchpoints=$_SESSION['friendpoints'];
    $searchfollowers=$_SESSION['friendfollowers'];
    $searchfollowing=$_SESSION['friendfollowing'];
?>
<div class="profileContainer">
    <div id="logoutform">
        <form action='includes/logout.inc.php' method='POST'>
            <button type="submit" name="submit">Log Out</button>
        </form>
    </div>
    <div class="content">
        <?php
            echo "<h1 id='fixtitle'>Welcome,<br>"."$first"." "."$last"."!</h1>";
        ?>
        <div class="links">
            <a href="main.php">Main</a><hr>
            <a href="forum.php">Forum</a><hr>
            <a href="exams.php">Exams</a><hr>
            <a href="includes/checkuserstats.php">Profile</a><hr>
            <a class="active" href="findpeople.php">Find People</a><hr>
            <a href="about.php">About</a><hr>
            <a href="planner.php">Planner</a><hr>
            <a href="contact.php">Contact</a>
        </div>
        <div class="profile1">
            <span id="profiletitle">
                <?php
                    echo "<h1>"."$searchfirst"." "."$searchlast"."</h1>";
                ?>
            </span>
            <div class="profileinfo">
                <div class="left">
                    <h1>Stats</h1>
                    <?php 
                        echo "<h2>Points = ".$searchpoints."</h2>";
                        echo "<h2>Followers = ".$searchfollowers."</h2>";
                        echo "<h2>Following = ".$searchfollowing."</h2>";
                    ?><br><br><br>
                </div>
                <div class="right">
                    <img src="uploads/defaultUser.png" width=200px height=200px>
                    <?php
                        echo "<h2>("."$searchusername".")</h2>";
                    ?>
                    <div class="extra">
                        <h2>Gender =  Nationality =  Age = </h2>
                    </div>
                </div>
            </div>
            <div class="follow">
                <form action="includes/follow.inc.php">
                    <button name="submit">Follow</button>
                </form>
            </div>
            <div class="back">
                <form action="includes/back.inc.php">
                    <button name="back">Back</button>
                </form>
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
                    if ($row['username']==$searchusername && $row['id']==$i) {
                        $date = $row['postdate'];
                        echo "<div class='feedpostarea'>";
                        echo "<h3>Posted on ".$date."</h3>";
                        $post = $row['post'];
                        echo "<h2>".$post."</h2>";
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
<?php
    include_once 'includes/footer.html';
?>