<?php
if(isset($_POST["sName"]))
{
$sname=$_POST["sName"];
$price=$_POST["sPrice"];
$description=$_POST["sDescription"];
$stylistName=$_POST["sStylistname"];
$ageLimit=$_POST["sAgelimit"];
$totalBooked=$_POST["sBooked"];


$imageinfo=pathinfo($_FILES['imageFile']['name']);
$targetFile = "images\\".$_POST["sName"].".".$imageinfo['extension'];
$imageFile=$_POST["sName"].".".$imageinfo['extension'];
move_uploaded_file($_FILES['imageFile']['tmp_name'],$targetFile);

     require 'connect.php';
     $check = "select styleName from haircuts where styleName ='".$_POST["sName"]."'";
     $save = $con->query($check);
          if($save->num_rows>0)
          {
               echo "<script>alert('This HAIRCUT NAME already Exist try new name !!!')</script>";
          }
          else
          {
               $insert = "insert into haircuts(styleName,price,description,stylistName,ageLimit,totalBooked,image,serviceName) values('".$_POST['sName']."',".$_POST['sPrice'].",'".$_POST['sDescription']."','".$_POST['sStylistname']."','".$_POST['sAgelimit']."','".$_POST['sBooked']."','".$imageFile."','".$_POST['serviceName']."')";
               $y=$con->query($insert);
               echo "<script>alert('Added Sucessfully')</script>";
          }
     
     $con->close();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <title>Add Hair Cut</title>
     <link rel="stylesheet" href="adminHome.css" />
     <link rel="stylesheet" href="addHairCut.css">
     <script src="adminHome.js"></script>
</head>

<body>
     <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
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
                         <li><a href="../Home/hairstyle.php">HAIR STYLES</a></li>
                         <li><a href="../Home/hairCut.php">HAIR CUTS</a></li>
                         <li><a href="../Home/hairColour.php">HAIR COLORS</a></li>
                         <li><a href="..//Home/hairTreatment.php">HAIRTREATMENT</a></li>
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
                    <div class="firstHalf">
                         <hr>
                         <span>New Hair Cut</span>
                         <img src="images/haircut.png" alt="">
                         <input type="file" name="imageFile" class="fileChoose">
                    </div>
                    <div class="fullTable">
                         <div class="singleLine">
                              <div class="left">
                                   <span>Cut Name :</span>
                              </div>
                              <div class="right">
                                   <input type="text" name="sName" placeholder="Name">
                              </div>
                         </div>

                         <div class="singleLine">
                              <div class="left">
                                   <span>Stylist Name :</span>
                              </div>
                              <div class="right">
                                   <input type="text" id="title" name="sStylistname" placeholder="Name">
                              </div>
                         </div>
                         <div class="singleLine">
                              <div class="left">
                                   <span>Age Limit :</span>
                              </div>
                              <div class="right">
                                   <input type="text" name="sAgelimit" placeholder="Name">
                              </div>
                         </div>
                         <div class="singleLine">
                              <div class="left">
                                   <span>Amount :</span>
                              </div>
                              <div class="right">
                                   <input type="text" name="sPrice" placeholder="Number">
                              </div>
                         </div>

                         <div class="singleLine">
                              <div class="left">
                                   <span>Total Booked :</span>
                              </div>
                              <div class="right">
                                   <input type="text" name="sBooked" placeholder="Name">
                              </div>
                         </div>
                         <div class="singleLine">
                              <div class="left">
                                   <span>Description :</span>
                              </div>
                              <div class="right">
                                   <input type="text" id="description" name="sDescription" placeholder="Max 500 Letters">
                                   <input type="hidden" name="serviceName" value="haircuts">
                              </div>
                         </div>
                    </div>


               </div>
               <div class="add">
                    <button type="submit" class="butten">ADD</button>
               </div>
               <div class="back">
                    <a href="adminHome.php"><button type="button"> &#60; Back </button></a>
               </div>
          </div>
     </form>
</body>

</html>