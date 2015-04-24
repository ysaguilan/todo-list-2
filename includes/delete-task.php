<?php 
$task_id = strip_tags($_POST["id"]);
require('connect.php');
$mysqli = new mysqli('localhost', 'root', 'root', 'todo2');
//deletes results in query where = task_id
if ($result = $mysqli->query("DELETE FROM tasks WHERE id='task_id'")) {
	
	}	
 ?>