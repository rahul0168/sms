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


include 'db_con.php';

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($conn,"select * from std_info where id='$id'"); // select query

$datas = mysqli_fetch_array($qry); // fetch data


if(isset($_POST['update'])) // when click on Update button
{
    $stdname = $_POST['stdname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $nationality = $_POST['nationality'];
    $course = $_POST['course'];

    if (isset($_FILES['photo']['tmp_name'])) {
        $file=$_FILES['photo']['tmp_name'];
        $image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
        $image_name= addslashes($_FILES['photo']['name']);
        move_uploaded_file($_FILES["photo"]["tmp_name"],"all_images/" . $_FILES["photo"]["name"]);
        $image_save ="all_images/" . $_FILES["photo"]["name"];
        }
	
    $edit = mysqli_query($conn,"update std_info set stdname ='$stdname', dob='$dob' , gender='$gender', telephone='$telephone', email='$email', city='$city', nationality='$nationality', photo='$image_save',course='$course'where id='$id'");
	
    if($edit)
    {
        mysqli_close($conn); // Close connection
        header("location:list.php"); // redirects to all records page
        exit;
    }
    else
    {
        //echo mysqli_error();
    }    	
}

    
    ?>
<form method="post" enctype="multipart/form-data">

    <div class="row">
        <div class="text-center" style="font-weight: 600;font-size: 25px;">Form</div>
        <div class="col-md-6">
            <label>Student Full Name</label>
            <input type="text" class="form-control" name="stdname" value="<?php echo $datas['stdname'] ?>" id="inputEmail4" placeholder="Full Name">
            
        </div>
        <div class="col-md-6">
            <label>Date Of Birth</label>

            <input type="date" class="form-control" id="inputEmail4" name="dob" value="<?php echo $datas['dob'] ?>" placeholder="Email">
        </div>
    </div>
    <div class="row">
       
        <div class="col-md-6">
            <label>Gender</label>
            <select id="inputState" class="form-control" name="gender">
                <option  value="">Select</option>
                <option value="male" <?php if( $datas['gender'] == "male"){ echo"selected";} ?>> Male</option>
                <option value="female" <?php if( $datas['gender'] == "female"){ echo"selected";} ?>>Female</option>
                <option value="others" <?php if( $datas['gender'] == "others"){ echo"selected";} ?>>Others</option>
              </select>
            
        </div>
        <div class="col-md-6">
            <label>Telephone</label>

            <input type="tel" class="form-control" id="inputEmail4" placeholder="Email" value="<?php echo $datas['telephone'] ?>" name="telephone">
        </div>
    </div>
    <div class="row">
       
        <div class="col-md-6">
            <label>Email</label>
            <input type="email" class="form-control" id="inputEmail4" value="<?php echo $datas['email'] ?>" placeholder="Email" name="email">
            
        </div>
        <div class="col-md-6">
            <label>City</label>

            <select id="inputState" class="form-control" name="city">
            <option value="">Option</option>
            <?php
       
        $records = mysqli_query($db, "SELECT id,city_name From city");  // Use select query here 


        while($data = mysqli_fetch_array($records))
        { ?>
        <option value="<?php echo $data['city_name']; ?>"  <?php if( $data['city_name'] == $datas['city']){ echo"selected";} ?>><?php echo $data['city_name']; ?>  </option>
      <?php  }	
             ?> 
              </select>
        </div>
    </div>

    <div class="row">
       
        <div class="col-md-6">
            <label>Nationality</label>
            <select id="inputState" class="form-control" name="nationality">
            <option value="">Select</option>
            <?php
       
        $records = mysqli_query($db, "SELECT id,country From country");  // Use select query here 


        while($data = mysqli_fetch_array($records))
        { ?>
            <option value="<?php echo $data['country']; ?>"  <?php if( $data['country'] == $datas['nationality']){ echo"selected";} ?>><?php echo $data['country']; ?>  </option>
          <?php  }	
                 ?> 
              </select>
            
        </div>
        <div class="col-md-6">
          
            <label>Course Selection</label>

            <select id="inputState" class="form-control"  name="course">
            <?php
       
        $records = mysqli_query($db, "SELECT id,course From course");  // Use select query here 


        while($data = mysqli_fetch_array($records))
        { ?>
            <option value="<?php echo $data['course']; ?>"  <?php if( $data['course'] == $datas['course']){ echo"selected";} ?>><?php echo $data['course']; ?>  </option>
          <?php  }	
                 ?> 
                
          

               
              </select>
        </div>
    </div>
    <div class="row">
       
        <div class="col-md-6">
            <label>Photo</label><br>
           <input type="file" name="photo" >
          
            
        </div>
        
    </div>
    <div class="row">
       
        <div class="col-md-6">
            <br>
           <input type="submit" class="btn btn-primary" name="update">
            
        </div>
        
    </div>
</form> 
    
</div>
