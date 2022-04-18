<?php
  include('session.php');
  include('project_session.php');
?>

<!-- adding entries -->
  <?php

    if (isset($_POST['add'])) {

      include "connect.php";

      if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
      }else{

        $myentry = $_POST['myentry'];
        $pid = $_SESSION['project_id'];
        $uname = $_SESSION['login_user'];

        // fetching member id
        $result = mysqli_query($conn, "SELECT * FROM user_table WHERE uname = '$uname'");
        while ($row = mysqli_fetch_array($result)) {
          $mid = $row['id'];
        }

        $entery_check = mysqli_query($conn, "SELECT * FROM entries WHERE insertentry = '$myentry'");
        $num = mysqli_num_rows($entery_check);
        if($num == 1){
          echo "<script>alert('Entry exists');</script>";
          header("HTTP/1.1 303 See Other");
          header("location: http://$_SERVER[HTTP_HOST]/project-planner/folder/to-do.php");
        }else{
          $insert_entry = mysqli_query($conn, "INSERT INTO entries VALUES('$pid','$mid','$myentry',0)");
          if (!$insert_entry) {
            echo "Try again";
          }else{
            echo "<script>alert('Entry added successfully');</script>";
            header("Refresh:0; url=to-do.php");
            // header("HTTP/1.1 303 See Other");
            // header("location: http://$_SERVER[HTTP_HOST]/project-planner/folder/to-do.php");
          } 
        }
      }
    }

    if (isset($_POST['sub'])) {
        include "connect.php";
        // $todo = $_POST['all'];
        $pid = $_SESSION['project_id'];
        $checkbox1=$_POST['techno'];  
        $chk = "";
        foreach ($checkbox1 as $chk1) {
          $chk = $chk1;
          mysqli_query($conn, "UPDATE entries SET checked='1' where pid = '$pid' and insertentry = '$chk'");
        }
            header("HTTP/1.1 303 See Other");
            header("location: http://$_SERVER[HTTP_HOST]/project-planner/folder/to-do.php");
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
    <link rel="stylesheet" type="text/css" href="../assets/css/entries.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style type="text/css">
      .entry{
        margin-left: 50px;
        cursor: pointer;
      }
      .check{
        padding-left: 50px;
      }
      .input-group{
        padding: 20px;
        margin: 10px;
        background-color: #f6f6f6;
      }
      input[type=checkbox]:checked + span{
        text-decoration: line-through;
      }
      input[type=text]{
        border: 2px solid #d2cfc8; 
        height: 50px; 
        width: 84.5%; 
        padding: 10px; 
        font-size: 17px;
      }
      

      input[type=submit]{
        margin-left: 40%;
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

    .addBtn input{
        float: right;
        width: 15%;
        background-color: #0d4777;
        color: white;
        text-align: center;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
        border-radius: 0;
        height: 50px;
        margin: 5px;
      }
      
      .addBtn input:hover {
        
        background: #5baed4;
        color: white;
      }


      #sidebar{
        z-index: 1;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <input type="checkbox" id="btn" hidden>
      <label for="btn" class="menu-btn">
        <i class="fas fa-bars"></i>
        <i class="fas fa-times"></i>
      </label>
      <nav id="sidebar">
        <div class="title"><img src="" style="width: 10%; margin-top: 7%;">Project Planner</div>
        <ul class="list-items">
          <li><a href="newProject.php">Home</a></li>
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
                      <button class="active"><a id="to" href="" class="active">To do list</a></button>
                      <button ><a href="tasks.php">Tasks</a></button>
                      <button ><a href="entries.php">Entries</a></button>
                    </nav>

      </div>

     <div class="dash" style="height: 100vh">

     
     <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="text" name="myentry" placeholder="Add entry...">
            <div class="addBtn"><input type="submit" name="add" value="ADD" style="margin-top:-50px"></div>
      </form>

      <!-- displaying entries -->
        <table style="margin-top: 2%;">
            <tr>
            <!-- <th>Tasks</th> -->
            </tr>
            <?php
            include "connect.php";

            $pid = $_SESSION['project_id'];

            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }else{
              $sql = "SELECT * FROM entries where pid = '$pid'";

              $result = mysqli_query($conn, $sql);

              if (!$result) {
                echo "<span>0 results</span>"; 
              } else { 
                // output data of each row
                echo "<table>";
                while($row = $result->fetch_assoc()) {
                  ?>
                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method='post'>
                  <?php
                    echo "<div class='input-group'>";
                    echo "<input type='checkbox' value='".$row["insertentry"]."' name='techno[]' class='entry'";
                    if ($row['checked']) echo "checked='checked'";
                    echo">" . "<span class='check'>" . $row["insertentry"]."</span></div>";
                }
                echo "<input type='submit' name='sub' value='UPDATE'></form>";
              }
              $conn->close();
            }
            ?>
        </table>
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