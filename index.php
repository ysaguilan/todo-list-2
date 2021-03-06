<!DOCTYPE html>
<?php 
require_once(__DIR__ . "/model/config.php")
 ?>
<html>
<head>
	<title>todo list2</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<meta name="viewport" content="minimal-ui, width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> 

</head>
<header>
<div class="links">

	<a href="<?php echo $path . "register.php"?>">register</a>


	<a href="<?php echo $path . "login.php"?>">Login</a>

	<a href="<?php echo $path . "controller/logout-user.php"?>">Logout</a>

</div>
</header>
<body>
	<div class="wrap">
	<div class="task-list">
		<ul>
		<?php	require("includes/connect.php");
		$mysqli = new mysqli('localhost', 'root', 'root', 'todo2');
		//ASC = ascending
		$query = "SELECT * FROM task ORDER BY  date ASC, time ASC";
		if ($result = $mysqli->query($query)) {
			$numrows = $result->num_rows;
			if ($numrows>0) {
				while ($row = $result->fetch_assoc()) {
					$task_id = $row['id'];
					$task_name = $row['task'];

				echo '<li>
				<span>' . $task_name . '</span>
				<img id="' . $task_id . '" class="delete-button" width= "10px" src="images/close.svg">
				</li>';
				}
			}
		}
		?>
		</ul>
	</div>
	<form class="add-new-task" autocomplete="off">
		<input type="text" name="new-task" placeholder="Add new item..."/>
		</form>
	</div>
</body>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script>
	add_task(); //calls the add task function created below

	function add_task() {
		$('.add-new-task').submit(function() {
			var new_task = $('.add-new-task input[name=new-task]').val();

			if (new_task != '') {
				$.post('includes/add-task.php', { task: new_task}, function(data) {
					$('add-new-task input[name=new-task]').val();
					$(data).appendTo('.task-list ul').hide().fadeIn();
				});
			}
			return false;
		});
	}

	$('.delete-button').click(function() {
		//variables made
		var current_element = $(this);
		var task_id = $(this).attr('id');
//calls created variables
		$.post('includes/delete-task.php', {id: task_id}, function() {
		current_element.parent().fadeOut("fast", function() {
			$(this).remove();
			});
		});
	});

</script>
</html>