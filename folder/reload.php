<?php
	header("HTTP/1.1 303 See Other");
    header("location: http://$_SERVER[HTTP_HOST]/project-planner/folder/to-do.php");
?>