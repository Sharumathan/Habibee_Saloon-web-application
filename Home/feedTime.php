<!DOCTYPE html>
<html lang="en">
<head>
     <title>About</title>
     <link rel="stylesheet" href="feedTime.css">
</head>
<body>   
     <div class="body">
                    <div class="header">
                         <a href="homePage.html"><h1><span class="firstWord">Habi </span><span class="lastWord">Bee</span></h1></a>
                         <nav>
                         <ul>
                                   <li><a href="homePage.php">Home</a></li>
                                   <li><a href="feedTime.php">Feed Time</a></li>
                                   <?php session_start();
                                        if(!isset($_SESSION['user']))
                                        {    
                                             echo '<li><a href="accountPage.php">Account</a></li>';
                                        } 
                                   ?> 
                                   <?php 
                                        if(isset($_SESSION['user']))
                                        {    
                                             echo '<li><a href="userProfile.php">Profile</a></li>';
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
                    <div class="page">
                         <div class="title">
                              <span> Rock Your LooK - WE </span>
                              <a href="accountPage.php"><button>POST NOW</button></a>
                         </div>
                         <div class="allPost">
                              <?php 
                              require 'connect.php';
                              $get = "SELECT * FROM postdetails";
                              $save=$con->query($get);
                              
                                   while($details = $save->fetch_array())
                                   {
                                        echo '<div class="singlePost">
                                        <div class="head">
                                             <div class="dp">
                                                  <img src="userImages/'.$details[4].'" alt="">
                                             </div>
                                             <div class="userName">
                                             '.$details[3].'
                                             </div>
                                        </div>
                                        <div class="image">
                                             <img src="userImages/'.$details[1].'" alt="">
                                        </div>
                                        </div>';
                                   }
                              ?>
                              
                         </div>
                         
                    </div>
     </div>

</body>
</html>