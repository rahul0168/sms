<?php 

// Create connection
$conn = new mysqli("localhost", "root", "", "sms",3308);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$id = $_GET['id'];

$result = mysqli_query($conn, "DELETE FROM std_info WHERE id=$id");
if($result)
{   
    header("location:list.php");
    echo"<script>alert('Student deleted successfully')</script>";
    
}else{

}
?>