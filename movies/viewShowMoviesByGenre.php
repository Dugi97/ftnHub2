<?php
require_once '../movies/DAOMovies.php';
$dao = new DAOMovies();
$movies = $dao->getAllByGenre($id);
$msg = isset($msg)? $msg : "";
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
<script type="text/javascript" src="../js/JavaScript.js"></script>
</head>
<body>
<header>
<?php include '../header/header.php'; ?>
</header>

<div class="grid">

<div class="genres"><?php include '../movies/viewShowGenresSidebar.php';?></div>

<div>
<?php 
if(!empty($movies)){
    foreach ($movies as $m){ ?>
        <div class="movies">
        	<a href="../movies/?action=MovieInfo&MovieID=<?php echo $m['MovieID']?>"><div><?php echo '<img id="thumb" src="data:image/jpg;base64,'.base64_encode($m['thumbnail']).'">'; ?></div></a>
			<strong>Movie ID :</strong> <?php echo $m['MovieID'];?> <br>
			<strong>Title :</strong> <?php echo $m['Title'];?> <br>
			<strong>Genre Name :</strong> <?php echo $m['GenreName'];?> <br>
			<strong>Release Year :</strong> <?php echo $m['ReleaseYear'];?> <br>
			<strong>Movie Length :</strong> <?php echo $m['MovieLength'];?> <br>
			<?php $average = $dao->getAverageRate($m['MovieID']);?>
			<div class="rate"><strong><i class="fa fa-star" aria-hidden="true"></i> </strong><?php echo $average['rate'];?></div> <br>
		</div>
<?php } }
else {
    $msg = "No movies to show !";
}
?><div id="msg"><?php echo $msg;?></div>
</div>


</div>


<footer>
	<?php include '../footer/footer.php'?>
</footer>

</body>
</html>

