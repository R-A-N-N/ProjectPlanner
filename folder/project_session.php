<?php
   $db = mysqli_connect('localhost','root','','project_planner');
   
   $project_check = $_SESSION['project'];
   
   $ses_sql = mysqli_query($db,"select pname from project_table where pname = '$project_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['pname'];
   
   if(!isset($_SESSION['project'])){
      header("location:newProject.php");
      die();
   }
?>