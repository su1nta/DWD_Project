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
    <link rel="stylesheet" href="CSS/movies-style.css">
    <link rel="stylesheet" href="CSS/footer-style.css">
    <link rel="icon" href="Images/favicon.ico">
    <script>
        var filterpage=document.getElementById("filterpage");
        var content3=document.getElementById("fbuttons");
        function invokeFilterCat(){
            var content=document.getElementById("cbuttons");
            var content2=document.getElementById("lbuttons");
            var content3=document.getElementById("fbuttons");
            if(content.style.display=="none"){
                content2.style.display="none";
                content3.style.display="none";
                content.style.display="flex";
            }else{

                content.style.display="none";
            }
        }
        function invokeFilterLang(){
            var content=document.getElementById("lbuttons");
            var content2=document.getElementById("cbuttons");
            var content3=document.getElementById("fbuttons");
            if(content.style.display=="none"){
                content2.style.display="none";
                content3.style.display="none";
                content.style.display="flex";
            }else{
                content.style.display="none";
            }
        }
        function invokeFilterForm(){
            var content=document.getElementById("fbuttons");
            var content2=document.getElementById("cbuttons");
            var content3=document.getElementById("lbuttons");
            if(content.style.display=="none"){
                content2.style.display="none";
                content3.style.display="none";
                content.style.display="flex";
            }else{

                content.style.display="none";
            }
        }
        function invokeClearFilter(){
            <?php

            ?>
        }
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
                if(isset($_GET['offer'])){
                    if($_GET['offer']=="none"){?>
                        <div class="toast" id="toast">
                        <?php echo "Sorry! No Offers Available."; ?>
                    </div>
                 <?php   }
                }
                ?>
    <title>Movies</title>
