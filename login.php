<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
     <li class="active"><a href="#">About me</a></li>
      <li><a href="#">Contact me</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Login</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>  
<?php
if (isset($_SESSION["userId"])) {
  echo '<p hello</p>';
}

?>



  <div style="margin-top:20px; margin-left: 500px;"  ><h2 style="color:blue;" >Login in</h2>
  <div class="header-login" >
      <form action="includes/login.inc.php" method="post" >
      <input style="margin-top: 20px;" type="text" name="email" placeholder="Username/Email"> <br>
      <input type="password" name="password" placeholder="Password"> <br>
      <button style="margin-left: 60px;" type="submit" name="login-submit">Login in </button>

      </form>
      </div>
      </div>

  


</body>
</html>