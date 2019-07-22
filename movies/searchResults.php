<?php
$ttl = isset($_GET['keyword'])? $_GET['keyword'] : "";
$msg = isset($msg)? $msg : "";
$mvs = isset($mvs)? $mvs : "";
$message = isset($message)? $message : "";
$a = isset($a)? $a : "";
$dao = new DAOMovies();
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
if(is_array($mvs) && !empty($mvs)){
foreach ($mvs as $ms){?>
<div class="movies">
	<a href="../movies/?action=MovieInfo&MovieID=<?php echo $ms['MovieID']?>"><div><?php echo '<img id="thumb" src="data:image/jpg;base64,'.base64_encode($ms['thumbnail']).'">'; ?></div></a>
	<strong>Movie ID :</strong> <?php echo $ms['MovieID'];?> <br>
	<strong>Title :</strong> <?php echo $ms['Title'];?> <br>
	<strong>Genre Name :</strong> <?php echo $ms['GenreName'];?> <br>
	<strong>Release Year :</strong> <?php echo $ms['ReleaseYear'];?> <br>
	<strong>Movie Length :</strong> <?php echo $ms['MovieLength'];?> <br>
	<?php $average = $dao->getAverageRate($ms['MovieID']);?>
	<div class="rate"><strong><i class="fa fa-star" aria-hidden="true"></i> </strong><?php echo $average['rate'];?></div> <br>
</div> 
<?php } }
else if(is_array($mvs) && empty($mvs)) {
    echo $message = "Nema Rezultata ! ";
?>
<div><?php echo $a; ?></div>

<?php }?>	

<?php echo $msg; ?>
</div>

</div>





</form>
</body>
</html>