<?php

session_start();


require_once 'Partials/_dbconnect.php';

$email = $_SESSION['email'];


$sql = "SELECT BBP01,BCBP01,RBP01,NPL01 FROM users WHERE email = '$email'";
$res = mysqli_query($conn,$sql);
$BBPquant= "0";
$BCBPquant = "0";
$RBPquant = "0";
$NPLquant = "0";
if($res){
    while($row =mysqli_fetch_assoc($res)){
        $BBPquant = $row['BBP01'];
        $BCBPquant = $row['BCBP01'];
        $RBPquant = $row['RBP01'];
        $NPLquant = $row['NPL01'];    
    }
}
else{
    echo 'error!';
}


$username = strstr($_SESSION['email'], '@', true);
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
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

  <title>Welcome </title>
</head>

<body style="background-color: #ABE0E2;">
  
  <?php require 'Partials/_navbar.php' ?>
  <p class="my-4" style="text-align: center; font-size: 35px; text-decoration: double underline;">Welcome-<?php echo $username; ?></p>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">S.No</th>
        <th scope="col">Product name</th>
        <th scope="col">Product Id</th>
        <th scope="col">Operation</th>
        <th scope="col">Quantity</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Blue Ball pen</td>
        <td>BBP01</td>
        <td>
          <div class="btn-toolbar mb-3" role="toolbar">
            <div class="btn-group me-2" role="group" aria-label="First group">
              <a class="btn btn-success" href="clickres.php?i=BBP01inc">+</a>
              <a class="btn btn-danger" href="clickres.php?i=BBP01dec">-</a>
              
            </div>
          </div>
        </td>
        <td><?php echo $BBPquant; ?></td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Black Ball pen</td>
        <td>BCBP01</td>
        <td>
          <div class="btn-toolbar mb-3" role="toolbar">
            <div class="btn-group me-2" role="group" aria-label="First group">
              <a class="btn btn-success" href="clickres.php?i=BCBP01inc">+</a>
              <a class="btn btn-danger" href="clickres.php?i=BCBP01dec">-</a>
            </div>
          </div>
        </td>
        <td><?php echo $BCBPquant; ?></td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Red Ball pen</td>
        <td>RBP01</td>
        <td>
          <div class="btn-toolbar mb-3" role="toolbar">
            <div class="btn-group me-2" role="group" aria-label="First group">
            <a class="btn btn-success" href="clickres.php?i=RBP01inc">+</a>
            <a class="btn btn-danger" href="clickres.php?i=RBP01dec">-</a>
            </div>
          </div>
        </td>
        <td><?php echo $RBPquant; ?></td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Natraj pencil</td>
        <td>NPL01</td>
        <td>
          <div class="btn-toolbar mb-3" role="toolbar">
            <div class="btn-group me-2" role="group" aria-label="First group">
            <a class="btn btn-success" href="clickres.php?i=NPL01inc">+</a>
            <a class="btn btn-danger" href="clickres.php?i=NPL01dec">-</a>
            </div>
          </div>
        </td>
        <td> <?php echo $NPLquant; ?></td>
      </tr>

    </tbody>
  </table>


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