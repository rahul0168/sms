<!DOCTYPE html>
<html>
<head>

<title>GCC</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"><!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>


</head>
<body>
    <div style="background: rgb(0, 162, 255); padding: 15px; color: aliceblue;font-weight: 600;font-size: 20px;">Student Mangement Sytem</div>
    <div class="container"><br>
    <a href="index.php"><button class="btn btn-success">Add Student</button></a><br><br>
    <a href="admin.php"><button class="btn btn-primary">Go Admin </button></a><br><br>
    <table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th scope="col">Fullname</th>
        <th scope="col">Image</th>
        <th scope="col">Gender</th>
        <th scope="col">City</th>
        <th scope="col">Country</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
    <?php


// Create connection
include 'db_con.php';
$sql = "SELECT * FROM std_info";
$result = $db->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
    ?>  
      <tr>
        <td scope="row"><?php echo $row["stdname"]; ?></td>
        <td scope="row"><?php echo $row["photo"]; ?></td>
        <td scope="row"><?php echo $row["gender"]; ?></td>
        <td scope="row"><?php echo $row["city"]; ?></td>
        <td scope="row"><?php echo $row["nationality"]; ?></td>
        <td scope="row"><a href="edit.php?id=<?php echo $row['id']; ?>"><button class="btn btn-primary">Edit</button></a></td>
        <td scope="row"><a href="delete.php?id=<?php echo $row['id']; ?>" onClick="return confirm('Are you sure you want to delete?');"><button class="btn btn-danger">Delete</button></a></td>
       
      </tr>
    
   
  <?php
  }
} else {
  echo "0 results";
}
$db->close();
?>
    </tbody>
  </table> 
</div>
</body>
</html>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>