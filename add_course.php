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

include 'db_con.php';

if(isset($_POST['submit']))
{		
   
    $course = $_POST['course'];
   

  
    $insert = mysqli_query($db,"INSERT INTO `course`(`course`) VALUES ('$course')");

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
                <div class="col-md-6">
                    <label>course</label>
            <input type="text"class="form-control" name="course">

                </div>
             
                
            </div><br>
            <input type="submit" name="submit" class="btn btn-primary">
        </form>
    </div>
</body>
</html>