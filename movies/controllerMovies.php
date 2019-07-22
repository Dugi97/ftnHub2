<?php
require_once '../movies/DAOMovies.php';
require_once '../users/controllerUsers.php';

class ControllerMovies {
    
    function getAllMovies(){
        include '../movies/viewShowAllMovies.php';
    }
    
    function getMoviesByGenre() {
        $id = isset($_GET['GenreID'])? $_GET['GenreID'] : "";
        
        include '../movies/viewShowMoviesByGenre.php';
    }
    
    function searchMovie(){
        $ttl = isset($_GET['keyword'])? $_GET['keyword'] : "";
        if(!empty($ttl)){
                $dao = new DAOMovies();
                $mvs = $dao->getMovieByKeyword("%".$ttl."%");
                
                $a = "<a href = '../movies/viewShowAllMovies.php'>Back</a>";
                      
                include 'SearchResults.php';

        }
        else {
            include 'viewShowAllMovies.php';
        }
        
    }
    
    function MovieDetalis() {
        
     
        include 'movieInfo.php';
        
        
    }
    
    function insertRate(){
        
        $dao = new DAOMovies();
        
        $movid = isset($_GET['MovieID'])? $_GET['MovieID'] : "";
        
        $user = $_SESSION['user_logged']->username;
        $ui = $dao->getUserID($user);
        $userid = $ui['ReviewerID'];
        
        $rate = isset($_GET['rate'])? $_GET['rate'] : "";        
        
        if(!empty($rate)){
            $dao = new DAOMovies();
            $dao->deleteRate($movid, $userid);
            $dao->insertRate($movid, $userid, $rate);
            $ms = "Rated succesfully !";
            
            include 'movieInfo.php';
        }
        else {
            $ms = "You must select one grade !";
            include 'movieInfo.php';
        }
        
    }
    
    function insertComment(){
        
        $dao=new DAOMovies();
        $movid = isset($_GET['MovieID'])? $_GET['MovieID'] : "";
        $comment=isset($_GET['comment'])? $_GET['comment'] : "" ;
        $UserID=isset($_GET['UserID'])? $_GET['UserID'] : "";
        if(!empty($_GET['comment'])){
            $dao->insertComment($movid,$UserID,$comment);
            
        }else{
            $msg="You have to fill this field !";
        }
        include '../movies/movieInfo.php';
    }
    
    
    
}

?>