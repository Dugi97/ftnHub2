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
$movies = $dao->getAllMovies();

foreach ($movies as $m)
    echo $m['MovieID']." ".$m['Title']." ".$m['GenreName']." ".$m['ReleaseYear']." ".$m['Plot']." ".$m['MovieLength']."<br>";
?>
</body>
</html>