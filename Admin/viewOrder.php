<!DOCTYPE html>
<html lang="en">
  <head>
    <title>View Order</title>
    <link rel="stylesheet" href="adminHome.css" />
    <link rel="stylesheet" href="viewOrder.css">
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
            <li><a href="">HOME</a></li>
            <li><a href="">HAIR STYLES</a></li>
            <li><a href="">HAIR CUTS</a></li>
            <li><a href="">HAIR COLORS</a></li>
            <li><a href="">HAIRTREATMENT</a></li>
            <li><a href="">ABOUT</a></li>
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
        <div class="orderList">
                     
               <?php 

                    require 'connect.php';
                    $send = "SELECT * FROM orderlist";
                    $save = $con->query($send);
                   while( $details=$save->fetch_array())
                   {
                    echo'<div class="singleOrder">
                    <div class="line">
                         <hr>
                    </div>
          
                         <div class="content">
                              <div class="image">
                                   <img src="images/'.$details[7].'" alt="">
                              </div>
               
                              <div class="details">
                                   <div>
                                        <h3>'.$details[0].'</h3>
                                        <span class="spanDetails">
                                             Customer Name : '.$details[2].' <br>
                                             Customer Mail : '.$details[3].'<br>
                                             Reserved Date : '.$details[6].'<br>
                                             Price : '.$details[1].'<br>
                                             Employee Name : '.$details[4].'<br>

                                        </span>
                                   </div>
                              </div>
               
                              <div class="button">
                                   <button class="send">SEND</button>
                                   <button class="cancel">X</button>
                              </div>
                         </div>
                    </div>     ';
                   }
               ?>
                         
          </div>

        

        
      </div>

      <div class="back">
          <a href="adminHome.php"><button>  &#60; Back </button></a>
     </div>
    </div>
  </body>
</html>


