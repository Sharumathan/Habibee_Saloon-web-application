<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add Hair Colour</title>
    <link rel="stylesheet" href="adminHome.css" />
    <link rel="stylesheet" href="updateHairColour.css">
    <script src="adminHome.js"></script>
  </head>
  <body>
    
          <div class="body">
                    <div class="menu" id="menu">
                    <div class="logo">
                         <h1 id="fullName">
                         <span id="firstName">Habi</span><span id="lastName">Bee</span>
                         </h1>
                    </div>
                    <div class="menuContent">
                         <ul>
                         <li><a href="../Home/homePage.php">HOME</a></li>
                         <li><a href="../Home/hairstyle.html">HAIR STYLES</a></li>
                         <li><a href="../Home/hairCut.php">HAIR CUTS</a></li>
                         <li><a href="../Home/hairColour.php">HAIR COLORS</a></li>
                         <li><a href="../Home/hairTreatment.php">HAIRTREATMENT</a></li>
                         <li><a href="../Home/about.php">ABOUT</a></li>
                         </ul>
                    </div>
                    <div class="cl">
                         <span onclick="closee();" id="close">CLOSE</span>
                    </div>
                    </div>

                    <div class="page" id="page">
                    <div class="header">
                         <div>
                         <div class="viewPageDetails" id="pageDetails">
                         <span onclick="view();">Page Details</span>
                         </div>
                         </div>
                         <div class="logo" id="hideLogo">
                         <h1 id="fullName">
                         <span id="firstName">Habi</span><span id="lastName">Bee</span>
                         </h1>
                         </div>
                    </div>


                    <div class="full">
                         <?php 
                              require 'connect.php';
                             if(isset($_POST['selectId']))
                             {
                              $giveValue = "select * from haircolour where styleName='".$_POST['selectId']."'";
                              $savee= $con->query($giveValue);
                              $detailss=$savee->fetch_assoc();
                              
                              echo '<div class="firstHalf">
                              <hr>
                              <span>Update Hair Colour</span>
                              <img src="images/'.$detailss['image'].'" alt="" >
                              </div>';
                             }
                             else
                             {
                              echo '<div class="firstHalf">
                              <hr>
                              <span>Update Hair Colour</span>
                              <img src="images/hair color.png" alt="" >
                              </div>';
                             }
                             $con->close();
                         ?>
                              <div class="fullTable">
                                   <div class="selectItem">
                                        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                                        <?php

                                             require 'connect.php';
                                             $get = "select * from haircolour";
                                             $save = $con->query($get);

                                             echo "<select name='selectId' class='selectButten'>";
                                             while($details=$save->fetch_assoc())   
                                             {
                                                  echo "<option>".$details['styleName'] ."</option>";
                                             }       
                                             echo "</select>";   
                                             echo "<input type='submit' class='submitButten' value='READY TO CHANGE'>";      
                                                     
                                        ?>
                                        </form>
                                   </div>
                                   <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
                                             
                                             <?php 

                                             if(isset($_POST['selectId']))
                                             {
                                             $giveValue = "select * from haircolour where styleName='".$_POST['selectId']."'";
                                             $savee= $con->query($giveValue);
                                             $detailss=$savee->fetch_assoc();
                                        
                                             echo '<div class="singleLine">
                                                       <div class="left">
                                                            <span>Colour Name :</span>
                                                       </div>
                                                       <div class="right">
                                                            <input type="text" name="styleName" value="'.$detailss['styleName'].'">
                                                       </div>
                                                  </div>                                                  	                                                  	                                                  	                                                  	                                                  	                                        
                                   
                                                  <div class="singleLine">
                                                       <div class="left">
                                                            <span>Stylist Name :</span>
                                                       </div>
                                                       <div class="right">
                                                            <input type="text" id="title" name="stylistName" value="'.$detailss['stylistName'].'">
                                                       </div>
                                                  </div>
                                                  <div class="singleLine">
                                                       <div class="left">
                                                            <span>Age Limit :</span>
                                                       </div>
                                                       <div class="right">
                                                            <input type="text" name="ageLimit" value="'.$detailss['ageLimit'].'">
                                                       </div>
                                                  </div>
                                                  <div class="singleLine">
                                                       <div class="left">
                                                            <span>Amount :</span>
                                                       </div>
                                                       <div class="right">
                                                            <input type="text" name="amount" value="'.$detailss['price'].'">
                                                       </div>
                                                  </div>
                                                  <div class="singleLine">
                                                       <div class="left">
                                                            <span>Total Booked :</span>
                                                       </div>
                                                       <div class="right">
                                                            <input type="text" name="totalBooked" value="'.$detailss['totalBooked'].'">
                                                       </div>
                                                  </div>
                                                  <div class="singleLine">
                                                       <div class="left">
                                                            <span>Image path:</span>
                                                       </div>
                                                       <div class="right">
                                                            <input type="file" name="image" value="'.$detailss['image'].'">
                                                       </div>
                                                  </div>
                                                  <div class="singleLine">
                                                       <div class="left">
                                                            <span>Description :</span>
                                                       </div>
                                                       <div class="right">
                                                            <input type="text" id="description" name="description" value="'.$detailss['description'].'">
                                                       </div>
                                                  </div>
                                                  <input type="hidden" name="oldname" value="'.$_POST['selectId'].'">
                                             </div>
               
                                             
                                   </div>
                                   <div class="add">
                                   <input type="submit" class="butten" value="UPDATE HAIRCOLOUR">
                                   </div>';   
                                             }                                          
                                             ?>
                                             
                                   </form>
                    <div class="back">
                         <a href="adminHome.php"><button>  &#60; Back </button></a>
                    </div>
          </div>
     <?php    
           
           if(isset($_POST['oldname'] ))  
           {
               $imageInfo=pathinfo($_FILES['image']['name']);
               $imageName = $_POST['styleName'].".".$imageInfo['extension'];
               $imagePath = "images\\".$imageName;
               move_uploaded_file($_FILES['image']['tmp_name'],$imagePath);
               $update="update haircolour set styleName='".$_POST['styleName']."',price='".$_POST['amount']."',description='".$_POST['description']."',stylistName='".$_POST['stylistName']."',ageLimit='".$_POST['ageLimit']."',totalBooked='".$_POST['totalBooked']."',image='".$imageName."' where styleName ='".$_POST['oldname']."'";
               $con->query($update);
               echo "<script>alert('Updated Sucessfully')</script>";
              
           }            
           $con->close();                  
     ?>
  </body>
</html>
