<?php
/*inserts navigation code into this php file*/
require_once(__DIR__ . "/../model/config.php");
require_once(__DIR__ . "/../controller/login-verify.php");
require_once(__DIR__ . "/../model/Database.php");
/*does not allow access if user is not authenticated redirects to index*/
	if (!authenticateUser()) {
	header("Location: " . $path . "amit1.php");
		die();
	}
?>
<nav class="menu">
<!--creates un ordered list-->
	<ul>
	<!--list item-->
		<li><a href="<?php echo $path . "post.php"?>"> Blog Post Forum</a></li>
		<li><a href="<?php echo"$path" . "controller/logout-user.php"?>">Logout</a></li>
	</ul>
	</nav>