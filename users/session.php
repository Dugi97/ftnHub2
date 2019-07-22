<?php
require_once 'modelUser.php';

session_start();

if(!isset($_SESSION['user_logged']))
    $_SESSION['user_logged'] = array(

    );
    
    ?>