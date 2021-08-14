<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{
  $loggedin= true;
}
else{
  $loggedin=false;
}
echo '
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/ITWS/welcome.php" style="color: violet; font-size: 23px; text-decoration: underline;">SSMS</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
';
        
if(!$loggedin){
        echo
        '<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/ITWS/login.php">LogIn</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/ITWS/signup.php">SignUp</a>
        </li>';}
        
if($loggedin){
       echo '<li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/ITWS/welcome.php">Home<a>
              </li> 
              <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="/ITWS/logout.php">LogOut<a>
              </li>';
        }
      echo '</ul>
      
    </div>
  </div>
</nav>'
?>