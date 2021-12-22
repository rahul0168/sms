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
    $course = implode(',', $_POST['course']);
    
    $photo = $_POST['photo'];
    
  

    $insert = mysqli_query($db,"INSERT INTO `std_info`(`stdname`,`dob`,`gender`,`telephone`,`email`,`city`,`nationality`,`course`,`photo`) VALUES ('$stdname','$dob','$gender','$telephone','$email','$city','$nationality','$course','$photo')");
      
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
<form method="post">

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
                <option >Option</option>
                <option>Male</option>
                <option>Female</option>
                <option>Others</option>
              </select>
        </div>
    </div>

    <div class="row">
       
        <div class="col-md-6">
            <label>Nationality</label>
            <select id="inputState" class="form-control" name="nationality">
                <option >Option</option>
                <option>Male</option>
                <option>Female</option>
                <option>Others</option>
              </select>
            
        </div>
        <div class="col-md-6">
            <label>Course Selection</label>

            <select id="inputState" class="form-control" multiple name="course[]">
                <option >Option</option>
                <option>Male</option>
                <option>Female</option>
                <option>Others</option>
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
    function validateform(){  
    var name=document.myform.name.value;  
    var password=document.myform.password.value;  
      
    if (name==null || name==""){  
      alert("Name can't be blank");  
      return false;  
    }else if(password.length<6){  
      alert("Password must be at least 6 characters long.");  
      return false;  
      }  
    }  
    </script> 