<?php
     $con=new mysqli("localhost","root","","saloondb");
     if($con->connect_error){
          die("Connection failed:".$con->connect_error) ;
      }
?>