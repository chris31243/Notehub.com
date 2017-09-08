<?php
    session_start();
    include_once 'includes/header.html';
    include 'includes/dbh.inc.php';
    $first = $_SESSION['u_first'];
    $last = $_SESSION['u_last'];
    $username = $_SESSION['u_uid'];
    $points = $_SESSION['u_points'];
    $following = $_SESSION['u_following'];
    $followers = $_SESSION['u_followers'];
    $sql = "SELECT * FROM posts WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $postid = $row['id'];
?>
<script>
    $(window).on("scroll", function() {
	var scrollHeight = $(document).height();
	var scrollPosition = $(window).height() + $(window).scrollTop();
	if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
        var checkheight = $('.friendfeed').height();
        checkheight += 300;
        $('.friendfeed').css('height', checkheight);
	}

});
</script>
<div class="mainContainer">
            <div id="logoutform">
                <form action='includes/logout.inc.php' method='POST'>
                    <button type="submit" name="submit">Log Out</button>
                </form>
            </div>
<div class="content">
    <div class="profileArea">
        <div class="profileInfo">
            <?php
                echo "<h2>"."$first"." "."$last"."</h2>";
                echo "<h3> ("."$username".") </h3>";
                echo "<a href='includes/checkuserstats.php'><img src=uploads/defaultUser.png width=100px height=100px></a>"; 
                echo "<h3 id='points'> Points = "."$points"."</h3>";
                echo "<h3 id='following'> Following = "."$following"."</h3>";
                echo "<h3 id='followers'> Followers = "."$followers"."</h3>";
            ?>
        </div>
    </div>
    <?php
        echo "<h1 id='fixtitle'>Welcome,<br>"."$first"." "."$last"."!</h1>";
    ?>
    <div class="links">
            <a class="active" href="main.php">Main</a><hr>
            <a href="forum.php">Forum</a><hr>
            <a href="exams.php">Exams</a><hr>
            <a href="includes/checkuserstats.php">Profile</a><hr>
            <a href="findpeople.php">Find People</a><hr>
            <a href="about.php">About</a><hr>
            <a href="planner.php">Planner</a><hr>
            <a href="contact.php">Contact</a>
    </div>
    <div class="postareamain">
            <h1>Post To Your Feed</h1>
            <form action="includes/post.inc.php" method="POST">
                <input type="text" name="post" placeholder="Post something to your feed..." rows="5" cols="50"></textarea><br><br>
                <br>
                <button name="submit">Submit</button>
            </form>
        </div>
    <div class="mainContent">
        <div class="buttons">
            <button onclick="hideclick()" id="menuhide">Hide</button>
            <button onclick="showclick()" id="menushow">Show</button>
        </div>
        <div id="openmenu">
            <div class="examLinks">
                <div id="exambanner1">
                    <h1>Notes</h1>
                    <button onclick="examinfoclick()" id="info"><i class="fa fa-info-circle"></i></button>
                    <h2><a id="linktoexams" href="exams.php">Visit The Notes Page</a></h2>
                </div>
                <div id="exambanner2">
                    <button onclick="examcloseclick()" id="close"><i class="fa fa-times-circle-o"></i></button>
                    <h1>Select Your Exams</h1>
                    <h2 id="infotext">One of the main aims of Notehub is to allow you to share your notes with others, and 
                        download notes others have provided. Choose the exam you're revising for, pick the subject 
                        and download/upload notes to help you get the grades you want! People can also upvote or downvote
                        your notes, giving you points which unlock achievements! Click the link to visit the notes page.</h2>
                </div>
            </div>
            <script>
                function examinfoclick() {
                    $('#exambanner1').slideUp(300);
                    $('#exambanner2').show(300);
                }
                function examcloseclick() {
                    $('#exambanner1').slideDown(300);
                    $('#exambanner2').hide(300);
                }
            </script>
            <div class="forumLink">
                <div id="forumbanner1">
                    <h1>Forum</h1>
                    <button onclick="foruminfoclick()" id="info"><i class="fa fa-info-circle"></i></button>
                    <h2><a href="forum.php">Visit The Forum</a></h2>
                </div>
                <div id="forumbanner2">
                    <button onclick="forumcloseclick()" id="close"><i class="fa fa-times-circle-o"></i></button>
                    <h1>Visit The Forum</h1>
                    <h2 id="infotext">The forum is the place you can go to to ask questions about your work, and have them answered by 
                        students just like you. Click the link to go to the forum!</h2>
                </div>
            </div>
            <script>
                function foruminfoclick() {
                    $('#forumbanner1').slideUp(300);
                    $('#forumbanner2').show(300);
                }
                function forumcloseclick() {
                    $('#forumbanner1').slideDown(300);
                    $('#forumbanner2').hide(300);
                }
            </script>
            <div class="editProfile">
                <div id="editbanner1">
                    <h1>Profile</h1>
                    <button onclick="editinfoclick()" id="info"><i class="fa fa-info-circle"></i></button>
                    <h2><a href="profile.php">Edit Your Profile</a></h2>
                </div>
                <div id="editbanner2">
                    <button onclick="editcloseclick()" id="close"><i class="fa fa-times-circle-o"></i></button>
                    <h1>Edit Your Profile</h1>
                    <h2 id="infotext">Your profile defines who you are on Notehub. Click the link to personalize your account, uplod a
                        profile picture, set a biography and more!</h2>
                </div>
            </div>
            <script>
                function editinfoclick() {
                    $('#editbanner1').slideUp(300);
                    $('#editbanner2').show(300);
                }
                function editcloseclick() {
                    $('#editbanner1').slideDown(300);
                    $('#editbanner2').hide(300);
                }
            </script>
            <div class="aboutLink">
                <div id="aboutbanner1">
                    <h1>About</h1>
                    <button onclick="aboutinfoclick()" id="info"><i class="fa fa-info-circle"></i></button>
                    <h2><a href="about.php">About Notehub <i class="fa fa-file-text-o"></i></a></h2>
                </div>
                <div id="aboutbanner2">
                    <button onclick="aboutcloseclick()" id="close"><i class="fa fa-times-circle-o"></i></button>
                    <h1>About Notehub</h1>
                    <h2 id="infotext">Notehub is a website designed to help students from all around the country prepare for their exams.
                        Click the link to learn more about Notehub!</h2>
                </div>
            </div>
            <script>
                function aboutinfoclick() {
                    $('#aboutbanner1').slideUp(300);
                    $('#aboutbanner2').show(300);
                }
                function aboutcloseclick() {
                    $('#aboutbanner1').slideDown(300);
                    $('#aboutbanner2').hide(300);
                }
            </script>
        </div>
    </div>
    <div id="closemenu">  
    </div>
    <script>
        function showclick() {
            $('#openmenu').slideDown(300);
            $('#closemenu').hide(300);
            $('#menuhide').show(300);
            $('#menushow').hide(300);
        }
        function hideclick() {
            $('#openmenu').slideUp(300);
            $('#closemenu').show(300);
            $('#menuhide').hide(300);
            $('#menushow').show(300);
        }
    </script>
    <div class="userfeed">
        <div class="buttons">
            <button id="feedhide" onclick="userfeedhideclick()">Hide</button>
            <button id="feedshow" onclick="userfeedshowclick()">Show</button>
        </div>
        <div id="userfeedshow">           
            <h1>Your Feed</h1>
            <?php
                $sql = "SELECT * FROM posts";
                $result = mysqli_query($conn, $sql);
                $totalrows = mysqli_num_rows($result);
                $i = $totalrows + 15;
                while ($i>0) {
                    $getpost = "SELECT * FROM posts WHERE id = '$i'";
                    $getresult = mysqli_query($conn, $getpost);
                    $row = mysqli_fetch_assoc($getresult);
                    if ($row['username']==$username && $row['id']==$i) {
                        $date = $row['postdate'];
                        echo "<div class='feedpostarea'>";
                        echo "<h3>Posted ".$date."</h3>";
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
        <div id="userfeedhide">
        </div>
    </div>    
    <script>
        function userfeedhideclick() {
            $('#userfeedshow').slideUp(300);
            $('#userfeedhide').show(300);
            $('#feedshow').show(300);
            $('#feedhide').hide(300);
        }
        function userfeedshowclick() {
            $('#userfeedshow').slideDown(300);
            $('#userfeedhide').hide(300);
            $('#feedshow').hide(300);
            $('#feedhide').show(300);
        }
    </script>
    <div class="friendfeed">
        <h1>Friends' Feed</h1>
        <?php
            $sql = "SELECT * FROM posts";
            $result = mysqli_query($conn, $sql);
            $totalrows = mysqli_num_rows($result);
            $i = $totalrows;
            $sqlcheck = "SELECT * FROM friendlog WHERE username = '$username'";
            $checkresult = mysqli_query($conn, $sqlcheck);
            $check = mysqli_fetch_assoc($checkresult);
            $checkfriend = $check['friendname'];
            while ($i>0) {
                $getpost = "SELECT * FROM posts WHERE id = '$i'";
                $getresult = mysqli_query($conn, $getpost);
                $row = mysqli_fetch_assoc($getresult);
                if ($row['username']==$checkfriend  && $row['id']==$i) {
                    $date = $row['postdate'];
                    $_SESSION['visitfriendname']=$row['username'];
                    $sql = "SELECT * FROM users WHERE user_uid = '$checkfriend'";
                    $result = mysqli_query($conn, $sql);
                    $resultcheck = mysqli_fetch_assoc($result);
                    $friendfirst = $resultcheck['user_first'];
                    $friendlast = $resultcheck['user_last'];
                    echo "<div class='feedpostarea'>";
                    echo "<h3>Posted ".$date." by <a href='includes/visituserprofile.inc.php'>".$row['username']."</a></h3>";
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

<?php
    include_once 'includes/footer.html';
?>