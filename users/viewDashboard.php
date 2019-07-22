<?php 
require_once 'modelUser.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$user_logged = isset($user_logged)? $user_logged : $_SESSION['user_logged'];
$id = isset($id)? $id : "";
//$remember_user = isset($remember_user)? $remember_user : "";

if(isset($_SESSION['user_logged'])) {
    if($user_logged) {
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Dashboard</title>
</head>
<body>
<h1>Your movies :</h1>
<?php 
//echo var_dump($id);
echo 'Welcome '.$user_logged->username."!";?>
<br>
<a href="../movies/index.php">Home</a>
<br><br>
<a href="../users/?action=logout&id=<?php echo $id;?>">Logout</a>
<!--<a href="../users/?action=logout&id=<?php// echo $id;?>&remember_user=<?php //echo $remember_user;?>">Logout</a>-->
</body>
</html>
<?php 
    }
} else {
 header("Location:../index.php");
 exit();
}?>