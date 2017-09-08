<?php 
    session_start();
    include_once 'includes/dbh.inc.php';
    include_once 'includes/header.html';
    $first = $_SESSION['u_first'];
    $last = $_SESSION['u_last']; 
?>
<div class="profileEditContainer">
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
            <div class="extraedit">
                <img src="uploads/defaultUser.png" width="250px" height="250px"><br><br><br><br><br><br>
                <a href="includes/checkuserstats.php">Return To Profile</a>
            </div>
            <div class="edit">
                <form action="includes/editprofile.inc.php" method="GET">
                    <label>Age:</label>
                    <span id="resizerage">
                    <input id="age" type="date" name="age"></span><br><br>
                    <label>Gender: </label>
                    <select id="gender" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select><br><br>
                    <label>Nationality: </label>
                    <select id="nat" name="nat">
                        <option value="Select Your Nationality">Select Your Nationality</option>
                        <option value="China">China</option>
                        <option value="France">France</option>
                        <option value="Germany">Germany</option>
                        <option value="Japan">Japan</option>
                        <option value="Russia">Russia</option>
                        <option value="United Kingdom">United Kingdom</option>
                        <option value="United States">United States</option>
                        <option value="South Korea">South Korea</option>   
                        <option value="Spain">Spain</option>  
                    </select><br><br>
                    <label>Biography (max 80 characters): </label><br><br>
                    <textarea id="bio" name="bio" rows="4" cols="30"></textarea><br><br>
                    <label>Relationship Status: </label>
                    <select id="rel" name="rel">
                        <option value="Single">Single</option>
                        <option value="In A Relationship">In A Relationship</option>
                        <option value="single">It's complicated</option> 
                    </select><br><br>
                    <button name="save">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    include_once 'includes/footer.html';
?>
