<div class="menu">
            <ul>
               <a href="movies.php"><li>Movies</li></a>
               <a href="index.php?offer=none"><li>Offers</li></a>
               <li onclick="invokeImax()" id="imaxbtn" title="double-click it">IMAX Movies</li>
               <li onclick="invokeCinemas()" id="cinemasbtn" title="double-click it">Cinemas</li>
            </ul>
        </div>
        <div class="mobilemenu" id="mobilemenu">
        <ul>
               <a href="movies.php"><li>Movies</li></a>
               <a href="index.php?offer=none"><li>Offers</li></a>
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
                <h4><?php echo "Rs. ".$rowtic['ticketprice']; ?></h4>
                <h4><strong><?php echo $row['time']; ?></strong></h3>
            </div>
            <?php } ?>
        </div>