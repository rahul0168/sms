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




</head>
<body>
    <div style="background: rgb(0, 162, 255); padding: 15px; color: aliceblue;font-weight: 600;font-size: 20px;">Student Mangement Sytem</div>
    <div class="container"><br>
    <button class="btn btn-success">Add Student</button><br><br>
    <?php


// Create connection
$conn = new mysqli("localhost", "root", "", "sms",3308);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM std_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
    ?>  <table class="table table-bordered">
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
      <tr>
        <td scope="row"><?php echo $row["stdname"]; ?></td>
        <td scope="row"><?php echo $row["photo"]; ?></td>
        <td scope="row"><?php echo $row["gender"]; ?></td>
        <td scope="row"><?php echo $row["city"]; ?></td>
        <td scope="row"><?php echo $row["nationality"]; ?></td>
        <td scope="row"><button class="btn btn-primary">Edit</button></td>
        <td scope="row"><button class="btn btn-danger">Delete</button></td>
       
      </tr>
    
    </tbody>
  </table> 
  <?php
  }
} else {
  echo "0 results";
}
$conn->close();
?>
   
</div>
</body>
</html>