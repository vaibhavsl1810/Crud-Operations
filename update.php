<?php

include "connect.php";

$id=$_GET['id'];

$sql="select * from crud where id=$id";
$result=mysqli_query($con,$sql);

$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$mobile=$row['mobile'];
$password=$row['password'];



if(isset($_POST['submit'])){
     $name=$_POST['name'];
     $email=$_POST['email'];
     $mobile=$_POST['mobile'];
     $password=$_POST['password'];
     
    $sql="update crud set id=$id,name='$name',email='$email',mobile='$mobile',password='$password' where id=$id" ;
    $result=mysqli_query($con,$sql);

    if($result)
    {
        //echo "Data updated successfully.";
        header('location:index.php');
    }
    else{
        die(mysqli_error($con)); 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">


    <title>Crud Opeartions</title>
</head>
<body>
    <div class="container my-5">
        <form method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter Your Name" name="name" autocomplete="off" value=<?php echo $name; ?>>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter Your email" name="email" autocomplete="off" value=<?php echo $email; ?>>
                          
            </div>
            <div class="form-group">
                <label>Mobile</label>
                <input type="text" class="form-control" placeholder="Enter Your mobile" name="mobile" autocomplete="off" value=<?php echo $mobile; ?>>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Enter Your password" name="password" autocomplete="off" value=<?php echo $password; ?>>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
    </div>
</body>
</html>