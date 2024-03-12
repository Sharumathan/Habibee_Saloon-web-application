
<!DOCTYPE html>
<html lang="en">
<head>
     <title>Home</title>
     <link rel="stylesheet" href="homePage.css">
</head>
<body onload="slider1()">   
     <div class="body">
          <div class="banner">
               <div class="slider">
                    <img src="images/background.jpg" id="slideImg">
               </div>
          </div>
          <div class="overLay">
               <div>
                    <div class="header">
                         <h1><span class="firstWord">Habi </span><span class="lastWord">Bee</span></h1>
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
               </div>
               <div class="userInfo" id="userInfo">
               <?php
                         
                         
                         if(isset($_SESSION['user']))
                         {    require 'connect.php';
                              $get = "select * from signupDetails where email='".$_SESSION['user']."'";
                              $save = $con->query($get);
                              $details = $save->fetch_assoc();
                              echo "Welcome  <span id='name' >".$details['firstName']." </span>&hearts; ,";
                         }     
                    ?>
               </div>
               <div class="content">
                    <h1>JUST THE <span class="look">LOOK</span> </h1>
                         <h3>Just changing your hair style will change your whole look.<br>
                              Looking good is the best revenge ever. Give a try with HabiBee &#9829;</h3>
               </div>
               <div class="buttons">
                    <a href="bookAnAppoinment.php"><button id="bookButton">BOOK AN APPOINMENT</button></a>
               </div>
          </div>
     </div>

     <script>
                    var slideImg = document.getElementById("slideImg");
          var images1 = new Array(
               "images/img1.jpg",
               "images/img2.jpg",
               "images/img3.jpg",
               "images/img4.jpg",
               "images/img5.jpg"
          );

          var len=images1.length;
          var i=0;
          function slider1(){
               if(i>len-1){
                    i=0
               }
               slideImg.src=images1[i];
               i++;
               setTimeout('slider1()',10000);
          }
     </script>
</body>
</html>