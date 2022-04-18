<?php
  include('session.php');
  include('project_session.php');
?>

<?php

    if (isset($_POST['submit'])) {

      include "connect.php";

      if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
      }else{

        $content = $_POST['content'];
        $pid = $_SESSION['project_id'];
        $uname = $_SESSION['login_user'];

        $entery_check = mysqli_query($conn, "SELECT * FROM entry WHERE pid = '$pid'");
        $num = mysqli_num_rows($entery_check);
        if($num == 1){
          $insert_entry = mysqli_query($conn, "UPDATE entry SET content = '$content'");
          if (!$insert_entry) {
            echo "Try again";
          }else{
            echo "<script>alert('Entry added successfully');</script>";
            header("HTTP/1.1 303 See Other");
            header("location: http://$_SERVER[HTTP_HOST]/Project-Planner/folder/entries.php");
          } 

        }else{
          $insert_entry = mysqli_query($conn, "INSERT INTO entry VALUES('$pid','$content')");
          if (!$insert_entry) {
            echo "Try again";
          }else{
            echo "<script>alert('Entry added successfully');</script>";
            header("HTTP/1.1 303 See Other");
            header("location: http://$_SERVER[HTTP_HOST]/Project-Planner/folder/entries.php");
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
    <link rel="icon" type="img/png" href="../assets/images/pp.png">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/entries.css">

    <style type="text/css">
      input[type=submit]{
        float:right;
        height: 40px;
        width: 20%;
        outline: none;
        font-size: 17px;
        background-color: #5baed4;
        border: 1px solid lightgrey;
        border-radius: 5px;
        transition: all 0.3s ease;
      }
      input[type=submit]:hover {
        background-color: #0d4777;
        color: white;
        cursor: pointer;
      }
      #sidebar{
        z-index: 1;
      }

    </style>
    
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

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
                      if ($row["pname"] == $_SESSION['project']) {
                        echo "<li class='tabs_active'><a href=''>".$row["pname"]."</a></li>";
                      }else{
                        echo "<li><a href='searchProject.php'>".$row["pname"]."</a></li>";
                      }
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
    <div class="content">
      <div class="header1"></div>
      <p>
      <div class="wrapper1">
                    <nav>
                      <button><a id="to" href="to-do.php">To do List</a></button>
                      <button ><a href="tasks.php">Tasks</a></button>
                      <button class="active" ><a href="" class="active">Entries</a></button>
                    </nav>

      </div>

     <div class="dash" >

      <!-- insert hereeee -->
      <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
          <div>
              <textarea cols="250" rows="100" id="content" name="content"> 
                  <?php 
                    include "connect.php";

                    if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                    }else{
              
                      $pid = $_SESSION['project_id'];
                      $uname = $_SESSION['login_user'];
                  
                      $result = mysqli_query($conn, "SELECT * FROM entry where pid = '$pid'");
                      $num = mysqli_num_rows($result);
                      if($num == 1){
                      $row = mysqli_fetch_array($result);
                      echo $row['content'];
                      }
                      else{
                        echo "&lt;h1&gt;Enter your text...&lt;/h1&gt";
                      }
                    }
                  
                  ?>
              </textarea>
              <script type="text/javascript">
                CKEDITOR.replace( 'content' );
                CKEDITOR.config.height = 345; 
              </script>
              <input type="submit" value="SUBMIT" name="submit"/>
              
              
          </div>
      </form>
     </div>
</p>
</div>
<script>
  const mq = window.matchMedia( "(max-width: 768px)" );
  if (mq.matches) {
    document.getElementById("to").text = "To do";
  }
</script>
</body>
</html>