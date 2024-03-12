
<?php
          session_start();
          $date1 = date('Y/m/d - l - h: i a');
          require 'connect.php';
         
          
          $get1 = "SELECT * FROM hairstyles WHERE styleName = '".$_GET['product']."'";
          $save=$con->query($get1);
          $details1 = $save->fetch_array();

          
          $get2 = "SELECT * FROM signupdetails WHERE email = '".$_SESSION['user']."'";
          $save=$con->query($get2);
          $details2 = $save->fetch_array();


          $get3 = "SELECT * FROM orderlist where customerMail ='".$details2[3]."' and serviceName = '".$details1[0]."'";
          $details3 = $con->query($get3);
          if($details3->num_rows>0)
          {
               echo"
               <script>
               alert(' You Already Booked This Service !!');
               </script>

          ";
          }
          else
          {
               $set = "INSERT INTO orderlist(serviceName,price,customerName,customerMail,employeeName ,sendDate,bookingDate,imagePath) VALUES('".$details1[0]."',".$details1[1].",'".$details2[5]."','".$details2[3]."','".$details1[3]."','".$date1."','".$_GET['date']." | ".$_GET['time']."','".$details1[6]."')";
               //$set = "INSERT INTO orderlist(serviceName,price,customerName,customerMail,employeeName ,sendDate,bookingDate,imagePath) VALUES('jhjh',64,'tgte','ergergerf','ergerferf','ergerfe','egtergerg','dfvdfvd')";
               $con->query($set);
               echo"
               <script>
               alert('Booking Sucessfull !!');
               </script>";
          }
          
          $con->close();
         
?>