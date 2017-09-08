<?php
    session_start();
    include_once 'includes/header.html';
    include 'includes/dbh.inc.php';
    $first = $_SESSION['u_first'];
    $last = $_SESSION['u_last'];
?>
<div class="aboutContainer">
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
            <a class="active" href="about.php">About</a><hr>
            <a href="planner.php">Planner</a><hr>
            <a href="contact.php">Contact</a>
    </div>
    <div class="aboutcontent">
        <h1>About</h1>
        <div class="aboutnotehub">
            <h2>About Notehub <i class="fa fa-file-text-o"></i></h2>
            <p>Notehub <i class="fa fa-file-text-o"></i> is a website designed to help all students preparing for exams. On Notehub <i class="fa fa-file-text-o"></i>,
            you can upload notes for other students to download, download other students' notes, ask questions on the forum and so much more!</p>
            <h2>Notehub's aims</h2>
            <p>Notehub aims to provide a service for all students to help them in their preparation for exams and help them get the grades they want.
                In the long term, Notehub <i class="fa fa-file-text-o"></i> aims to provide children in less developed countries (who do not
                have the resources available to learn) with the chance to get a suitable education.</p>
        </div>
    </div>
</div>
<?php
    include_once 'includes/footer.html';
?>