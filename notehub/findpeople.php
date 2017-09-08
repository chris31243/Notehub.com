<?php
    session_start();
    include_once "includes/header.html";
    include_once "includes/dbh.inc.php";
    $first = $_SESSION['u_first'];
    $last = $_SESSION['u_last'];  
    $searchusername = $_SESSION['searchusername'];
?>
<div class="findpeopleContainer">
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
    <div class="findcontent">
        <form action="includes/searchusers.php" method="GET">
            <input type="text" name="search">
            <button name="submit">Search</button>
        </form>
        <div class="results">
            <h1>Search Results:</h1>
            <a>
            <?php
                include_once 'includes/dbh.inc.php';
                echo "<a href='searchUserProfile.php'>"."$searchusername"."</a>";
            ?>
            </a>
            <img src="uploads/defaultUser.png" width=40px height=40px>
        </div>
    </div>
</div>

<?php
    include_once "includes/footer.html";
?>