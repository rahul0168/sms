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
    <div class="container">
    <?php


// Create connection
$conn = new mysqli("localhost", "root", "", "sms",3308);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($conn,"select * from std_info where id='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data
$retrieved_majors = explode(",", $data['course']);

if(isset($_POST['update'])) // when click on Update button
{
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
	
    $edit = mysqli_query($conn,"update std_info set fullname='$fullname', age='$age' where id='$id'");
	
    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:all_records.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}

    
    ?>
<form method="post">

    <div class="row">
        <div class="text-center" style="font-weight: 600;font-size: 25px;">Form</div>
        <div class="col-md-6">
            <label>Student Full Name</label>
            <input type="text" class="form-control" name="stdname" value="<?php echo $data['stdname'] ?>" id="inputEmail4" placeholder="Full Name">
            
        </div>
        <div class="col-md-6">
            <label>Date Of Birth</label>

            <input type="date" class="form-control" id="inputEmail4" name="dob" value="<?php echo $data['dob'] ?>" placeholder="Email">
        </div>
    </div>
    <div class="row">
       
        <div class="col-md-6">
            <label>Gender</label>
            <select id="inputState" class="form-control" name="gender">
                <option  value="">Select</option>
                <option value="male" <?php if( $data['gender'] == "male"){ echo"selected";} ?>> Male</option>
                <option value="female" <?php if( $data['gender'] == "female"){ echo"selected";} ?>>Female</option>
                <option value="others" <?php if( $data['gender'] == "others"){ echo"selected";} ?>>Others</option>
              </select>
            
        </div>
        <div class="col-md-6">
            <label>Telephone</label>

            <input type="tel" class="form-control" id="inputEmail4" placeholder="Email" value="<?php echo $data['telephone'] ?>" name="telephone">
        </div>
    </div>
    <div class="row">
       
        <div class="col-md-6">
            <label>Email</label>
            <input type="email" class="form-control" id="inputEmail4" value="<?php echo $data['email'] ?>" placeholder="Email" name="email">
            
        </div>
        <div class="col-md-6">
            <label>City</label>

            <select id="inputState" class="form-control" name="city">
            <option value="">Option</option>
                <option value="ponda" <?php if( $data['city'] == "ponda"){ echo"selected";} ?>> Ponda</option>
                <option value="adpai" <?php if( $data['city'] == "adpai"){ echo"selected";} ?> > Adpai</option>
              </select>
        </div>
    </div>

    <div class="row">
       
        <div class="col-md-6">
            <label>Nationality</label>
            <select id="inputState" class="form-control" name="nationality">
            <option value="">Select</option>
                <option value="india" <?php if( $data['nationality'] == "india"){ echo"selected";} ?>> India</option>
                <option value="Austria" <?php if( $data['nationality'] == "Austria"){ echo"selected";} ?>> Austria</option>
              </select>
            
        </div>
        <div class="col-md-6">
          
            <label>Course Selection</label>

            <select id="inputState" class="form-control" multiple name="course[]">
                <option value="">Option</option>
                <option value="ponda"> Ponda</option>
                <option value="adpai"> Adpai</option>
               
            <option value="ponda" <?php if(array_search($data['course'], $retrieved_majors) !== false) {echo 'selected';} ?> ><?php echo $data['course']; ?></option>
            

               
              </select>
        </div>
    </div>
    <div class="row">
       
        <div class="col-md-6">
            <label>Photo</label><br>
           <input type="file" name="photo" value="<?php echo $data['photo'] ?>">
            
        </div>
        
    </div>
    <div class="row">
       
        <div class="col-md-6">
            <br>
           <input type="submit" class="btn btn-primary" name="submit">
            
        </div>
        
    </div>
</form> 
    
</div>
