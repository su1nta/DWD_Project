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