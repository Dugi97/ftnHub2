<?php 
$msg = isset($msg)? $msg : "";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="../css/register.css">
<title>Register</title>
</head>
<body>
<div class="logo">
	<a href="../movies/viewShowAllMovies.php"><img src="../img/logo.png" alt="logo"></a>
</div>
<div class="forma">
    <div class="register">
        <div class="h">
            <h1>Create account</h1>
        </div>
        <?php echo $msg;?><br><br>
        <form action="../users/" method="post">
            <br><input class="input" type="text" name="username" placeholder="Username"><br><br>
            <br><input class="input" type="password" name="password" placeholder="Password"><br><br>
            <br><input class="input" type="password" name="password_c" placeholder="Repeat password"><br><br>
        <div class="dugme"><input id="submit" type="submit" name="action" value="Register"></div>
        </form>
        <br><br>
        <div class="dole">Već ste registrovani?<a href="../users/viewLogin.php">Back to login</a></div>
    </div>
</div>

</body>
</html>