</head>
<body>
    <div class="wrapper">
      <?php 
        require_once 'header.inc.php';
      ?>  
       <div class="menu">
            <ul>
               <a href="movies.php"><li>Movies</li></a>
               <a href="index.php?offer=none"><li>Offers</li></a>
               <li onclick="invokeImax()" id="imaxbtn" title="double-click it">IMAX Movies</li>
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
                $sql="SELECT chname FROM cinemahall;";
                $rs=mysqli_query($con,$sql);
                while($row=mysqli_fetch_array($rs)){
            ?>
                <h4><?php echo $row['chname']; ?></h4>
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


        <?php 
            if(isset($_GET['col']) && isset($_GET['filter'])){
            $colname=$_GET['col'];
            $filtername=$_GET['filter'];?>
            <script>
                var default=document.getElementById('default');
                default.style.display="none";
            </script>
            <?php }else{ ?>
            <?php 
                $colname=NULL;
                $filtername=NULL;
            } 
        ?>
       <div class="mobilemenu" id="mobilemenu">
        <ul>
               <a href="movies.php"><li>Movies</li></a>
               <a href="index.php?offer=none"><li>Offers</li></a>
               <li onclick="invokeImax()" id="imaxbtn">IMAX Movies</li>
               <li onclick="invokeCinemas()" id="cinemasbtn" title="double-click it">Cinemas</li>
            </ul>
        </div>

        <div class="filters">
            <div class="innerfilter">
                <div class="heading">
                    <h2>Filters</h2>
                </div>
                <div class="content">
                    <div class="filter" id="filter" onclick="invokeFilterCat()">Categories</div>
                    <div class="filter" id="filter" onclick="invokeFilterLang()">Languages</div>
                    <div class="filter" id="filter" onclick="invokeFilterForm()">Formats</div>
                    <a href="movies.php">
                        <div class="filter" id="filter" style="color:#40D3DC;background:#072227; border-radius:5px;" onclick="invokeClearFilter()">Clear All Filters</div>
                    </a>
                </div>
            </div>
            <div class="filterpage" id="filterpage">
                <?php
                    $sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'moviecategory' LIMIT 16 OFFSET 2;";
                    $rs=mysqli_query($con, $sql); 
                ?>
                <div class="categories" id="categories">
                    <div class="buttons" id="cbuttons">
                    <?php while($row=mysqli_fetch_array($rs)){ 
                        $col=$row['COLUMN_NAME'];
                        ?>
                        <a href="movies.php?col=<?php echo $col; ?>&filter=categories">
                        <div class="button"><?php echo $row['COLUMN_NAME']; ?></div>
                        </a>
                    <?php } ?>
                    </div>
                </div>
                <?php
                    $sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'movielang' LIMIT 16 OFFSET 2;";
                    $rs=mysqli_query($con, $sql); 
                ?>
                <div class="languages" id="languages">
                    <div class="buttons" id="lbuttons">
                    <?php while($row=mysqli_fetch_array($rs)){
                        $col=$row['COLUMN_NAME'];
                        ?>
                        <a href="movies.php?col=<?php echo $col; ?>&filter=languages">
                        <div class="button"><?php echo $row['COLUMN_NAME']; ?></div>
                        </a>
                    <?php } ?>
                    </div>
                </div>
                <?php
                    $sql="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'moviedefinition' LIMIT 16 OFFSET 2;";
                    $rs=mysqli_query($con, $sql); 
                ?>
                <div class="formats" id="formats">
                    <div class="buttons" id="fbuttons">
                    <?php while($row=mysqli_fetch_array($rs)){
                        $col=$row['COLUMN_NAME'];
                        ?>
                        <a href="movies.php?col=<?php echo $col; ?>&filter=formats">
                        <div class="button"><?php echo $row['COLUMN_NAME']; ?></div>
                        </a>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="filterheading">
            <h2>
                <?php 
                    if($colname==NULL && $filtername==NULL){ ?>
                        Available for Booking
                <?php }else{
                    echo $colname." Movies";
                 } ?>
            </h2>
        </div>
    
        <div class="contents">
            <?php 
                if($colname==NULL && $filtername==NULL){
                    $sql="SELECT mid,mname,mimage,mcat FROM movies;";
                    $rs=mysqli_query($con, $sql);
            ?>
            <?php
                        while($row=mysqli_fetch_array($rs)){
                            $mid=$row['mid'];
                    ?>
                <div class="default" id="default">
                    <a href="moviepage.php?mid=<?= $mid ?>"><div class="m">
                    <img class="movie-images" src="<?=$row['mimage']?>" alt="image">
                    <h3><?php echo $row['mname'] ;?></h3>
                    <p><?php echo $row['mcat'] ;?></p>
                    </div></a>
                </div>
            <?php }
                }
            ?>

            <?php 
                if($filtername=="categories"){
                $sql="SELECT movies.mid,mname,mimage,mcat FROM movies INNER JOIN moviecategory ON movies.mid=moviecategory.mid WHERE $colname='1';";
                $rs=mysqli_query($con, $sql);
                }else if($filtername=="languages"){
                    $sql="SELECT movies.mid,mname,mimage,mcat FROM movies INNER JOIN movielang ON movies.mid=movielang.mid WHERE $colname='1';";
                    $rs=mysqli_query($con, $sql);
                }else if($filtername=="formats"){
                    $sql="SELECT movies.mid,mname,mimage,mcat FROM movies INNER JOIN moviedefinition ON movies.mid=moviedefinition.mid WHERE $colname='1';";
                    $rs=mysqli_query($con, $sql);
                }
            ?>
            <?php
                        while($row=mysqli_fetch_array($rs)){
                            $mid=$row['mid'];
                    ?>
                <div class="default" id="custfilter">
                    <a href="moviepage.php?mid=<?= $mid ?>"><div class="m">
                    <img class="movie-images" src="<?=$row['mimage']?>" alt="image">
                    <h3><?php echo $row['mname'] ;?></h3>
                    <p><?php echo $row['mcat'] ;?></p>
                    </div></a>
                </div>
            <?php } ?>

        </div>
    </div>
    <?php
        require_once 'footer.inc.php';
    ?>
</body>
</html>