<?php
    session_start();
    require_once 'dbconnect.inc.php';
    $smid=NULL;
    $schid=NULL;
    $stime=NULL;
    $savseat=NULL;
    if(isset($_GET['mid'])){
        $smid=$_GET['mid'];
    }
    if(isset($_GET['chid'])){
        $schid=$_GET['chid'];
    }
    if(isset($_GET['time'])){
        $stime=$_GET['time'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/index-style.css">
    <link rel="stylesheet" href="CSS/booking-style.css">
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
    <title>Document</title>
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
        <?php
            require_once 'header.inc.php';
            require_once 'menu.inc.php';
        ?>
        <div class="bcontainer">
            <div class="cinemahalls">
                <div class="heading">
                    <?php $sql="SELECT mname from movies WHERE mid='$smid';";
                        $rs=mysqli_query($con,$sql);
                        $row=mysqli_fetch_array($rs);
                    ?>
                    <h2>Available Cinema Halls for <?php echo $row['mname']; ?></h2>
                </div>
                <div class="list">
                        <?php
                            $sql="SELECT DISTINCT shows.chid,chname FROM cinemahall INNER JOIN shows ON cinemahall.chid=shows.chid WHERE mid='$smid';";
                            $rs=mysqli_query($con,$sql);
                            while($row=mysqli_fetch_array($rs)){
                        ?>
                            <a href="booking.php?chid=<?= $row['chid'] ?>&mid=<?= $smid?>" style="color:#072227;"><h5><?php echo $row['chname']; ?></h5></a>
                        <?php } ?>
                </div>
            </div>
            <div class="time">
                <?php
                    if(isset($_GET['chid']) && isset($_GET['mid'])){
                    $sql="SELECT time FROM shows WHERE chid='$schid' AND mid='$smid';";
                    $rs=mysqli_query($con,$sql); ?>
                    <div class="heading">
                        <h2>Choose a time</h2>
                    </div>
                    <?php
                    while($row=mysqli_fetch_array($rs)){
                ?>
                    <a href="booking.php?chid=<?= $schid ?>&mid=<?= $smid?>&time=<?= $row['time'] ?>" style="color:#072227;"><h5><?php echo $row['time']; ?></h5></a>
                    <?php }
                    }
                    ?>
            </div>
            <div class="seats">
                <?php
                    if(isset($_GET['chid']) && isset($_GET['mid']) && isset($_GET['time'])){
                    $sql="SELECT shid,avseat,ticketprice FROM shows WHERE chid='$schid' AND mid='$smid' AND time='$stime';";
                    $rs=mysqli_query($con,$sql);
                    $row=mysqli_fetch_array($rs); ?>
                    <div class="heading">
                        <h2>Available Seats</h2>
                    </div>
                <?php
                    $savseat=$row['avseat'];
                    $sshid=$row['shid'];
                ?>
                    <a href="booking.php?chid=<?= $schid ?>&mid=<?= $smid?>&time=<?= $stime ?>" style="color:#072227;"><h5><?php echo $row['avseat']; ?></h5></a>
                    <h5>Rs. <?php echo $row['ticketprice']; ?></h5>
                    <?php
                    }
                    if(isset($_GET['mid']) && isset($_GET['chid'])){
                        if(isset($_GET['time']) && isset($sshid) && isset($savseat)){
                    ?>
                    <form action="booking.inc.php?shid=<?= $sshid ?>&chid=<?= $schid ?>&mid=<?= $smid?>&time=<?= $stime ?>&avseat=<?= $savseat ?>" method="POST">
                        <label for="selseat">Select no. of tickets</label><input type="number" name="seatsno" value="1" id="selseat">
                        <button type="submit">Confirm Booking</button>
                    </form>
                    <?php }
                    }                    
                    ?>
            </div>
        </div>
    </div>
</body>
</html>