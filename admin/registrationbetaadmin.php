<?php

if(isset($_POST['password'])){
$servername = "localhost";
  $username = "rectubmx_customer";
  $password = "Rakesh@2023";
  $dbname = "rectubmx_customerquery";

$con = mysqli_connect($server,$username,$password,$dbname);
if(!$con){
    die("Connection to the Database failed due to".mysqli_connect_error());
}

$nameSubadmin=$_POST['nameSubadmin'];
$Email=$_POST['Email'];
$mobileno=$_POST['mobileno'];
$password=$_POST['password'];
$datacenter=$_POST['datacenter'];
$role=$_POST['role'];
$sql ="INSERT INTO `rectubmx_customerquery`.`addnewadmin` (`nameSubadmin`, `Email`, `mobileno`,`role`,`datacenter`,`password`) 
VALUES ('$nameSubadmin', '$Email', '$mobileno','$role','$datacenter' ,'$password');";

if($con->query($sql)==true){
    echo"Sucessfully Added";
    echo '<script>window.history.back();</script>';
}else{
    echo"Error : $sql  <br> $con->error";
}




$con->close();

}
?>


<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="formcss.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body class="bg-dark ">
    <div class="container mt-4 d-flex justify-content-center fw-bold ">
      <h1 class="text-center text-primary font-weight-bold">Adding New SubAdmin</h1>
     
    </div>
    

    <div class="container mt-4 d-flex justify-content-center fw-bold">
<form  class="w-75 p-3 rounded" style="background-color: #eee;" action="registrationnewadmin.php" method="POST">
    
    <div class="form-group">
             <select class="form-select form-control" name="role" aria-label="Default select example">
  
  <option >Sub Admin</option>
  
</select><br> 

        <div class="form-group">
            <label for="exampleInputnameSubadmin">Sub Admin Name  
            </label>
            <input type="text" class="form-control" name="nameSubadmin" aria-describedby="nameSubadminHelp">
            
          </div>
          <div class="form-group">
            <label for="exampleInputFirst_Name">Email</label>
            <input type="email" class="form-control" name="Email" aria-describedby="EmailHelp">
            
          </div>

          <div class="form-group">
            <label for="examplemobileno">Mobile Number</label>
            <input type="number" class="form-control" name="mobileno" aria-describedby="mobilenoHelp">
            
         </div>
         

         <div class="form-group">
    <label for="examplepassword">Password</label>
    <input type="password" class="form-control" name="password" aria-describedby="passwordHelp">
</div>

        
        <div class="d-flex justify-content-center">
         <button type="submit" class="btn btn-primary" name="submit">Submit</button>
         <a href="Index.php" class="btn btn-success ml-3">Back</a>

        </div>
        
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>