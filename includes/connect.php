<?php 
$mysqli = new mysqli("localhost", "root", "root", "todo2");
// if connect error connection dies
if ($mysqli->connect_error) {
	die('Connect error ( ' . $mysqli->connect_errno . ')'
	. $mysqli->connect_error);
}
else {
	//echo "connection made";
}
$mysqli->close();
?>
