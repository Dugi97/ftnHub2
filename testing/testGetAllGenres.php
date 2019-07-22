<?php
require_once '../movies/DAOMovies.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Insert title here</title>
</head>
<body>
<?php 
$dao = new DAOMovies();
$movies = $dao->getAllGenres();

foreach ($movies as $m)
    echo '<img src="data:image/jpg;base64,'.base64_encode($m['thumbnail']).'">';
?>
</body>
</html>