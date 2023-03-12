<?php

include "connect.php";

$id =$_GET['updateid'];
$sql = "select * from crud where id = $id";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
$name =$row['name'];
$email= $row['email'];
$mobile = $row['mobile'];
$password= $row['password'];


if(isset($_POST["submit"])){
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];

$sql = "update crud set id=$id, name='$name', email='$email', mobile='$mobile', password='$password' where  id=$id";
$result = mysqli_query($con, $sql);

if($result){
  // echo "Data updated successfully";

  header('location:display.php'); 
 

}
else{
  die(mysqli_error($con));
}

}


?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud Operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">

    <form class="my-5" method="post">
  <div class="mb-3">
    <label >Name</label>
    <input value=<?php  echo $name; ?> autocomplete="off" name="name" placeholder="Enter your Name" type="text" class="form-control" >
  </div>


  <div class="mb-3">
    <label >Email</label>
    <input value=<?php echo $email; ?> autocomplete="off" name="email" placeholder="Enter your Email" type="email" class="form-control" >
  </div>

  
  <div class="mb-3">
    <label >Mobile Number</label>
    <input value=<?php echo $mobile; ?> autocomplete="off" name="mobile" placeholder="Enter your Mobile" type="text" class="form-control" >
  </div>

  <div class="mb-3">
    <label >Password</label>
    <input  autocomplete="off" name="password" placeholder="Enter Password" type="password" class="form-control" value=<?php echo $password; ?>>
  </div>

  <button name="submit" type="submit" class="btn btn-primary">Update</button>
</form>
    </div>
    
  </body>
</html>