<?php
require_once 'controllerMovies.php';

$action = isset($_REQUEST['action'])? $_REQUEST['action'] : "showMovies";

$mv = new ControllerMovies();
switch ($_SERVER['REQUEST_METHOD']){
    case "GET":
        switch ($action){
            case "showMovies";
            $mv->getAllMovies();
            break;
            
            case "showGenres";
            $mv->getAllMovies();
            break;
            
            case "showMoviesByGenre";
            $mv->getMoviesByGenre();
            break;
            
            case "Search":
            $mv->searchMovie();
            break;
            
            case "MovieInfo":
            $mv->MovieDetalis();
            break;
            
            case "Rate":
            $mv->insertRate();
            break;
             
            case "Sign up":
            header("Location:../users/index.php");
            break;
            
            case "Send":
            $mv->insertComment();
            break;
            
        } break;
    case "POST":
        switch ($action){
            case "Rate":
            $mv->insertRate();
            break;
        } break;
}

?>


