<?php
     session_start();
     if(!isset($_SESSION['user']))
     {
          header("location:accountPage.php"); 
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <title>Home</title>
     <link rel="stylesheet" href="bookAnAppoinment.css">
</head>
<body>   
     <div class="body">
          <div class="header">
               <h1><span class="firstWord">Habi </span><span class="lastWord">Bee</span></h1>
                    <nav>
                         <ul>
                         <li><a href="homePage.php">Home</a></li>
                                   <li><a href="hairstyles.html">Hair Treatment</a></li>
                                   <?php 
                                        if(!isset($_SESSION['user']))
                                        {    
                                             echo '<li><a href="accountPage.php">Account</a></li>';
                                        } 
                                   ?> 
                                   <?php 
                                        if(isset($_SESSION['user']))
                                        {    
                                             echo '<li><a href="accountPage.php">Profile</a></li>';
                                        } 
                                   ?> 
                                   <li><a href="about.php">About</a></li>
                                   <?php 
                                        if(isset($_SESSION['user']))
                                        {    
                                             echo '<li id="logout"><a href="logout.php">Log Out</a></li>';
                                        } 
                                   ?> 
                         </ul>
                    </nav>
          </div>
               
          <div class="types">
               <div>
                    <div class="title">
                         <h2>Categories</h2>
                         <hr class="underLine">
                    </div>
                    <div class="col">
                         <a href="hairstyle.php"><img src="images/hairstyle.png"></a>
                         <a href="hairColour.php"><img src="images/hair color.png"></a>
                         <a href="hairCut.php"><img src="images/haircut.png"></a>
                         
                    </div>
               </div>
               <div>
                    <div class="title">
                         <h2>Hair Stylists</h2>
                         <hr class="underLine">
                    </div>
                    <div class="grid">
                        <div class="hairstylist">
                              <div>
                                   <img src="images/hairstylist1.jpg" alt="">
                              </div>
                              <div>
                                   <p>
                                        Name : Kalanet<br>
                                        Age : 26<br>
                                        Country : America<br>
                                        Special In : haircut<br>
                                   </p>
                                   <a href=""><button>BOOK NOW</button></a>
                              </div>
                         </div>

                         <div class="hairstylist">
                              <div>
                                   <img src="images/hairstylist2.jpg" alt="">
                              </div>
                              <div>
                                   <p>
                                        Name : Kalanet<br>
                                        Age : 26<br>
                                        Country : America<br>
                                        Special In : haircut<br>
                                   </p>
                                   <a href=""><button>BOOK NOW</button></a>
                              </div>
                         </div>

                         <div class="hairstylist">
                              <div>
                                   <img src="images/hairstylist3.jpg" alt="">
                              </div>
                              <div>
                                   <p>
                                        Name : Kalanet<br>
                                        Age : 26<br>
                                        Country : America<br>
                                        Special In : haircut<br>
                                   </p>
                                   <a href=""><button>BOOK NOW</button></a>
                              </div>
                         </div>

                         <div class="hairstylist">
                              <div>
                                   <img src="images/hairstylist4.jpg" alt="">
                              </div>
                              <div>
                                   <p>
                                        Name : Kalanet<br>
                                        Age : 26<br>
                                        Country : America<br>
                                        Special In : haircut<br>
                                   </p>
                                   <a href=""><button>BOOK NOW</button></a>
                              </div>
                         </div>

                         
                    </div>
               </div>
          </div>

</body>
</html>