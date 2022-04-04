<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/index-style.css">
    <link rel="stylesheet" href="CSS/moviepage-style.css">
    <link rel="stylesheet" href="CSS/footer-style.css">
    <link rel="icon" href="Images/favicon.ico">
    <title>
    <?php
    require_once 'dbconnect.inc.php';
    $mid=$_GET["mid"];
    $sql="SELECT mname FROM movies WHERE mid=$mid;"; 
                    $rs=mysqli_query($con, $sql);
                    while($row=mysqli_fetch_array($rs)){
                        echo $row['mname'];
                    }
    ?>
    </title>
    <script src="https://kit.fontawesome.com/83e1fe1d81.js" crossorigin="anonymous"></script>
    <script src="JS/essentials.js"></script>
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
        
        <div class="containers">
            <div class="top">
                <div class="mimage">
                         <?php 
                            $mid=$_GET["mid"];
                            $sql="SELECT mimage FROM movies WHERE mid=$mid;";
                            $rs=mysqli_query($con, $sql);
                            
                            while($row=mysqli_fetch_array($rs)){
                         ?>
                            <img src="<?= $row['mimage'] ?>" alt="image">
                        <?php } ?>    
                </div>
                <div class="description">
                    <h1 class="mname">
                    <?php 
                    $sql="SELECT mname FROM movies WHERE mid=$mid;"; 
                    $rs=mysqli_query($con, $sql);
                    while($row=mysqli_fetch_array($rs)){
                        echo $row['mname'];
                    }
                    ?>
                    </h1>
                    <div class="mdef">
                    <?php 
                    $sql="SELECT mdef FROM movies WHERE mid=$mid;"; 
                    $rs=mysqli_query($con, $sql);
                    while($row=mysqli_fetch_array($rs)){
                        echo $row['mdef'];
                    }
                    ?>
                    </div>
                    <div class="mlang">
                    <?php 
                    $sql="SELECT mlang FROM movies WHERE mid=$mid;"; 
                    $rs=mysqli_query($con, $sql);
                    while($row=mysqli_fetch_array($rs)){
                        echo $row['mlang'];
                    }
                    ?>
                    </div>
                    <div class="otherdesc">
                        <div class="desctop">
                            <div class="mdur"><p>
                                <?php 
                                    $sql="SELECT mdur FROM movies WHERE mid=$mid;"; 
                                    $rs=mysqli_query($con, $sql);
                                    while($row=mysqli_fetch_array($rs)){
                                        echo $row['mdur'];
                                    }
                                ?>
                            </p></div>
                            <div class="mrel_dt"><p>
                                <?php 
                                    $sql="SELECT mrel_dt FROM movies WHERE mid=$mid;"; 
                                    $rs=mysqli_query($con, $sql);
                                    while($row=mysqli_fetch_array($rs)){
                                        echo $row['mrel_dt'];
                                    }
                                ?>
                            </p></div>
                        </div>
                        <div class="descbottom">
                            <div class="mrat"><p>
                                <?php 
                                    $sql="SELECT mrat FROM movies WHERE mid=$mid;"; 
                                    $rs=mysqli_query($con, $sql);
                                    while($row=mysqli_fetch_array($rs)){
                                        echo $row['mrat'];
                                    }
                                ?>
                            </p></div>
                            
                            <div class="mcat"><p>
                                <?php 
                                    $sql="SELECT mcat FROM movies WHERE mid=$mid;"; 
                                    $rs=mysqli_query($con, $sql);
                                    while($row=mysqli_fetch_array($rs)){
                                        echo $row['mcat'];
                                    }
                                ?>
                            </p></div>
                        </div>
                    </div>
                    <?php if(isset($_SESSION['uname'])){ ?>
                    <a href="booking.php?mid=<?= $mid ?>"><div class="bookbutton"><p>Book Now</p></div></a>
                    <?php }else{ ?>
                        <a href="login.php"><div class="bookbutton"><p>Book Now</p></div></a>
                    <?php } ?>
                </div>
            </div>
            <div class="bottom">
                <div class="mabout">
                    <h2>About <?php  $sql="SELECT mname FROM movies WHERE mid=$mid;"; 
                    $rs=mysqli_query($con, $sql);
                    while($row=mysqli_fetch_array($rs)){
                        echo $row['mname'];
                    }?></h2>
                                <?php 
                                    $sql="SELECT mabout FROM movies WHERE mid=$mid;"; 
                                    $rs=mysqli_query($con, $sql);
                                    while($row=mysqli_fetch_array($rs)){
                                        echo $row['mabout'];
                                    }
                                ?>
                </div>
                <br>
            </div>
        </div>
        <?php require_once 'footer.inc.php'; ?>
    </div>
</body>
</html>