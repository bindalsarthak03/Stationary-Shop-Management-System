<?php

require_once 'Partials/_dbconnect.php';

session_start();
$email = $_SESSION['email'];
$identity = $_GET['i'];
if($identity== 'BBP01inc'){
$sql = "UPDATE users SET BBP01=BBP01+1 WHERE email='$email'" ;
}
else if($identity== 'BBP01dec'){
    
    $sql = "UPDATE users SET BBP01=BBP01-1 WHERE email='$email'" ;
}

if($identity== 'BCBP01inc'){
    $sql = "UPDATE users SET BCBP01=BCBP01+1 WHERE email='$email'" ;
}
else if($identity== 'BCBP01dec'){
        
        $sql = "UPDATE users SET BCBP01=BCBP01-1 WHERE email='$email'" ;
}
if($identity== 'RBP01inc'){
    $sql = "UPDATE users SET RBP01=RBP01+1 WHERE email='$email'" ;
}
else if($identity== 'RBP01dec'){
        
        $sql = "UPDATE users SET RBP01=RBP01-1 WHERE email='$email'" ;
}

if($identity== 'NPL01inc'){
    $sql = "UPDATE users SET NPL01=NPL01+1 WHERE email='$email'" ;
}
else if($identity== 'NPL01dec'){
        
        $sql = "UPDATE users SET NPL01=NPL01-1 WHERE email='$email'" ;
}   


$res = mysqli_query($conn, $sql);

if($res){
    header('location: welcome.php' );
}
else{
    echo 'error';
}



?>