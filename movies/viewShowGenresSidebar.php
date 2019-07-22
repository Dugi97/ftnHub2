<?php
require_once '../movies/DAOMovies.php';
$dao = new DAOMovies();
$moviess = $dao->getAllGenres();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Insert title here</title>
<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

<div class="genrelinks">
<div id="glinks"><a href="../movies/?action=showMovies">All Movies</a></div>
<?php foreach ($moviess as $g){?>
	<div id="glinks"><a href="../movies/?action=showMoviesByGenre&GenreID=<?php echo $g['GenreID']; ?>"><?php echo $g['GenreName'];?></a></div>
<?php } ?>
</div>

</body>
</html>