<?php
    require_once(__DIR__ . "/../model/config.php");
?>

<h1>Login</h1>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <meta name="viewport" content="minimal-ui, width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> 

<form method="POST" action="<?php echo $path . "controller/login-user.php"; ?>">
    <div>
        <label for="username">Username: </label>
        <input type="text" name="username"/>
    </div>
    
    <div>
        <label for="password">Password: </label>
        <input type="password" name="password"/>
    </div>
    
    <div>
        <input type="hidden" name="login" value="login" />
        <button type="submit">Submit</button>
    </div>
</form>

