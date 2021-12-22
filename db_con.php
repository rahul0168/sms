<?php

$db = mysqli_connect("localhost","root","","gcc","3308");

if(!$db)
{  echo"<script>alert('hi'); </script>";
    die("Connection failed: " . mysqli_connect_error());
}

?>