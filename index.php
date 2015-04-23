<!DOCTYPE html>
<html>
<head>
	<title>todo list2</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="wrap">
	<div class="task-list">
		<ul>
		<?php	require("includes/connect.php"); ?>
		</ul>
	</div>
	<form class="add-new-task" autocomplete="off">
		<input type="text" name="new-task" placeholder="Add new item..."/>
		</form>
	</div>
</body>
<script src="http://code.jquery-lastest.min.js"></script>
<script>
	add_task(); //calls the add task function created below

	function add_task() {
		$('.add-new-task').submit(function() {
			var new_task = $('.add-new-task input [name=new-task]').val();

			if (new_task != '') {
				$.post('includes/add-task.php', { task: new_task}, function(data) {
					$('add-new-task input[name=new_task]').val();
					$(data).appendTo('task-list ul').hide().fadeIn();
				});
			}
			return false;
		});
	}

	$('.delete-button').click(function() {
		//variables made
		var current_element = (this);
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