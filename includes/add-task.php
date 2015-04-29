<?php 
	$task = strip_tags($_POST['task']);
	$date = date('Y-m-d');
	$time = date('H:i:s');

	include ('connect.php');

	$mysqli = new mysqli('localhost', 'root', 'root', 'todo2');
//inserts everything into database
	$mysqli->query("INSERT INTO task VALUES ('', '$task', '$date', '$time')");
// Gets Info From Database
	$query = "SELECT * FROM todo2 WHERE task='$task' and date='$date' and time='$time' ";
//takes result of query
	if ($result = $mysqli->query($query)) {
		while ($row = $result->fetch_assoc()) {
			$task_id = $row['id'];
			$task_name = $row["task"];
		}
	}

	$mysqli->close();

	echo '<li><span>' . $task_name . '</span><img id="' . $task_id . '" class="delete-button" width="10px" src="images/close.svg" /></li>';
 ?>