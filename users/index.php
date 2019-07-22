<?php
require_once 'controllerUsers.php';

$action=isset($_REQUEST['action'])? $_REQUEST['action'] : "";

switch ($_SERVER['REQUEST_METHOD']) {
    case "GET":
        switch ($action) {
            case "gologin":
                $cu = new ControllerUsers();
                $cu->goLoginUser();
                break;
            case "Logout":
                $cu = new ControllerUsers();
                $cu->logoutUser();
                break;
            case "goregister":
                $cu = new ControllerUsers();
                $cu->goRegisterUser();
                break;
            
        }
        break;
    case "POST":
        switch ($action) {
            case "Register":
                $cu = new ControllerUsers();
                $cu->registerUser();
                break;
            case "Log in":
                $cu = new ControllerUsers();
                $cu->loginUser();
                break;
            case "SEND MESSAGE":
                $cu = new ControllerUsers();
                $cu->validate();
                break;
        
        }
        
        break;
    default:header("Location:index.php");
        die();
        break;
}
?>