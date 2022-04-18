<?php

if (isset($_POST['submit'])) {
  session_start();

  include "connect.php";

  if($conn->connect_error) {
    die("connection error".$conn->connect_error);
  }else{
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $query = "select * from user_table where uname = '$user' && upass = '$pass'";

    $result = mysqli_query($conn, $query);

    $num = mysqli_num_rows($result);

    if($num == 1){
        $_SESSION['login_user'] = $user;
        header('location: newProject.php');
    }else{
      $_SESSION['login_error'] = 'Try again';
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Planner | Login</title>
    <link rel="icon" type="img/png" href="../assets/images/pp.png">
      <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
    <div class="wrapper">
      <div class="title">Login Form</div>
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="field">
          <input type="text" name="username" required>
          <label>Username</label>
        </div>
        <div class="field">
          <input type="password" name="password" required>
          <label>Password</label>
        </div>
        <div>
          <p style="padding: 10px; text-align: center; padding-top: 1%;"><?php
            if(isset($_SESSION['login_error'])){
              echo($_SESSION['login_error']);
            }
          ?></p>
        </div>
        <div class="field" id="log"><input name="submit" type="submit" value="LOGIN"></div>
        <div class="signup-link">Not a member? <a href="../index.php">Signup now</a></div>
    </form>
    </div>

    <footer class="footer col-lg-12 fixed-bottom my-3" id="code">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <p class="text-muted small mb-4 mb-lg-0">Made with &hearts; by <a href="https://github.com/nikita24383/">Nikita</a> &amp; <a href="https://github.com/AmrutaKoshe/">Amruta</a></p>
        </div>
        <!-- <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <a href="https://github.com/AmrutaKoshe/Project-Planner" target="_blank">
                <i class="fab fa-github fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div> -->
      </div>
    </div>
  </footer>
</body>
</html>