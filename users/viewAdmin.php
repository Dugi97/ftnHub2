<?php
require_once '../movies/DAOMovies.php';
require_once '../movies/DAOMovies.php';
require_once '../users/controllerUsers.php';
$dao = new DAOMovies();
$movies = $dao->getAllMovies();
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
<script type="text/javascript">
var count=1;
</script>
<style type="text/css">
.adminHeading{
width:240px;
margin:0;
padding:0;
}
.adminHeading:hover{
color:red;
}
</style>
</head>
<body>
<header>
<?php include '../header/header.php'; ?>
</header>

	
<div class="grid">

<div class="genres"><?php include '../movies/viewShowGenresSidebar.php';?></div>

<div class="panel">
<h1 style="margin: 0;" class="adminHeading" onclick="FunctionIM()">INSERT MOVIE</h1>
<div  class="insertm">
<div style="display: none;" id="insertmovie">
<form action="adminOptions.php" method="POST">
Title :<br><input type="text" name="Title"><br><br>
Release Year :<br><input type="number" name="ReleaseYear"><br><br>
Plot :<br><input type="text" name="Plot"><br><br>
Movie Length :<br><input type="text" name="MovieLength"><br><br>
Picture url :<br><input type="file" name="picture"><br><br>
Youtube link :<br><input type="text" name="ytlink"><br><br>

<?php $zanrovi=$dao->getAllGenres(); ?>
Genre :<br> <select name="genre" multiple>
<?php foreach ($zanrovi as $zanr) { ?>
 
  <option value="<?php echo $zanr['GenreName']?>"><?php echo $zanr['GenreName']?></option><br><br>

<?php } ?>
</select> <br><br>
Main actor :<br> 
<div >
<select name="actor" >
    <?php $actors=$dao->getAllActors();?>
<?php foreach ($actors as $actor) { ?>
 
  <option value="<?php echo $actor['Fullname']?>"><?php echo $actor['Fullname']?></option><br><br>
<?php } ?>
</select> 
Role :  <input type="text" name="role"><br><br>
<button type="button" onclick="myFunctionAdd()">Add actor!</button><p style="opacity:0.5;">(Max 3 actors)</p><br><br>


<?php 
$counter=3;
for ($i = 1; $i < ($counter+1); $i++) { ?>
<div id="input<?php echo $i;?>" style="display:none;">
    <select name="actor<?php echo $i;?>" >
    <?php $actors=$dao->getAllActors();?>
<?php foreach ($actors as $actor) { ?>
 
  <option value="<?php echo $actor['Fullname']?>"><?php echo $actor['Fullname']?></option><br><br>
<?php } ?>
</select> 
Role :  <input type="text" name="role<?php echo $i;?>"><br><br>

<?php } ?>
</div>

</div>
</div>
<input type="submit" name="action" value="insert">
</form><br>


</div>
</div>
<br>

<div class="panel">
<h1 class="adminHeading" onclick="FunctionIA()">INSERT ACTOR</h1>
<div style="display: none;" id="insertactor">
<form method="post" action="adminOptions.php">
Actor name :<br>
<input type="text" name="Fullname"><br><br>
Nationality :<br>
<input type="text" name="Nationality"><br><br>
Birth :<br>
<input type="date" name="Birth"><br><br>
<input type="submit" name="action" value="add"><br><br>
</form>
</div>
</div>
<br>

<div class="panel">
<h1 class="adminHeading" onclick="FunctionDeleteMovie()">DELETE MOVIE</h1>
<div style="display: none;" id="deletem">
<form action="adminOptions.php" method="get"> <br>
Movie name : <br>
<input type="text" name="title">
<input type="submit" name="action" value="delete">
</form>
</div>
</div>
<br>

<div class="panel">
<h1 class="adminHeading" onclick="FunctionDU()">DELETE USER</h1>
<div style="display: none;" id="deleteu">
<form action="adminOptions.php" method="get"> <br>
Username :<br>
<input type="text" name="username">
<input type="submit" name="action" value="delete">
</form>
</div>
</div>
</div>


</body>
</html>

