<div class="footer-distributed">

        <div class="footer-right">
        <?php 
        
        if(!empty($_SESSION['user_logged']->username) && $_SESSION['user_logged']->username=="admin"){ ?>
        Logged in as <a id="loggedas" href="../users/viewAdmin.php"><?php echo $_SESSION['user_logged']->username; ?></a>
        <?php } 
        else if(!empty($_SESSION['user_logged'])) {?>
        Logged in as <a id="loggedas" href="../users/myProfile.php"><?php echo $_SESSION['user_logged']->username; ?></a>    
	    <?php }
	    else {?>
	    	<a id="logg" href = "../users/viewLogin.php">Login</a>
	    <?php } ?>
        </div>

        <div class="footer-left">

            <p class="footer-links">
                <a href="../movies/viewShowAllMovies.php">Movies</a>
                &#8231;
                <a href="../users/myProfile.php">Movies</a>
                &#8231;
                <a href="#">Actors</a>
                &#8231;
                <a href="../movies/viewShowGenres.php">Show all genres</a>
                &#8231;
                <a href="../users/viewContact.php">Contact Us</a>
            </p>
            <hr id="fhr">

            <p>Project work &copy; 2019</p>
        </div>

    </div>
