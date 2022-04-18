<?php
  include('session.php');
  include('project_session.php');
?>

<?php

    if (isset($_POST['add_task'])) {

      include "connect.php";

      if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
      }else{

        $task = $_POST['task'];
        $member = $_POST['member'];
        $pid = $_SESSION['project_id'];
        $uname = $_SESSION['login_user'];

        // fetching member id
        $result = mysqli_query($conn, "SELECT * FROM user_table WHERE uname = '$uname'");
        while ($row = mysqli_fetch_array($result)) {
          $mid = $row['id'];
        }

        $entery_check = mysqli_query($conn, "SELECT * FROM member_task WHERE mtask = '$task'");
        $num = mysqli_num_rows($entery_check);
        if($num == 1){
          echo "<script>alert('Task exists');</script>";
          header("HTTP/1.1 303 See Other");
          header("location: http://$_SERVER[HTTP_HOST]/project-planner/folder/tasks.php");
        }else{
          $insert_task = mysqli_query($conn, "INSERT INTO member_task VALUES('$pid','$mid','$task')");
          echo $pid.$mid.$task;
          if (!$insert_task) {
            echo "<script>alert('Try again');</script>";
            // header("Refresh:0; url=tasks.php");
          }else{
            header("Refresh:0; url=tasks.php");
            echo "<script>alert('Task added successfully');</script>";
            
           
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
    <link rel="icon" type="img/png" href="../assets//images/pp.png">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/entries.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style type="text/css">
      input[type=text]{
        width: 40%;
        height: 45px;
        font-size: 13.3333px;
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
                        echo "<li class='tabs_active'><a href='newProject.php'>".$row["pname"]."</a></li>";
                      }else{
                        echo "<li><a href='newProject.php'>".$row["pname"]."</a></li>";
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
                      <button><a id="to" href="to-do.php">To do list</a></button>
                      <button class="active"><a href="" class="active">Tasks</a></button>
                      <button ><a href="entries.php">Entries</a></button>
                    </nav>
     </div>

     <div class="dash">

        <table>
            <tr>
              <th>Task</th>
              <th>Member</th>
            </tr>
            <?php
              include "connect.php";

              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }else{
                $pid = $_SESSION['project_id'];
                $result = mysqli_query($conn, "SELECT * FROM member_task where pid = '$pid'");

                if (!$result) {
                  echo "0 results";
                } else { 
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["mtask"]. "</td><td>" . $row["mid"] . "</td></tr>";
                  }
                  echo "</table>";
                }
                $conn->close();
              }
            ?>
        </table>

        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
            <input style="margin-top: 16%;" class="assigntask" type="text" placeholder="Enter Task" name="task" required><br>
            <!-- <input class="assigntask" type="text" placeholder="Enter Member" name="member" required><br> -->
                <select class="assigntask" type="text" name="member" required>
                  <option>Select Member</option>
                      <?php

                        include "connect.php";
                        $pid = $_SESSION['project_id'];
                        $result = mysqli_query($conn, "SELECT * from member_table WHERE pid = '$pid'");
                        while($rows = mysqli_fetch_array($result)){
                      ?>
                      <option value="<?php echo $rows['member']; ?>"> <?php echo $rows['member']; ?></option>
                      <?php
                        }
                      ?>
                  </select>
            <div class="task" id="log"><input type="submit" name="add_task" value="ASSIGN TASK"></div>
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