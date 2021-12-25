<?php

$db = mysqli_connect("localhost","root","","sms");

if(!$db)
{  
    die("Connection failed: " . mysqli_connect_error());
}

?>