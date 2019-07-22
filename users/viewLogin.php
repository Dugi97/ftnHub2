<?php 
$msg = isset($msg)? $msg : "";

if (get_magic_quotes_gpc() == true) {
    foreach($_COOKIE as $key => $value) {
        $_COOKIE[$key] = stripslashes($value);
    }
}
$js = isset($_COOKIE["json_cookie"])? $_COOKIE["json_cookie"] : NULL;
$cookie = json_decode($js, true);


?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" type="text/css" href="../css/login.css">
<title>Login</title>
</head>
<body>
<div class="logo">
	<a href="../movies/viewShowAllMovies.php"><img src="../img/logo.png" alt="logo"></a>
</div>
<div class="forma">
<div class="h"><h1>Login</h1></div>
<?php echo $msg;?><br><br>

<form action="../users/" method="post" >
<br><input class="input"  type="text" name="username" placeholder="Username" value="<?php echo $cookie['user'];?>"><br><br>
<br><input class="input"  type="password" name="password" placeholder="Password" value="<?php echo $cookie['pass'];?>"><br><br>

<input type="checkbox" name="remember_user" value="Yes" checked> <span>Remember me</span>
<!--<input type="checkbox" name="remember_user" value="Yes" <?php /*if($remember_user) echo 'checked';*/?>> Remember me	-->
<br><br>
<div class="dugme"><input id="submit" type="submit" name="action" value="Log in"><br><br></div>
</form>

<br><br>
<div class="dole">Nemate nalog?<a href="../users/?action=goregister">Register now</a></div>
</div>

</body>
</html>