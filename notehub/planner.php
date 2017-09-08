<?php
    session_start();
    include_once 'includes/header.html';
    include 'includes/dbh.inc.php';
    $first = $_SESSION['u_first'];
    $last = $_SESSION['u_last'];
?>
<div class="mainContainer">
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
            <a href="findpeople.php">Find People</a><hr>
            <a href="about.php">About</a><hr>
            <a class="active" href="planner.php">Planner</a><hr>
            <a href="contact.php">Contact</a>
    </div>
</div>
<?php
    include_once 'includes/footer.html';
?>