<?php

  include('session.php');
  if (isset($_POST['submit'])) {

    include "connect.php";

    $pname = trim($_POST['pname']);
    $ppass = $_POST['ppass'];
    $login_user = $_SESSION['login_user'];

    // check if project exists
    $pro_check = mysqli_query($conn, "SELECT * from project_table where pname = '$pname'");

    if(mysqli_num_rows($pro_check) == 1){
      $_SESSION['error'] = "Project name already exists";
      header('location:project-form.php');
    }else{
      $result = mysqli_query($conn, "insert into project_table(id,pname, ppass) values(NULL,'$pname', '$ppass')");
      if (!$result) {
        echo "errorrrrrrrrrrrrr";
      }else{
        $_SESSION['project'] = $pname;

        $pro_check1 = mysqli_query($conn, "SELECT * from project_table where pname = '$pname'");
        while ($row = mysqli_fetch_array($pro_check1)) {
          $project_id = $row['id'];
        }
        $_SESSION['project_id'] = $project_id;

        // adding member to the member_table after opening a project
          $result1 = mysqli_query($conn, "INSERT INTO member_table VALUES ('$project_id', '$login_user')");

          if (!$result1) {
            echo "errorrrrrrrrrrrrr";
          }else{
            header('location:to-do.php');
          }
      }
    }
  }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Dashboard | Project Planner</title>
    <script type="text/javascript" src="validations.js"></script>
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
        <li><a href="newProject.php">HOME</a></li>
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
    <div class="projCreate">
      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" name="pro" onsubmit="return validateform()">
        <div class="fieldp">
          <input type="text" name="pname" required>
          <label>Project Name</label>
        </div>
        <div class="fieldp">
          <input type="password" name="ppass" required>
          <label>Project Password</label>
        </div>
        <div>
          <p style="padding: 10px; text-align: center; padding-top: 10%;"><?php
            if(isset($_SESSION['error'])){
              echo($_SESSION['error']);
            }
          ?></p>
        </div>
        <div class="fieldp" id="log">
          <input type="submit" name="submit" value="CREATE">
        </div>
      </form>

</div>

<script type="text/javascript">
  function validateform(){
    var illegalChars = /^((?=.*[\W])(?=.*[!@#$%^&*]))$/; 
    var proname = document.forms["pro"]["pname"].value;
    var propass = document.forms["pro"]["ppass"].value;

    proname = proname.trim();
    if (proname.length < 3) {
      alert("Project Name must contain more than 3 characters");
      return false;
    }

    propass = propass.trim();
    if (propass.trim < 6) {
      alert("Project password must contain more than 6 characters");
      return false;
    }

    if ((propass.search(/[a-z]+/)==-1) || (propass.search(/[0-9]+/)==-1) || (propass.search(/[A-Z]+/)==-1)) {
      alert("Project password must contain atleast one numeral, one Capital and one small letter.");
      return false;
    }
  }
</script>
</body>
</html>