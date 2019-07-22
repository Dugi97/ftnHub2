<div class="topnav">
 <a href="../movies/viewShowAllMovies.php" class="active"><img id="logomini" src="../img/logo.png" alt=""></a>
<div id="myLinks">
	<a class="g" href="../movies/viewShowAllMovies.php">Movies</a>
	<a class="g" href="#">Actors</a>
	<a class="g" href="../movies/viewShowGenres.php">Show All Genres</a>
	<?php if(!empty($_SESSION['user_logged'])){ ?>
		<a class="g" href = "../users/myProfile.php">Watchlist</a>
	
	<a class="g" id="lgt" class="logg">
	<form class="logform" action="../users/" method="get">
	<input class="logout" type="submit" name="action" value="Logout">
	</form>
	</a>
	
	

	<?php } else { ?>
	<a class="g" class="logg" href = "../users/viewLogin.php">Login</a>
	<?php }?>
	<a class="g" id="sb2"><?php include '../movies/searchMovie.php';?></a>
</div>
<a href="javascript:void(0);" class="icon" onclick="myFunction()">
	<i class="fa fa-bars"></i>
</a>
</div>


<a href="../movies/viewShowAllMovies.php"><img id="logo" alt="logo" src="../img/logo.png"></a>

<nav>
<a class="item" href="../movies/viewShowAllMovies.php">Movies</a>
<a class="item">Actors</a>
<a class="item" id="sam" href = "../movies/viewShowGenres.php">Show All Genres</a>
<a class="item" href = "../users/viewContact.php">Contact us</a>
<a class="item" href = "../users/myProfile.php">Watchlist</a>
<a class="sb" id="sb2"><?php include '../movies/searchMovie.php';?></a>
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



