<?php
$showError = false;
$showAlert=false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include './Partials/_dbconnect.php';

        
        
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmpassword = $_POST["confirmpassword"];
        // $exist=false;
        $existSql = "SELECT * FROM `users` WHERE email='$email'";
        $result = mysqli_query($conn, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if($numExistRows > 0){
            // $exist = true;
            $showError = "Email id already exist";
        }
        else{
            // $exist = false;
        
        if($password == $confirmpassword){
                $hash = password_hash($password,PASSWORD_DEFAULT);
                $sql="INSERT INTO `users` ( `email`, `password`, `Date`) VALUES ('$email','$hash', current_timestamp())";

                $result = mysqli_query($conn,$sql);
                if($result){
                    $showAlert = true;

                }
            }
            
            else{
                $showError = "Passwords do not match";
            }
        }
    }


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>SignUp</title>
    <style>

    </style>
</head>

<body style="background-color: #E2DBAB;">
    <?php require 'Partials/_navbar.php' ?>
    <?php

    if($showAlert){
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is created.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
   
    else if($showError){
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '.$showError.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
?>

    <div class="container">
        <h1 class="text-center">SignUp</h1>
        <form action="/ITWS/signup.php" method="post">
            <div class="mb-3 col-md-4">
                <label for="email" class="form-label ">Email address</label>
                <input type="email" maxlength="50" class="form-control" id="email" name="email" aria-describedby="emailHelp">

            </div>
            <div class="mb-3 col-md-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <div id="passdisclaimer" maxlenght= "20" class="form-text">Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji. </div>
            </div>
            <div class="mb-3 col-md-4">
                <label for="confirmpassword" class="form-label">Re-enter Password</label>
                <input type="password" class="form-control" id="confirmpassword" name="confirmpassword">

            </div>

            <button type="submit" class="btn btn-primary">SignUp!</button>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>