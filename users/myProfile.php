<?php
include 'session.php';
include_once '../movies/DAOMovies.php';
include_once 'DAOUsers.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>FtnHub</title>
<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/home.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="../js/JavaScript.js"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<header>
<?php include '../header/header.php'; ?>
</header>

<!--
<div class="slider" >
    <div><img alt="" src="../img/avengers.jpg"></div>
    <div>I am another slide.</div>
  </div> 
 -->

	
<div class="grid">

<div class="genres"><?php include '../movies/viewShowGenresSidebar.php';?></div>

<div class="myprofile">
<div>
Username: <?php echo $_SESSION['user_logged']->username?>
<br>
<?php 
$dao=new DAOMovies();
$daoU=new DAOUsers();
$prom=array();

//Dodaje film u watchlist

if (isset($_GET['MovieID'])) {   
    $userid=$daoU->selectUserID($_SESSION['user_logged']->username);
    $mID=$_GET['MovieID'];
    $dao->deleteWL($mID, $userid['ReviewerID']);
    $dao->insertWatchlist($mID, $userid['ReviewerID']);
}
$watch=$dao->getAllWatchlist();
$mfc=$daoU->selectUserID($_SESSION['user_logged']->username);

for ($i = 0; $i < count($watch); $i++) {
    if($mfc['ReviewerID'] == $watch[$i]['UserID']){
        $pr=$dao->getMovie($watch[$i]['MovieID']);
        array_push($prom,$pr);
    }
}
?>
</div>
<h2>My Watchlist</h2>
<div class="moviez">
<?php  for($i=0;$i<count($prom);$i++){?>
<?php 
?>
   
    <div class="movies">
      <div class="addmovie">
	
	
    </div>
	<a href="../movies/?action=MovieInfo&MovieID=<?php echo $m['MovieID']?>"><div><img id="thumb" src="../images/<?php echo $prom[$i][0]['picture']?>"></div></a>
	<h2><?php echo $prom[$i][0]['Title'];?></h2> <br>
	<strong>Genre :</strong> <?php echo $prom[$i][0]['GenreName'];?> <br>
	<strong>Release Year :</strong> <?php echo $prom[$i][0]['ReleaseYear'];?> <br>
	<strong>Movie Length :</strong> <?php echo $prom[$i][0]['MovieLength'];?> <br>
	<?php $average = $dao->getAverageRate($prom[$i][0]['MovieID']);?>
	<div class="rate"><strong><i class="fa fa-star" aria-hidden="true"></i> </strong> <?php echo $average['rate'];?></div> 
	</div>
	
	<?php }?>
	
    <?php 
   
    ?>
   
</div> 
</div>
</div>
</div>

<footer>
	<?php include '../footer/footer.php'?>
</footer>

</body>
</html>