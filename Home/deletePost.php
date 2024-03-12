<?php
 require 'connect.php';
 $delete = "DELETE FROM postdetails WHERE imageName = '".$_GET['id']."'";
 $con->query($delete);
 header("location:userProfile.php");
?>