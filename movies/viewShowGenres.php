<?php
require_once '../movies/DAOMovies.php';
$dao = new DAOMovies();
$movies = $dao->getAllGenres();
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
<?php foreach ($movies as $g){?>
	<div class="genrelinks"><a href="../movies/?action=showMoviesByGenre&GenreID=<?php echo $g['GenreID']; ?>"><?php echo '<img id="thumb" src="data:image/jpg;base64,'.base64_encode($g['thumbnail']).'">'; ?></a></div>
<?php } ?>

</div>

</div>

<footer>
	<?php include '../footer/footer.php'?>
</footer>

</body>
</html>


