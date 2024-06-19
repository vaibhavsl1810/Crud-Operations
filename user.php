<?php

include "connect.php";

if(isset($_POST['submit'])){
     $name=$_POST['name'];
     $email=$_POST['email'];
     $mobile=$_POST['mobile'];
     $password=$_POST['password'];
     
    $sql="insert into crud(name,email,mobile,password) values ('$name','$email','$mobile','$password')";
    $result=mysqli_query($con,$sql);

    if($result)
    {
        //echo "Data insert successfully.";
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
    <script>
        function data(){
            var a=document.getElementById('n1').value;
            var b=document.getElementById('n2').value;
            var c=document.getElementById('n3').value;
            var d=document.getElementById('n4').value;

            if(a=="" || b=="" || c=="" || d=="")
            {
                alert("All Fields are mendatory");
                return false;
            }
            else if(c.length<10 ||c.length>10)
            {
                alert("Number should be of 10 digits ! Please enter valid number!");
                return false;
            }
            else if(isNaN(c))
            {
                alert("Only numbers allowed ! Please enter valid number!");
                return false;
            }
            else if(d.length<8 ||d.length>8)
            {
                alert("Password should be of 8 digits !!");
                return false;
            }
            else{
                true;
            }
        }
    </script>        
</head>
<body>
    <div class="container my-5">
        <form method="post" onsubmit="return data()">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Enter Your Name" name="name" autocomplete="off" id="n1">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter Your email" name="email" autocomplete="off" id="n2">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>                
            </div>
            <div class="form-group">
                <label>Mobile</label>
                <input type="text" class="form-control" placeholder="Enter Your mobile" name="mobile" autocomplete="off" id="n3">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" placeholder="Enter Your password" name="password" autocomplete="off" id="n4">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
    </div>
</body>
</html>