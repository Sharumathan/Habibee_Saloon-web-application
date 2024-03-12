<?php 
session_start();
if(isset($_SESSION['user']))
{
     header("location:userProfile.php");
}
require 'connect.php';
//$con->query("delete from signupdetails");
if(isset($_POST['termsandconditions']))
{
     $checkEmail = "select email from signupdetails where email ='".$_POST['email']."'";
          $save = $con->query($checkEmail);
          if($save->num_rows> 0)
          {
               echo "<script> alert('This Email Already Registerd'); </script> ";
          }
          else
          {
               $inputDetails = "insert into signupdetails(firstName,lastName,dateOfBirth,email,contactNo,userName,password,profilePhoto,coverPhoto,noOfPost) values('".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['dob']."','".$_POST['email']."','".$_POST['contactno']."','".$_POST['username']."','".$_POST['password']."','".$_POST['profilePhoto']."','".$_POST['coverPhoto']."',0)";
               $con->query($inputDetails);
               echo "<script> alert('Account Sucessfully Created Login To Continue !!'); </script> ";
          }
}
else if(!isset($_POST['termsandconditions']) && isset($_POST['email']))
{
     echo "<script> alert('Accept Terms And Conditions To Continue !!'); </script> ";
}
    

     if(isset($_POST['passwordd']))
     {
               $get="select * from signupdetails where email ='".$_POST['emaill']."'";
               $have=$con->query($get);
               
                    if($have->num_rows==0)
                    {  
                         echo "<script> alert('User Email not found !!!');</script>";
                    }
                    else
                    {
                         $save = $have->fetch_assoc();
                         if($save['password'] == $_POST['passwordd'])
                         {
                              if($_POST['emaill']=="sharumathan8@gmail.com")
                              {
                                   header("location:../admin/adminHome.php");
                              }
                              else{ 
                                   echo "<script> alert('Log in Sucessfull');</script>";
                                   $_SESSION['user']=$save['email'];
                                   header("location:homePage.php");
                              }
                         }
                         else
                         {
                              echo "<script> alert('Incorrect Password');</script>";
                         }
                         
                    }        
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <title>Account</title>
     <link rel="stylesheet" href="accountPage.css">
</head>
<body>
     <div class="body">
          <div class="header">
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
     <div class="container">
          <div class="containerHalf1">
              <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                    <div class="loginPage" id="loginPage">
                         <span id="welcome">WELCOME TO </span>
                         <h1 id="habibeeRed">HABIBEE</h1>
                         <p class="p2">
                              Log in to get the movement updates on the things<br>
                              that intrest you
                         </p>
                         <input type="email" class="username" placeholder="E-mail" name="emaill">
                         <input type="password" class="password" placeholder="Password" name="passwordd">
                         <button type="submit" class="submit">LOGIN</button>
                         <p>Dont't have an account ? <span onclick="move1();" id="redsingup">Sign Up Now</span></p>
                    </div>
              </form>
               <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="signupPage" id="signupPage" method="POST">
                         <p id="signupDetails">ENTER YOUR DETAILS TO SIGN UP</p>
                         <div class="fullName">
                              <input type="text" class="firstname" placeholder="First Name" name="firstname">
                              <input type="text" class="lastname" placeholder="Last Name" name="lastname">
                         </div>
                         <input type="date" class="signupInput" id="date" name="dob">
                         <input type="email" class="signupInput" placeholder="E-mail" name="email">
                         <input type="number" class="signupInput" placeholder="Contact-No" name="contactno">
                         <input type="text" class="signupInput" placeholder="User Name" name="username">
                         <input type="password" class="signupInput" placeholder="Password" name="password">
                         <input type="hidden" name="profilePhoto" value="commonProfile.jpg">
                         <input type="hidden" name="coverPhoto" value="commonCover.jpg">
                         <div><input type="checkbox" name="termsandconditions" value="ticked"> Acepet all terms and conditions</div>
                         <button type="submit" class="submit"  id="signupButton">SIGN UP</button>
                         <p id="p2">Already Have An Account ?<span id="submit2" onclick="move2();"> Log In Now</span></p>
               </form>
               
               
          </div>
          <div class="containerHalf2">
               <div class="overlay">
                    
               </div>
               <div class="innerContant">
                         <h1 id="h1">HABIBEE</h1>
                         <p id="lines">Glad to have you hear dear !! we are Gratefull for <br>your oders. Go On and login for more : &#41;</p>
               </div>
               <div class="image">
                    <img src="images/alvaro-bernal--E9rX-6fggI-unsplash.jpg" alt="">
               </div>
          </div>
     </div>

     <script>
          function move1()
          {
               
                    document.getElementById("signupPage").style.transform = "translateX(00px)";
                    document.getElementById("loginPage").style.transform = "translateX(-500px)";
                    document.getElementById("lines").innerHTML= "Hey feel free to join us. You are unique forever. <br> As a family, we are present.: &#41;";
               
          }

           function move2()
           {
               document.getElementById("signupPage").style.transform = "translateX(500px)";
               document.getElementById("loginPage").style.transform="translateX(00px)";
               document.getElementById("lines").innerHTML = "Glad to have you hear dear !! we are Gratefull for<br> your oders. Go On and login for more : &#41;";
           }
     </script>
</body>
</html>