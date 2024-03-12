<?php
     session_start();
     require 'connect.php';
     $get = "SELECT * FROM signupdetails WHERE email='".$_SESSION['user']."'";
     $save=$con->query($get);
     $details=$save->fetch_array();

     if(isset($_POST['submit1']))
     {
          $save1 = pathinfo($_FILES['profilePhoto']['name']);
          $imageName1 = $details[3]."Profile.".$save1['extension'];
          $imagePath1="userImages\\".$imageName1;
          move_uploaded_file($_FILES['profilePhoto']['tmp_name'],$imagePath1);

          $set1 = "UPDATE signupdetails SET profilePhoto ='".$imageName1."' WHERE email = '".$details[3]."'";
          $con->query($set1);
     }

     if(isset($_POST['submit2']))
     {
          $save2 = pathinfo($_FILES['coverPhoto']['name']);
          $imageName2 = $details[3]."Cover.".$save2['extension'];
          $imagePath2="userImages\\".$imageName2;
          move_uploaded_file($_FILES['coverPhoto']['tmp_name'],$imagePath2);

          $set2 = "UPDATE signupdetails SET coverPhoto ='".$imageName2."' WHERE email = '".$details[3]."'";
          $con->query($set2); 
     }   

     if(isset($_POST['submit3']))
     {
          $details[9]=$details[9]+1;
          $save2 = pathinfo($_FILES['image']['name']);
          $imageName2 = $details[5]."Post".$details[9].".".$save2['extension'];
          $imagePath2="userImages\\".$imageName2;
          move_uploaded_file($_FILES['image']['tmp_name'],$imagePath2);
          $set2 = "UPDATE signupdetails SET noOfPost='".$details[9]."' WHERE email = '".$details[3]."'";
          $con->query($set2); 

          $insertPost = "INSERT INTO postDetails(email,imageName,imageDescription,userName,profile) VALUES('".$details[3]."','".$imageName2."','".$_POST['description']."','".$details[5]."','".$details[7]."')";
          $con->query($insertPost);
     }   
     
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <title>About</title>
     <link rel="stylesheet" href="userProfile.css">
</head>

<body>
     <div class="body">
               <div>
                    <div class="header">
                         <a href="homePage.php">
                              <h1><span class="firstWord">Habi </span><span class="lastWord">Bee</span></h1>
                         </a>
                         <nav>
                         <ul>
                                   <li><a href="homePage.php">Home</a></li>
                                   <li><a href="feedTime.php">Feed Time</a></li>
                                   <?php 
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
               <div class="Innerbody">
                    <?php
                         echo '<div class="coverPhoto">
                         <img src="userImages/'.$details[8].'" alt="">
          
                         <div class="profilePhoto">
                              <img src="userImages/'.$details[7].'" alt="">
                         </div>
                    </div>
                    
                    <div class="restPage">
                         <div class="name">'.$details[0].' '.$details[1].'</div>
                         <div class="details">
                              <ul>
                                   <li>'.$details[5].'</li>
                                   <li>'.$details[3].'</li>
                                   <li>'.$details[2].'</li>
                                   <li>(+94) '.$details[4].'</li>
                              </ul>
                         </div>';
                    ?>

                         <div class="upload">
                         <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="postPhotoForm" enctype="multipart/form-data">
                                   <div class="postPhoto">
                                        <label for="file-input1">
                                             <img src="images/profileLogo.jpg" alt="">
                                        </label>
                                        <input type="file" name="profilePhoto" class="image" id="file-input1">
                                   </div>
                                   <input type="submit" class="submit" value="Profile-DP" name="submit1">
                              </form>

                              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="postPhotoForm" enctype="multipart/form-data">
                                   <div class="postPhoto">
                                        <label for="file-input2">
                                             <img src="images/cover.jpg" alt="">
                                        </label>
                                        <input type="file" name="coverPhoto" class="image" id="file-input2">
                                   </div>
                                   <input type="submit" class="submit" value="Cover-IN" name="submit2">
                              </form>

                              <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="postPhotoForm" enctype="multipart/form-data">
                                   <div class="postPhoto">
                                        <label for="file-input3">
                                             <img src="images/upload.jpeg" alt="">
                                        </label>
                                        <input type="file" name="image" class="image" id="file-input3" onclick="description();">
                                   </div>
                                   <div id="description"></div>
                                   <input type="submit" class="submit" value="Post-ON" name="submit3" onclick="description();">
                                   
                              </form>
                         </div>

                         
                         <div class="allPost">
                              
                         <?php
                              require 'connect.php';
                             $get4 = "SELECT * FROM postdetails WHERE email = '".$details[3]."'";
                             $save4 =$con->query($get4);
                             
                             while($details4 =$save4->fetch_array())
                             {
                              echo '<div class="singlePost">
                             <div class="head">
                                  <div class="dp">
                                       <img src="userImages/'.$details[7].'" alt="">
                                  </div>
                                  <div class="description2">
                                  '.$details4[2].' 
                                  </div>
                                  <div class="delete">
                                      <button><a href="deletePost.php?id='.$details4[1].'">DELETE</a></button>
                                  </div>
                             </div>
                             <div class="photo">
                                  <img src="userImages/'.$details4[1].'" alt="">
                             </div>
                              </div>';
                             }
                         ?>
                               
                         </div>


                    </div>
                    
                    
          
               </div>
                    
     </div>
</body>

</html>

<script>

     function description()
     {
     
     if(document.getElementById('description').innerHTML=='<input type="text" class="description" placeholder="Write something about our service" name="description">')
     {
          document.getElementById('description').innerHTML='';
     }
     else
     {
          document.getElementById('description').innerHTML='<input type="text" class="description" placeholder="Write something about our service" name="description">';
     }
     }
</script>