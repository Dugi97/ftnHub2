<?php
require_once 'controllerUsers.php';
require_once '../movies/DAOMovies.php';
$name = isset($name)? $name : "";
$email = isset($email)? $email : "";
$text = isset($text)? $text : "";
$err = isset($err)? $err : "";

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
<link rel="stylesheet" type="text/css" href="../css/contact.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="../js/JavaScript.js"></script>
</head>
<body>
<header>
<div class="topnav">
 <a href="../movies/viewShowAllMovies.php" class="active"><img id="logomini" src="../img/logo.png" alt=""></a>
<div id="myLinks">
	<a class="g" href="../movies/viewShowAllMovies.php">Movies</a> 
	<a class="g" href = "../users/myProfile.php">My profile</a>
	<a class="g" href="#">Actors</a>
	<a class="g" href="../movies/viewShowGenres.php">Show All Genres</a>
	<?php if(!empty($_SESSION['user_logged'])){ ?>
	<a class="g" id="lgt" class="logg">
	<form class="logform" action="../users/" method="get">
	<input class="logout" type="submit" name="action" value="Logout">
	</form>
	</a>
	
	

	<?php } else { ?>
	<a class="g" class="logg" href = "../users/viewLogin.php">Login</a>
	<?php }?>
</div>
<a href="javascript:void(0);" class="icon" onclick="myFunction()">
	<i class="fa fa-bars"></i>
</a>
</div>


<a href="../movies/viewShowAllMovies.php"><img id="logo" alt="logo" src="../img/logo.png"></a>

<nav>
<a class="item" href="../movies/viewShowAllMovies.php">Movies</a>
<a class="item" href = "../users/myProfile.php">My profile</a>
<a class="item">Actors</a>
<a class="item" id="sam" href = "../movies/viewShowGenres.php">Show All Genres</a>
<a class="item" href = "../users/viewContact.php">Contact us</a>
<?php if(!empty($_SESSION['user_logged'])){ ?>
	<a class="logg">
	<form action="../users/" method="get">
	<input class="logout" type="submit" name="action" value="Logout">
	</form>
	</a>
	
	

	<?php } else { ?>
	<a class="logg" href = "../users/viewLogin.php">Login</a>
	<?php }?>
</nav>
<hr>

</header>

<div class="content">
            <div class="contact-title">
                <h1>Say hello</h1>
                <h2>Contact us!</h2>
            </div>
            <div class="contact-form">
                <form id="contact-form" method="POST" action="../users/">
                    <input name="name" type="text" class="form-control" placeholder="Your name" value="<?php echo $name; ?>">
                    <br>
                    <input name="email" type="email" class="form-control" placeholder="Your email" value="<?php echo $email; ?>">
                    <br>
                    <textarea name="message" class="form-control" placeholder="Message" rows="4" value="<?php echo $text; ?>"></textarea>
                    <br>
                    <input type="submit" name="action" class="form-control submit" value="SEND MESSAGE">
                </form> 
                
                <div class="poruka">
                <?php echo $err; ?>
                </div>  
            </div>
</div>

<br><br><br><br>

</div>
<footer>
<?php include '../footer/footer.php'; ?>    
</footer>



</body>
</html>