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
    <link rel="stylesheet" href="CSS/edit-profile-style.css">
    <link rel="stylesheet" href="CSS/footer-style.css">
    <link rel="icon" href="Images/favicon.ico">
    <title>
    <?php
         echo $_SESSION["uname"];
        ?>-profile
    </title>
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
        <?php
            require_once 'header.inc.php';
            if(isset($_GET["update"])){
                if($_GET["update"]=="success"){ ?>
                <div class="toast" id="toast">
                    <?php echo "Data Updated Successfully"; ?>
                    <span onclick="timer()" style="font-weight:600;cursor:pointer;color:#40D3DC;">&nbsp;&nbsp;&nbsp;&nbsp;X</span>
                </div>
        <?php } 
            }
        ?>
        <script> 
            function timer(){
                var element= document.getElementById('toast');
                element.remove();
            }
            setTimeout(timer, 3000);
        </script>
        <div class="content">
            <div class="left">
                    <?php
                        $usname=$_SESSION["uname"];
                        $sql="SELECT fullname,email,uname,upropic FROM userdetails WHERE uname='$usname';";
                        $rs=mysqli_query($con, $sql);
                        while($row=mysqli_fetch_array($rs)){
                    ?>
                <div class="upload">
                        <form action="edit-profile.inc.php" method="POST">
                             
                </div>
                <div class="fullname">
                     
                        <h1><?php echo $row['fullname']; ?></h1>
                </div>
                <div class="uname">
                        <h4>@<?php echo $row['uname']; ?></h4>
                </div>
                <div class="email">
                        <h4><?php echo $row['email']; ?></h4>
                </div>
                <?php } ?>

            </div>
            <?php 
                $sql= "SELECT * FROM userdetails WHERE uname='$usname';";
                $rs=mysqli_query($con, $sql);
            ?>
            <div class="right">
                <div class="personal">
                    <div class="heading">
                        <h1>Personal Details</h1>
                    </div>
                    <div class="container">
                        <?php while($row=mysqli_fetch_array($rs)){ ?>
                            <div class="line"><label for="name">Full Name</label><input type="text" name="fullname" class="name" placeholder="<?php echo $row['fullname']; ?>"></div>
                            <div class="line"><label for="mobno">Mobile No.</label><input type="text" name="mobno" class="mobno" placeholder="<?php echo $row['mobno']; ?>"></div>
                            <div class="line"><label for="dob">Date of Birth</label><input type="date" name="dob" class="dob" placeholder="<?php echo $row['dob']; ?>"></div>
                            <div class="line"><label for="gender">Gender</label><input type="text" name="gender" class="gender" placeholder="<?php echo $row['gender']; ?>"></div>
                        
                    </div>
                </div>
                <div class="address">
                    <div class="heading">
                        <h1>Address (Optional)</h1>
                    </div>
                    <div class="container">
                        
                            <div class="line"><label for="pincode">Pincode</label><input type="text" class="pincode" name="pincode" placeholder="<?php echo $row['pincode']; ?>"></div>
                            <div class="line"><label for="addr">Address</label><input type="text" class="addr" name="addr" placeholder="<?php echo $row['addr']; ?>"></div>
                            <div class="line"><label for="landmark">Landmark</label><input type="text" class="landmark" name="landmark" placeholder="<?php echo $row['landmark']; ?>"></div>
                            <div class="line"><label for="city">City</label><input type="text" class="city" name="city" placeholder="<?php echo $row['city']; ?>"></div>
                            <div class="line"><label for="state">State</label><input type="text" class="state" name="state" placeholder="<?php echo $row['state']; ?>"></div>
                       <?php } ?>
                    </div>
                </div>
                <button type="submit">Apply Changes</button></form>
            </div>
        </div>
        <?php require_once 'footer.inc.php'; ?>
    </div>
</body>
</html>