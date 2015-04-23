<?php 
	$task = strip_tags($_POST['task']);
	$date = date('Y-m-d');
	$time = date('H:i:s');

	include ('connect.php');

	$mysqli = new msqli('localhost', 'root', 'root', 'todo2');
//inserts everything into database
	$mysqli ->query("INSERT INTO tasks VALUES ('', '$task', '$date', '$time')");
// Gets Info From Database
	$query = "SELECT * FROM todo2 WHERE task='$task' and date='$date' and time='$time' ";
 ?>