<?php
require_once '../users/controllerUsers.php';
require_once '../users/DAOUsers.php';
require_once '../movies/DAOMovies.php';
require_once '../movies/controllerMovies.php';


$idsearch = isset($_GET['MovieID'])? $_GET['MovieID'] : "";
$dao = new DAOMovies();
$mv = $dao->getMovieByID($idsearch);
$ms = isset($ms)? $ms : "";
$actors = $dao->getActorsByMovieId($mv['MovieID']);
$average = $dao->getAverageRate($mv['MovieID']);
$mvz = $dao->getAllByGenreName($mv['GenreName'], $mv['MovieID']);
$aa=$dao->getCommentByMovieID($mv['MovieID']);

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>  
<script type="text/javascript" src="../js/JavaScript.js"></script>

</head>

<header>
<?php include '../header/header.php'; ?>
</header>

<div class="grid">

<div class="genres"><?php include '../movies/viewShowGenresSidebar.php';?></div>

<div class="movieinfo">
<div class="grid2">
<div class="grid2element">
<div class="infoheight">

<iframe width="560" height="315" src="<?php echo $mv['ytlink'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<h2><?php echo $mv['Title']; ?></h2> 

<div class="addmovie">
<form method="get" action="../users/myProfile.php">
<input type="hidden" name="MovieID" value="<?php echo $mv['MovieID']?>"> <br>
<input type="submit" name="Add" value="Add to watchlist"> 
</form>
</div>
<strong>Movie ID : </strong><?php echo $mv['MovieID']; ?> <br>
<strong>Genre : </strong><?php echo $mv['GenreName']; ?><br>
<strong>Release Year: </strong><?php echo $mv['ReleaseYear']; ?><br>
<strong>Plot : </strong><?php echo $mv['Plot']; ?><br>
<strong>Movie Length : </strong><?php echo $mv['MovieLength']; ?><br>
<div class="rate"><strong><i class="fa fa-star" aria-hidden="true"></i> </strong><?php echo $average['rate'];?>
</div>

<?php if(!empty($_SESSION['user_logged'])){?>
<form class="rating" action="../movies/" method="get">
    <legend>Rate movie:</legend>
    <input type="radio" id="star10" name="rate" value="10" /><label for="star10" >10 star</label>
    <input type="radio" id="star9" name="rate" value="9" /><label for="star9" >9 star</label>
    <input type="radio" id="star8" name="rate" value="8" /><label for="star8" >8 star</label>
    <input type="radio" id="star7" name="rate" value="7" /><label for="star7" >7 star</label>
    <input type="radio" id="star6" name="rate" value="6" /><label for="star6" >6 star</label>
    <input type="radio" id="star5" name="rate" value="5" /><label for="star5" >5 stars</label>
    <input type="radio" id="star4" name="rate" value="4" /><label for="star4" >4 stars</label>
    <input type="radio" id="star3" name="rate" value="3" /><label for="star3" >3 stars</label>
    <input type="radio" id="star2" name="rate" value="2" /><label for="star2" >2 stars</label>
    <input type="radio" id="star1" name="rate" value="1" /><label for="star1" >1 star</label>
    <input type="hidden" name="MovieID" value="<?php echo $mv['MovieID']?>">
    <input type="hidden" name="action" value="Rate">
</form>
</div>

<div class="textrate">
<?php }
echo $ms;
?>
</div>

<div class="actors">
<table class="actortable" align="center" border ="1">
<tr>
	<th colspan="3"><h2>Cast</h2></th>
</tr>
<tr>
	<th>Picture</th>
	<th>Actor Name</th>
	<th>Actor Name in Movie</th>
</tr>
<?php foreach ($actors as $act) {?>
<tr>
	<td></td>
	<td><?php echo $act['Fullname'];?></td>
	<td><?php echo $act['Role'];?></td>
</tr>
<?php }?>
</table>
<!-- <a id="back" href = '../movies/viewShowAllMovies.php'>Back</a> -->
</div>



</div>

<div class="similarmovies">
<h2>More Like This</h2>
<div>
<?php 
if(!empty($mvz)){
    foreach ($mvz as $m){ ?>
        <div class="movies">
	<a href="../movies/?action=MovieInfo&MovieID=<?php echo $m['MovieID']?>"><div><img id="thumb" src="../images/<?php echo $m['picture']?>"></div></a>
			<strong>Movie ID :</strong> <?php echo $m['MovieID'];?> <br>
			<strong>Title :</strong> <?php echo $m['Title'];?> <br>
			<strong>Genre Name :</strong> <?php echo $m['GenreName'];?> <br>
			<strong>Release Year :</strong> <?php echo $m['ReleaseYear'];?> <br>
			<strong>Movie Length :</strong> <?php echo $m['MovieLength'];?> <br>
			<?php $average = $dao->getAverageRate($m['MovieID']);?>
			<div class="rate"><strong><i class="fa fa-star" aria-hidden="true"></i> </strong><?php echo $average['rate'];?></div>
		</div>
<?php } }
else {
    $msg = "No movies to show !";
}
?><div id="msg"><?php echo $msg;?></div>
</div>

</div>


</div>

<div class="comments">

<?php if (empty($_SESSION['user_logged']->username)){ ?>
    <div style="display: none;">
    
<?php } ?>
<form class="commentform" action="../movies/" method="get">

<textarea rows="4" cols="50" placeholder="Type a comment..." name="comment"></textarea>
<input type="hidden" name="MovieID" value="<?php echo $mv['MovieID'];?>"> <br>
<input type="hidden" name="UserID" value="<?php echo $_SESSION['user_logged']->username;?>">
<input class="cfsubmit" type="submit" name="action" value="Send">
<?php $msg="";?>

</form>
</div>



<div>
 <h2>Comments</h2>
 <?php foreach ($aa as $a) { ?>
    <div class="echocomment">
    
    <span class="span1">Posted by: <?php  echo $a['Username']." ".$a['date'];?></span> 
    <br>
    <span class="span2">"<?php  echo $a['text'];?>"</span>
    </div>
<?php }?>
</div>

</div>

</div>
</div>

<footer>
	<?php include '../footer/footer.php'?>
</footer>

</body>
</html>
