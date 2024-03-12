<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>
    <link rel="stylesheet" href="adminHome.css" />
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
          <li><a href="../Home/hairstyle.php">HAIR STYLES</a></li>
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
            <div class="welcomeNote">
              <h2>Hi Sir,<br />Welcome</h2>
            </div>
          </div>
          <div class="vorders">
            <a href="viewOrder.php"><span id="viewOrders">View Orders</span></a>
          </div>
          <div class="logo" id="hideLogo">
            <h1 id="fullName">
              <span id="firstName">Habi</span><span id="lastName">Bee</span>
            </h1>
          </div>
        </div>

        <div class="serviceGroup">
          <div class="service">
            <div>
              <hr>
            </div>
            <div class="addRemove">
              <div>
                <a href="addHairColour.php"><button>ADD</button></a>
              </div>
              <div>
                <a href="updateHaircolour.php"><button>UPDATE</button></a>
              </div>
              <div>
                <a href="removeHairColour.php"><button>REMOVE</button></a>
              </div>
            </div>
            <div  class="serviceImage">
              <img src="images/hair color.png" alt="">
            </div>
          </div>


          <div class="service">
            <div>
              <hr>
            </div>
           <div class="addRemove">
              <div>
                <a href="addHairCut.php"><button>ADD</button></a>
              </div>
              <div>
                <a href="updateHairCut.php"><button>UPDATE</button></a>
              </div>
              <div>
                <a href="removeHairCut.php"><button>REMOVE</button></a>
              </div>
            </div>
            <div  class="serviceImage">
              <img src="images/haircut.png" alt="">
            </div>
          </div>


          <div class="service">
            <div>
              <hr>
            </div>
            <div class="addRemove">
              <div>
                <a href="addHairStyle.php"><button>ADD</button></a>
              </div>
              <div>
                <a href="updateHairstyle.php"><button>UPDATE</button></a>
              </div>
              <div>
                <a href="removeHairStyle.php"><button>REMOVE</button></a>
              </div>
            </div>
            <div  class="serviceImage">
              <img src="images/hairstyle.png" alt="">
            </div>
          </div>


          <div class="service">
            <div>
              <hr>
            </div>
            <div class="addRemove">
              <div>
                <a href="addStylist.php"><button>ADD</button></a>
              </div>
              <div>
                <a href="updateHaircolour.php"><button>UPDATE</button></a>
              </div>
              <div>
                <a href="removeHairTreatment.php"><button>REMOVE</button></a>
              </div>
            </div>
            <div  class="serviceImage">
              <img src="images/hairTreatment.png" alt="">
            </div>
          </div>


        </div>
        <div class="logout">
          <a href="logout.php"><span>Logout</span></a>
        </div>
      </div>
    </div>
  </body>
</html>
