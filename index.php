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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>





</head>
<body>
    <div style="background: rgb(0, 162, 255); padding: 15px; color: aliceblue;font-weight: 600;font-size: 20px;">Student Mangement Sytem</div>
    <div class="container">
    <?php

$db = mysqli_connect("localhost","root","","sms",3308);

if(!$db)
{  
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit']))
{		
    $stdname = $_POST['stdname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $nationality = $_POST['nationality'];
    //$course = implode(',', $_POST['course']);
    $var1 = rand(1111,9999);  // generate random number in $var1 variable
    $var2 = rand(1111,9999);  // generate random number in $var2 variable
	
    $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
    $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

    $fnm = $_FILES["photo"]["name"];    // get the image name in $fnm variable
    $dst = "./all_images/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
    $dst_db = "all_images/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file name

    move_uploaded_file($_FILES["photo"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name 
    $courses = $_POST['course'];

    foreach($courses as $course){
    $insert = mysqli_query($db,"INSERT INTO `std_info`(`stdname`,`dob`,`gender`,`telephone`,`email`,`city`,`nationality`,`course`,`photo`) VALUES ('$stdname','$dob','$gender','$telephone','$email','$city','$nationality','$course','$dst_db')");
}
    if(!$insert)
    {
        echo "not inserted";
      
        //echo"<script>alert('not'); </script>";
    }
    else
    {
        echo "<div class='alert alert-success' role='alert'>Records added successfully.</div>";
        //echo"<script>alert('yes'); </script>";
    }
}

mysqli_close($db); // Close connection
?>
<form method="post" enctype="multipart/form-data">

    <div class="row">
        <div class="text-center" style="font-weight: 600;font-size: 25px;">Form</div>
        <div class="col-md-6">
            <label>Student Full Name</label>
            <input type="text" class="form-control" name="stdname" id="inputEmail4" placeholder="Full Name">
            
        </div>
        <div class="col-md-6">
            <label>Date Of Birth</label>

            <input type="date" class="form-control" id="inputEmail4" name="dob" placeholder="Email">
        </div>
    </div>
    <div class="row">
       
        <div class="col-md-6">
            <label>Gender</label>
            <select id="inputState" class="form-control" name="gender">
                <option >Option</option>
                <option>Male</option>
                <option>Female</option>
                <option>Others</option>
              </select>
            
        </div>
        <div class="col-md-6">
            <label>Telephone</label>

            <input type="tel" class="form-control" id="inputEmail4" placeholder="Email" name="telephone">
        </div>
    </div>
    <div class="row">
       
        <div class="col-md-6">
            <label>Email</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
            
        </div>
        <div class="col-md-6">
            <label>City</label>

            <select id="inputState" class="form-control" name="city">
            <?php
       $db = mysqli_connect("localhost","root","","sms",3308);

       if(!$db)
       {  
           die("Connection failed: " . mysqli_connect_error());
       }
        $records = mysqli_query($db, "SELECT id,city_name From city");  // Use select query here 


        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['city_name'] ."'>" .$data['city_name'] ."</option>";  // displaying data in option menu
        }	
             ?> 
              </select>
        </div>
    </div>

    <div class="row">
       
        <div class="col-md-6">
            <label>Nationality</label>
            <select id="inputState" class="form-control" name="nationality">
            <?php
       $db = mysqli_connect("localhost","root","","sms",3308);

       if(!$db)
       {  
           die("Connection failed: " . mysqli_connect_error());
       }
        $records = mysqli_query($db, "SELECT id,country From country");  // Use select query here 


        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['country'] ."'>" .$data['country'] ."</option>";  // displaying data in option menu
        }	
             ?> 
              </select>
            
        </div>
        <div class="col-md-6">
            <label>Course Selection</label>

            <select  class="form-control mutiple-select" multiple name="course[]" id="course">
            <?php
       $db = mysqli_connect("localhost","root","","sms",3308);

       if(!$db)
       {  
           die("Connection failed: " . mysqli_connect_error());
       }
        $records = mysqli_query($db, "SELECT id,course From course");  // Use select query here 


        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['course'] ."'>" .$data['course'] ."</option>";  // displaying data in option menu
        }	
             ?> 
              </select>
        </div>
    </div>
    <div class="row">
       
        <div class="col-md-6">
            <label>Photo</label><br>
           <input type="file" name="photo">
            
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
<script>  

$(document).ready(function(){

    $('#course').select2({
 
  allowClear: true
});  

});
    </script> 