<?php
  include('session.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Dashboard | Project Planner</title>
    <link rel="icon" type="img/png" href="../assets/images/pp.png">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <input type="checkbox" id="btn" hidden>
      <label for="btn" class="menu-btn">
        <i class="fas fa-bars"></i>
        <i class="fas fa-times"></i>
      </label>
      <nav id="sidebar">
        <div class="title">Project Planner</div>
        <ul class="list-items">
          <li style="background-color: #215f92"><a href="newProject.php">HOME</a></li>
              <?php
                include "connect.php";

                $uname = $_SESSION['login_user'];

                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }else{
                  $result = mysqli_query($conn, "SELECT p.pname FROM project_table p,member_table m where p.id = m.pid and member = '$uname'");

                  if (!$result) {
                      echo "<li><a href='newProject.php'>Select Project</a></li>";
                  } else { 
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<li><a href='searchProject.php'>".$row["pname"]."</a></li>";
                    }
                  }
                  $conn->close();
                }
                ?>
          <li><a href="logout.php">LOGOUT</a></li>

            <div style="position: fixed;left: 4px;bottom: 0;">
              <p>Made with &hearts; by <a href="https://github.com/nikita24383/">Nikita</a> &amp; <a href="https://github.com/AmrutaKoshe/">Amruta</a></p>
            </div>
            
        </ul>
      </nav>
    </div>
    <div class="content1">
        <button class="create" type="button" onClick="parent.location='project-form.php'">Create New Project</button>
        <br>
        <p>OR</p>
        <br>
        <button class="create" type="button" onClick="parent.location='searchProject.php'">Search for existing Project</button>
  </div>
</div>
</body>
</html>