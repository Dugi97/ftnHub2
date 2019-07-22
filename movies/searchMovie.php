<?php
$ttl = isset($_GET['keyword'])? $_GET['keyword'] : "";
$msg = isset($msg)? $msg : "";
$mvs = isset($mvs)? $mvs : "";
$message = isset($message)? $message : "";
$a = isset($a)? $a : "";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Insert title here</title>
<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/home.css">
</head>
<body>
<form class="searchbar" action="../movies/" method="GET">
<input type="text" name="keyword" placeholder=" Type..." value="<?php echo $ttl;?>">
<input type="submit" name="action" value="Search"> 

</form>
</body>
</html>