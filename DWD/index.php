<?php
    session_start();
    require_once 'dbconnect.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/index-style.css">
    <link rel="stylesheet" href="CSS/footer-style.css">
    <link rel="icon" href="Images/favicon.ico">
    <title>Originals</title>
    <script type="text/javascript">
        function profileMenuInvoke(){
            var n=document.getElementById('profilemenu');
            if (n.style.display == "none") {
                n.style.display = "flex";
            } else {
                n.style.display = "none";
            }
        }
        function mobileMenuInvoke(){
            var n=document.getElementById('mobilemenu');
            
            if (n.style.display == "none") {
                n.style.display = "flex";
            } else {
                n.style.display = "none";
            }
        }
        function invokeImax(){
            var imax=document.getElementById('imax');
            var imaxbtn=document.getElementById('imaxbtn');

            var cinemas=document.getElementById('cinemas');
            var cinemasbtn=document.getElementById('cinemasbtn');

            var fastbook=document.getElementById('fastbook');
            var fastbookbtn=document.getElementById('fastbookbtn');
            if (imax.style.display == "none") {
                imax.style.display = "flex";
                imaxbtn.style.background="#40D3DC";

                cinemas.style.display = "none";
                cinemasbtn.style.background="none";

                fastbook.style.display = "none";
                fastbookbtn.style.background="none";
            } else {
                imax.style.display = "none";
                imaxbtn.style.background="none";
            }
        }
        function invokeCinemas(){
            var cinemas=document.getElementById('cinemas');
            var cinemasbtn=document.getElementById('cinemasbtn');

            var imax=document.getElementById('imax');
            var imaxbtn=document.getElementById('imaxbtn');

            var fastbook=document.getElementById('fastbook');
            var fastbookbtn=document.getElementById('fastbookbtn');
            if (cinemas.style.display == "none") {
                cinemas.style.display = "flex";
                cinemasbtn.style.background="#40D3DC";

                imax.style.display = "none";
                imaxbtn.style.background="none";

                fastbook.style.display = "none";
                fastbookbtn.style.background="none";
            } else {
                cinemas.style.display = "none";
                cinemasbtn.style.background="none";
            }
        }
        function invokeBookings(){
            var bookings=document.getElementById('bookings');
            var bookingsbtn=document.getElementById('bookingsbtn');

            var imax=document.getElementById('imax');
            var imaxbtn=document.getElementById('imaxbtn');

            var cinemas=document.getElementById('cinemas');
            var cinemasbtn=document.getElementById('cinemasbtn');
            if (bookings.style.display == "none") {
                bookings.style.display = "flex";
                bookingsbtn.style.background="#40D3DC";

                imax.style.display = "none";
                imaxbtn.style.background="none";

                cinemas.style.display = "none";
                cinemasbtn.style.background="none";
            } else {
                bookings.style.display = "none";
                bookingsbtn.style.background="none";
            }
        }
    </script>
    <?php
                   if(isset($_SESSION["uname"])){?>
                            <style>
                                .login{
                                    display:none;
                                }
                                .buttons .logout{
                                    display:block;
                                }
                            </style>
                <?php   }
                ?>
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <div class="container">
            <?php if(isset($_SESSION['uname'])){ ?>
               <a href="index.php?error=nonel"><div class="logo">
                    <p>Originals</p>
                </div></a>
            <?php }else{ ?>
                <a href="index.php"><div class="logo">
                    <p>Originals</p>
                </div></a>
            <?php }?>
                <div class="buttons">
                  <div class="button1">
                        <p>Kolkata</p>
                    </div>
                    <div class="button2 signup" id="button2" onclick="profileMenuInvoke()">
                        <?php
                            
                            if(!isset($_SESSION["uname"])){ ?>
                                <a href="signup.php"><p class="signup">SignUp</p></a>
                        <?php }else{ 
                            echo '<div class="user" style="color:white; cursor:pointer;">'.$_SESSION["uname"].'</div>';?>
                            <img src="" alt="">
                        <?php
                         } ?>
                          <div class="profilemenu" id="profilemenu">
                            <ul>
                               <a href="edit-profile.php"><li><p>Edit Profile</p></li></a>
                                <li onclick="invokeBookings()"><p>Bookings</p></li>
                                <li>
                                    <a href="logout.inc.php">
                                        <div class="button2 logout">
                                            <p>LogOut</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a href="login.php"><div class="button2 login">
                        <p>LogIn</p>
                    </div></a>
                    
                    <div class="button3" onclick="mobileMenuInvoke()">
                        <img class="mobilemenusvg" src="Images/menu.svg" alt="menu">
                    </div>
                </div>
            </div>
        </div>
        <div class="menu">
            <ul>
               <a href="movies.php"><li>Movies</li></a>
               <a href="index.php?offer=none"><li>Offers</li></a>
               <li onclick="invokeImax()" id="imaxbtn" title="double-click it">IMAX Movies</li>
               <li onclick="invokeCinemas()" id="cinemasbtn" title="double-click it">Cinemas</li>
            </ul>
        </div>

        <?php
            if(isset($_GET["error"])){
                if($_GET["error"]=="passwordsDoesntMatch"){ ?>
                <div class="toast" id="toast">
                    <?php echo "Passwords Doesn't match!"; ?>
                </div>
               <?php }
                else if($_GET["error"]=="none"){
                    ?>
                    <div class="toast" id="toast">
                    <?php echo "Signed up Successfully."; ?>
                    </div>
                <?php }
                else if($_GET["error"]=="nonel" && isset($_SESSION["uname"])){
                    ?>
                    <div class="toast" id="toast">
                    <?php echo "Logged in Successfully.<br>";?>
                    <span onclick="timer()" style="font-weight:600;cursor:pointer;color:#40D3DC;">&nbsp;&nbsp;&nbsp;&nbsp;X</span>
                    </div>
                <?php }
            }
            if(isset($_GET['book'])){
                if($_GET['book']=="success"){?>
                    <div class="toast" id="toast">
                    <?php echo "Booked Successfully"; ?>
                </div>
             <?php   }
            }
            if(isset($_GET['offer'])){
                if($_GET['offer']=="none"){?>
                    <div class="toast" id="toast">
                    <?php echo "Sorry! No Offers Available."; ?>
                </div>
             <?php   }
            }
        ?>
        <script> 
            function timer(){
                var element= document.getElementById('toast');
                element.remove();
            }
            setTimeout(timer, 3000);
        </script>

        <div class="mobilemenu" id="mobilemenu">
        <ul>
               <a href="movies.php"><li>Movies</li></a>
               <a href="index.php?offer=none"><li>Offers</li></a>
               <li onclick="invokeImax()" id="imaxbtn">IMAX Movies</li>
               <li onclick="invokeCinemas()" id="cinemasbtn" title="double-click it">Cinemas</li>
            </ul>
        </div>

        <div class="imax" id="imax">
                <div class="heading">
                    <h2>IMAX Movies</h2>
                </div>
            <div class="recommendation">
            <?php
                $sql="SELECT movies.mid,mname,mcat,mimage FROM movies INNER JOIN moviedefinition ON movies.mid=moviedefinition.mid WHERE imax2d='1' OR imax3d='1';";
                $rs=mysqli_query($con, $sql);
            ?>
            <div class="list">
                    <?php
                            while($row=mysqli_fetch_array($rs)){
                                $mid=$row['mid'];
                        ?>
                            <a href="moviepage.php?mid=<?= $mid ?>"><div class="m">
                            <img class="movie-images" src="<?=$row['mimage']?>" alt="image">
                            <h3><?php echo $row['mname'] ;?></h3>
                            <p><?php echo $row['mcat'] ;?></p>
                            </div></a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="cinemas" id="cinemas">
            <?php
                $sql="SELECT chid,chname FROM cinemahall;";
                $rs=mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($rs)){
            ?>
            <h4><a href="cinemahallpage.php?chid=<?php echo $row['chid']; ?>" style="color:#072227;"><?php echo $row['chname']; ?></a></h4>
            <?php } ?>
        </div>
        <div class="bookings" id="bookings">
            <?php
                $uid=$_SESSION["uid"];
                $sql="SELECT * FROM booking WHERE uid='$uid';";
                $rs=mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($rs)){
                    $sqlm="SELECT mname FROM movies WHERE mid='".$row['mid']."';";
                    $sqlch="SELECT chname FROM cinemahall WHERE chid='".$row['chid']."';";
                    $sqltic="SELECT ticketprice FROM shows WHERE shid='".$row['shid']."';";

                    $rsm=mysqli_query($con,$sqlm);
                    $rsch=mysqli_query($con,$sqlch);
                    $rstic=mysqli_query($con,$sqltic);

                    $rowm=mysqli_fetch_array($rsm);
                    $rowch=mysqli_fetch_array($rsch);
                    $rowtic=mysqli_fetch_array($rstic);
            ?>
            <div class="booking">
                <h2><?php echo $rowm['mname']; ?></h1>
                <h4><?php echo $rowch['chname']; ?></h4>
                <h4><?php echo "Rs. ".$rowtic['ticketprice']." each"; ?></h4>
                <h4><?php echo $row['seatsno']." ticket"; ?></h4>
                <h4><strong><?php echo $row['time']; ?></strong></h3>
            </div>
            <?php } ?>
        </div>

        <div class="content">
            <div class="banner">
                <div class="slider">
                    <div class="slides">
                        <input type="radio" name="radio-btn" id="r1">
                        <input type="radio" name="radio-btn" id="r2">
                        <input type="radio" name="radio-btn" id="r3">
                        <input type="radio" name="radio-btn" id="r4">
                        <div class="slide first">
                            <img src="Images/b1.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="Images/b2.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="Images/b3.png" alt="">
                        </div>
                        <div class="slide">
                            <img src="Images/b4.png" alt="">
                        </div>

                        <div class="nav">
                            <label for="r1" class="btn"></label>
                            <label for="r2" class="btn"></label>
                            <label for="r3" class="btn"></label>
                            <label for="r4" class="btn"></label>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $sql="SELECT mid,mname,mcat,mimage FROM movies LIMIT 5;";
            $rs=mysqli_query($con, $sql);
            ?>
            <div class="recommendation">
                <div class="heading">
                <h2>Recommended Movies</h2>
                <a href="movies.php"><span>See All</span></a>
                </div>
                <div class="list">
                <?php
                    while($row=mysqli_fetch_array($rs)){
                        $mid=$row['mid'];
                ?>
                    <a href="moviepage.php?mid=<?= $mid ?>"><div class="m">
                    <img class="movie-images" src="<?=$row['mimage']?>" alt="image">
                    <h3><?php echo $row['mname'] ;?></h3>
                    <p><?php echo $row['mcat'] ;?></p>
                    </div></a>
                <?php } ?>
                </div>
            </div>

           <div class="advertisement">
           <a href="#"><img src="Images/coming-soon.avif" alt="coming-soon"></a>
            </div>

            <?php
            require_once 'dbconnect.inc.php';
            $sql="SELECT mid,mname,mcat,mimage FROM movies WHERE mserial BETWEEN 5 AND 9;";
            $rs=mysqli_query($con, $sql);
            ?>
            <div class="recommendation">
                <div class="heading">
                    <h2>Recommended Movies, again</h2>
                    <a href="movies.php"><span>See All</span></a>
                </div>
                <div class="list">
                    <?php
                        while($row=mysqli_fetch_array($rs)){
                            $mid=$row['mid'];
                    ?>
                        <a href="moviepage.php?mid=<?= $mid ?>"><div class="m">
                        <img class="movie-images" src="<?=$row['mimage']?>" alt="image">
                        <h3><?php echo $row['mname'] ;?></h3>
                        <p><?php echo $row['mcat'] ;?></p>
                        </div></a>
                    <?php } ?>
                </div>
            </div>

            <?php
            $sql="SELECT movies.mid,mname,mcat,mimage FROM movielang INNER JOIN movies ON movies.mid=movielang.mid WHERE ban='1';";
            $rs=mysqli_query($con, $sql);
            ?>

            <div class="recommendation">
                <div class="heading">
                    <h2>Bangla for you</h2>
                    <a href="movies.php?col=ban&filter=languages"><span>See All</span></a>
                </div>
                <div class="list">
                    <?php
                            while($row=mysqli_fetch_array($rs)){
                                $mid=$row['mid'];
                        ?>
                            <a href="moviepage.php?mid=<?= $mid ?>"><div class="m">
                            <img class="movie-images" src="<?=$row['mimage']?>" alt="image">
                            <h3><?php echo $row['mname'] ;?></h3>
                            <p><?php echo $row['mcat'] ;?></p>
                            </div></a>
                    <?php } ?>
                </div>
            </div>

            <?php
            $sql="SELECT movies.mid,mname,mcat,mimage FROM movies INNER JOIN moviecategory ON movies.mid=moviecategory.mid WHERE anime='1';";
            $rs=mysqli_query($con, $sql);
            ?>

            <div class="recommendation">
                <div class="heading">
                    <div class="heading">
                        <h2>Upcoming For Weebs</h2>
                        <a href="movies.php?col=anime&filter=categories"><span>See All</span></a>
                    </div>
                </div>
                <div class="list">
                <?php
                            while($row=mysqli_fetch_array($rs)){
                                $mid=$row['mid'];
                        ?>
                            <a href="moviepage.php?mid=<?= $mid ?>"><div class="m">
                            <img class="movie-images" src="<?=$row['mimage']?>" alt="image">
                            <h3><?php echo $row['mname'] ;?></h3>
                            <p><?php echo $row['mcat'] ;?></p>
                            </div></a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <?php require_once 'footer.inc.php'; ?>
    </div>
</body>
</html>