<?php
     $con = new mysqli("localhost","root","","saloondb");
     $delete= " delete  from hairstyles;";
     $con->query($delete);
     $con->close();
?>