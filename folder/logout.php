<?php

session_start();
session_destroy();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Project Planner | Logout</title>
    <link rel="icon" type="img/png" href="../assets/images/pp.png">
		<!-- Bootstrap core CSS -->
	  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	  <!-- Custom fonts for this template -->
	  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
	  <link href="../vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
	  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	<style type="text/css">
		body{
			background-color: #eff2f8;
		}
		h2{
			margin-top: 100px; text-align: center; color: #5194b3; font-size: 50px
		}
		div{
			margin-top: 100px; text-align: center;
		}
		button{
			height: 50px; width: 100px; background-color: #b6c3f6;font-size: 18px;
		}
		button:hover{
			color: #b6c3f6;
			background-color: #021f92;
		}
	    span{
	    	text-align: center;
	      	font-size: 4rem;
	      	font-weight: 1000;
	      	text-shadow: 8px 8px 2px #cbcbcb;
	    }
	</style>
</head>
<body>
	<div>
		<span>PROJECT&nbsp;&nbsp;</span><span>PLANNER</span>
	</div>
	<div>
		<button onclick="window.location='login.php'">Login</button>
	</div>

	<footer class="footer col-lg-12 fixed-bottom my-3" id="code">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <p class="text-muted small mb-4 mb-lg-0">Made with &hearts; by <a href="https://github.com/nikita24383/">Nikita</a> &amp; <a href="https://github.com/AmrutaKoshe/">Amruta</a></p>
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
</body>
</html>