<?php
    session_start();
    require_once 'dbconnect.inc.php';
    if(isset($_GET['chid'])){
        $chid=$_GET['chid'];
    }
            
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/index-style.css">
    <link rel="stylesheet" href="CSS/cinemahallpage-style.css">
    <link rel="stylesheet" href="CSS/footer-style.css">
    <link rel="icon" href="Images/favicon.ico">
    <title>
        <?php
            $sql="SELECT chname from cinemahall WHERE chid=$chid;";
            $rs=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($rs);
            echo "In ".$row['chname'];
        ?>
    </title>
    <script src="https://kit.fontawesome.com/83e1fe1d81.js" crossorigin="anonymous"></script>
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
        function invokeFastbook(){
            var fastbook=document.getElementById('fastbook');
            var fastbookbtn=document.getElementById('fastbookbtn');

            var imax=document.getElementById('imax');
            var imaxbtn=document.getElementById('imaxbtn');

            var cinemas=document.getElementById('cinemas');
            var cinemasbtn=document.getElementById('cinemasbtn');
            if (fastbook.style.display == "none") {
                fastbook.style.display = "flex";
                fastbookbtn.style.background="#40D3DC";

                imax.style.display = "none";
                imaxbtn.style.background="none";

                cinemas.style.display = "none";
                cinemasbtn.style.background="none";
            } else {
                fastbook.style.display = "none";
                fastbookbtn.style.background="none";
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
    <?php   }  ?>
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
                                <li><p>Bookings</p></li>
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
               <a href="offers.php"><li>Offers</li></a>
               <li onclick="invokeImax()" id="imaxbtn" title="double-click it">IMAX Movies</li>
               <li onclick="invokeCinemas()" id="cinemasbtn" title="double-click it">Cinemas</li>
               <li onclick="invokeFastbook()" id="fastbookbtn" title="double-click it"><strong>Fast Book</strong></li>
            </ul>
        </div>

        <div class="mobilemenu" id="mobilemenu">
        <ul>
               <a href="movies.php"><li>Movies</li></a>
               <a href="offers.php"><li>Offers</li></a>
               <li onclick="invokeImax()" id="imaxbtn">IMAX Movies</li>
               <li onclick="invokeCinemas()" id="cinemasbtn" title="double-click it">Cinemas</li>
               <li onclick="invokeFastbook()" id="fastbookbtn" title="double-click it"><strong>Fast Book</strong></li>
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
                $sql="SELECT chname FROM cinemahall;";
                $rs=mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($rs)){
            ?>
                <h4><?php echo $row['chname']; ?></h4>
            <?php } ?>
        </div>
        <div class="fastbook" id="fastbook">
            
        </div>
            <div class="chcontainer">
                <div class="about">
                    <?php
                        $sql="SELECT chname,chadd FROM cinemahall WHERE chid='$chid';";
                        $rs=mysqli_query($con,$sql);
                        while($row=mysqli_fetch_array($rs)){
                    ?>
                        <h1><?php echo $row['chname']; ?></h1>
                        <h4><?php echo $row['chadd']; ?></h4>
                    <?php } ?>
                </div>
                <div class="movielist">
                    <div class="list">
                    <?php
                        $sql="SELECT DISTINCT movies.mid FROM movies INNER JOIN shows ON movies.mid=shows.mid WHERE chid='$chid';";
                        $rs=mysqli_query($con, $sql);
                        while($row=mysqli_fetch_array($rs)){
                            $mid=$row['mid'];
                            $sql2="SELECT mid,mimage, mname, mcat FROM movies WHERE mid='$mid';";
                            $rs2=mysqli_query($con,$sql2);
                                while($row2=mysqli_fetch_array($rs2)){
                                    $mid2=$row2['mid'];
                            ?>
                                <a href="moviepage.php?mid=<?= $mid2 ?>"><div class="m">
                                <img class="movie-images" src="<?=$row2['mimage']?>" alt="image">
                                <h3><?php echo $row2['mname'] ;?></h3>
                                <p><?php echo $row2['mcat'] ;?></p>
                                </div></a>
                        <?php } 
                        }
                        ?>
                    </div>
                </div>
            </div>
    </div>
    <?php
        require_once 'footer.inc.php';
    ?>
</body>
</html>