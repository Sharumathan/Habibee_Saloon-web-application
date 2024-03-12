
<!DOCTYPE html>
<html lang="en">
<head>
     <title>About</title>
     <link rel="stylesheet" href="hairstyles.css">
</head>
<body>   
     <div class="body">
          <div class="overLay">
               <div>
                    <div class="header">
                         <a href="homePage.php"><h1><span class="firstWord">Habi </span><span class="lastWord">Bee</span></h1></a>
                         <nav>
                              <ul>
                              <li><a href="homePage.php">Home</a></li>
                                   <li><a href="hairstyles.html">Hair Treatment</a></li>
                                   <?php session_start();
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
                    <div class="photosContainer">
                         <div class="stylesHeading">
                              <h1>Find Your Style</h1>
                         </div>
                         <div>
                              <div class="hairstyleContainer">
                              <?php
                                   require'connect.php';
                                   $read="select * from hairstyles";
                                   $save=$con->query($read);
                                   $details=$save->fetch_assoc();
                                   
                                   if(isset($details['image']))
                                   {
                                        do{
                                             echo'<div class="singleContainer">
                                             <div class="image">
                                                  <img src="../Admin/images/'.$details['image'].'" alt="">
                                             </div>
                                             <div class="new">
                                             <img src ="images/new.PNG">
                                             </div>
                                             <div class="details">
                                                  <h2>'.$details['styleName'].'</h2>
                                                  <div class="price">
                                                       $'.$details['price'].'.00
                                                  </div>
                                                  
                                                  <div class="buttonCombo">
                                                      <a  href="bookingPage.php?bookId='.$details['styleName'].'&tableName=hairstyles"> <button class="book">BOOK NOW</button></a>
                                                       <button class="cart">CART</button>
                                                  </div>
                                                  <div class="para">
                                                       <p>'.$details['description'].'</p>
                                                       <p>Hair Stylist : '.$details['stylistName'].'</p>
                                                       <p>Age Limit :'.$details['ageLimit'].'</p>
                                                       <p>Over All '.$details['totalBooked'].' People Booked</p>
                                                  </div>
                                             </div>
                                        </div>';
                                        }while($details=$save->fetch_assoc());
                                   }
                              
                              $con->close();
                              ?>
                              </div>
                         </div>
                    </div>
               </div>
</body>
</html>