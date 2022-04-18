<?php

if(isset($_POST['submit'])){
  session_start();

  $conn = mysqli_connect('localhost','root','','project_planner');
  $port = '3307';

  $name = $_POST['full_name'];
  $user = $_POST['username'];
  $pass = $_POST['password'];

  $s = "select * from user_table where uname = '$user'";

  $result = mysqli_query($conn, $s);
   
  $num = mysqli_num_rows($result);

  if($num == 1){
    echo "<script> alert('username already taken'); </alert>";
  }else{
    $reg = "insert into user_table(name, uname, upass) values('$name', '$user' , '$pass')";
    mysqli_query($conn, $reg);
    $_SESSION['login_user'] = $user;
    // echo "registraion successful";
    header('location:folder/newProject.php');
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Project Planner</title>
    <link rel="icon" type="img/png" href="assets/images/pp.png">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- Custom styles for this template -->
  <link href="assets/css/landing-page.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="assets/css/Register.css">

  <!-- validations -->
  <script type="text/javascript" src="folder/validations.js"></script>
  <style type="text/css">
    .head1{
      background-image: url('');
      height: 100vh;
    }
    span{
      font-size: 4rem;
      font-weight: 1000;
      text-shadow: 8px 8px 2px #cbcbcb;
    }
    .wrapper{
      margin-top: 5rem;
    }
    @media screen and (max-width: 768px){
      .left,.wrapper{
        display: block;
        margin-bottom: 5rem;
      }
      .wrapper{
        margin-left: -5rem;
      }
      #feature{
        margin-top: 25rem;
      }
    }
    a{
      color: black;
    }
    .bg-t{
      background-color: #eff2f8;
    }
    .active { 
      background-color: #fff
    }
  </style>

</head>

<body>
  <!-- Navigation-->
        <nav class="navbar navbar-expand-lg fixed-top bg-t" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="" alt="" />Project Planner</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item mx-4"><a class="nav-link js-scroll-trigger" href="#feature">Features</a></li>
                        <li class="nav-item mx-4"><a class="nav-link js-scroll-trigger" href="#info">Information</a></li>
                        <li class="nav-item mx-4"><a class="nav-link js-scroll-trigger" href="#team">Team</a></li>
                        <li class="nav-item mx-4"><a class="nav-link js-scroll-trigger" href="#code">Code</a></li>
                    </ul>
                </div>
            </div>
        </nav>

  <!-- Masthead -->
  <section class="features-icons text-justify col-lg-12 mt-5" style="height: 100vh">
    <div class="left col-lg-6 mt-5 ml-2" style="display: inline-block;">
      <span class="text-uppercase">Project&nbsp;&nbsp;</span><span class="text-uppercase">Planner</span>
      <p class="mt-5">A website to plan your projects effortlessly! This project planner lets you manage your projects with ease, keeping a track of all your changes with an integrated MySQL database. Users can join/create multiple projects at a time and switch easily between the projects! Each project is protected with a username and password. The project layout consists of a dashboard with options to create entries, make to-do lists or assign tasks. </p>
    </div>
    <div class="wrapper" style="display: inline-block;">
          <div class="title">Register Form</div>
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="register" onsubmit="return validateform()">
              <div class="field">
                <input type="text" name="full_name" required>
                <label>Name</label>
              </div>
              <div class="field">
                <input type="text" name="username" required>
                <label>Username</label>
              </div>
              <div class="field">
                <input type="password" name="password" required>
                <label>Password</label>
              </div>
              <div class="field" id="log"><input name="submit" type="submit" value="Register"></div>
              <div class="signup-link">Already a member? <a href="folder/login.php">Login now</a></div>
            </form>
          </div>
  </section>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center col-lg-12" id="feature">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fa fa-code m-auto text-primary"></i>
            </div>
            <h3>Join Multiple Projects</h3>
            <p class="lead mb-0">Work on multiple projects at a time in an organised fashion.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fa fa-tasks m-auto text-primary"></i>
            </div>
            <h3>Assign Tasks Easily</h3>
            <p class="lead mb-0">Allocate tasks to different group members with ease!</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fa fa-check m-auto text-primary"></i>
            </div>
            <h3>Easy to Use</h3>
            <p class="lead mb-0">User-friendly interface with a systematic dashboard for perfect planning!</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Image Showcases -->
  <section class="showcase" id="info">
    <div class="container-fluid p-0">
      <div class="row no-gutters">

        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('assets/images/bg-showcase-1.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Join Multiple Projects</h2>
          <p class="lead mb-0">Don't let your ideas die! Plan multiple projects at a time and switch easily with just a click! Each project is protected with a username and password to avoid those intruders!</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url('assets/images/bg-showcase-2.jpg');"></div>
        <div class="col-lg-6 my-auto showcase-text">
          <h2>Assign Tasks Easily</h2>
          <p class="lead mb-0">Working on a project with a group? Distribute tasks among your group members and easily store it in your project planner</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('assets/images/bg-showcase-3.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Easy to Use</h2>
          <p class="lead mb-0">Manage your project effortlessly! Organize your ideas by adding entries, maintaining to-do lists and dividing tasks with a simple click!</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="testimonials text-center bg-light col-lg-12" id="team">
    <div class="container">
      <h2 class="mb-5">Team</h2>
      <div class="row">
        <div class="col-lg-6">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="assets/images/nikita.jpg" alt="">
            <h3><a href="https://github.com/nikita24383/">Nikita Sarode</a></h3>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="assets/images/amruta.jpg" alt="">
            <h3><a href="https://github.com/AmrutaKoshe/"> Amruta Koshe</a></h3>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer col-lg-12" id="code">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <p class="text-muted small mb-4 mb-lg-0">Made with &hearts; by <a href="https://github.com/nikita24383/">Nikita</a> &amp; <a href="https://github.com/AmrutaKoshe/">Amruta</a>&amp; <a href="https://github.com/nidhivanjare/">Nidhi</a></p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <a href="https://github.com/AmrutaKoshe/Project-Planner" target="_blank">
                <i class="fab fa-github fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script type="text/javascript">
    $(function() {
    $(window).on("scroll", function() {
        if($(window).scrollTop() > 700) {
          if ($(window).width() > 768) {
            $(".bg-t").addClass("active");
          }else{
            $(".bg-t").removeClass("active");
          }
        } else {
           $(".bg-t").removeClass("active");
        }
    });
  });
  </script>

</body>

</html>
