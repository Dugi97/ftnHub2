<?php
require_once 'controllerUsers.php';
require_once '../movies/DAOMovies.php';
$dao=new DAOMovies();

$cu = new ControllerUsers();
$cus=new DAOUsers();
// UNOS FILMOVA
$Title=isset($_POST['Title'])? $cu->testInput($_POST['Title'] ): "";
$ReleaseYear=isset($_POST['ReleaseYear'])? $cu->testInput($_POST['ReleaseYear']) : "";
$Plot=isset($_POST['Plot'])? $cu->testInput($_POST['Plot']) : "";
$MovieLength=isset($_POST['MovieLength'])? $cu->testInput($_POST['MovieLength']) : "";
$picture=isset($_POST['picture'])? $cu->testInput($_POST['picture']) : "";
$ytlink=isset($_POST['ytlink'])? $cu->testInput($_POST['ytlink']) : "";
$genre=isset($_POST['genre'])? $_POST['genre']:"";
$ActorID=isset($_POST['actor']) ? $cu->testInput($_POST['actor']) : "";
$role=isset($_POST['role']) ? $cu->testInput($_POST['role']) : "";


$actor1=isset($_POST['actor1']) ? $cu->testInput($_POST['actor1']):"";
$role1=isset($_POST['role1']) ? $cu->testInput($_POST['role1']):"";

$actor2=isset($_POST['actor2']) ? $cu->testInput($_POST['actor2']):"";
$role2=isset($_POST['role2']) ? $cu->testInput($_POST['role2']):"";

$actor3=isset($_POST['actor3']) ? $cu->testInput($_POST['actor3']):"";
$role3=isset($_POST['role3']) ? $cu->testInput($_POST['role3']):"";

$actors=array();
$roles=array();

if (!empty($actor1) && !empty($role1)){
    array_push($actors,$actor1);
    array_push($roles,$role1);
}
if (!empty($actor2) && !empty($role2)){
    array_push($actors,$actor2);
    array_push($roles,$role2);
}

if (!empty($actor3) && !empty($role3)){
    array_push($actors,$actor3);
    array_push($roles,$role3);
}


// UNOS GLUMACA

$Fullname=isset($_POST['Fullname']) ? $cu->testInput($_POST['Fullname']) :"";
$Nationality=isset($_POST['Nationality']) ? $cu->testInput($_POST['Nationality']) :"";
$Birth=isset($_POST['Birth']) ? $cu->testInput($_POST['Birth']) :"";


$actorID=$dao->getActorID($ActorID);


if(!empty($ytlink) && !empty($Title) && !empty($ReleaseYear) && !empty($Plot) && !empty($MovieLength) 
    && !empty($picture) && !empty($role) && !empty($actorID) ){
    if(is_numeric($ReleaseYear)){
        $dao->insertMovie($Title, $ReleaseYear, $Plot, $MovieLength, $picture, $ytlink);
                $MovID=$dao->getMovieIdByTitle($Title);
                for ($i = 0; $i < count($genre); $i++) {
                    $Genre[$i]=$dao->getGenreID($genre[$i]);
                }
              
                
                for ($i = 0; $i < count($Genre); $i++) {

                    $dao->insertGenre($MovID['MovieID'], $Genre[$i]['GenreID']);
                }
               
                $dao->insertRole($actorID['ActorID'], $MovID['MovieID'], $role);
                
                    for ($i = 0; $i < count($actors); $i++) {
                        $actID=$dao->getActorID($actors[$i]);
                        $dao->insertRole($actID['ActorID'], $MovID['MovieID'], $roles[$i]);    
                    }   
             include_once '../users/viewAdmin.php';
    }else{
        $msg="Release Year must be a number !!!";
    }
    
}else{
    $msg="You have to fill in all fields !!!";
}
// BRISANJE FILMOVA PO NAZIVU
if(isset($_GET['title'])){
    $DelMov=isset($_GET['title'])? $cu->testInput($_GET['title']) : "";
    $movieID=$dao->getMovieIdByTitle($DelMov);
    $dao->deleteRole($movieID['MovieID']);
    $dao->deleteMoviegenre($movieID['MovieID']);
    $dao->deleteMovie($DelMov);
   
    include_once '../users/viewAdmin.php';
    
}
// BRISANJE KORISNIKA PO IMENU
$allU=$cus->getAllUsers();
$username=isset($_GET['username'])?$_GET['username']:"";
if(!empty($username)){
    foreach ($allU as $a) {
        if($a['username']==$username){
            $dao->deleteRateByUsername($a['ReviewerID']);
            $cus->deleteUser($username);
        }
        include_once '../users/viewAdmin.php';
        
    }
}

if(!empty($Fullname) && !empty($Nationality) && !empty($Birth)  ){
    
    $dao->insertActor($Fullname, $Nationality, $Birth);
    
    include_once '../users/viewAdmin.php';
}
?>