<?php 

// Create connection
include 'db_con.php';
$id = $_GET['id'];

$result = mysqli_query($conn, "DELETE FROM std_info WHERE id=$id");
if($result)
{   
    
    echo"<script>alert('Student deleted successfully')</script>";
    echo "<script>window.open('list.php','_self')</script>";
    
}else{

}
?>