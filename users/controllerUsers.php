<?php
require_once 'modelUser.php';
require_once 'DAOUsers.php';
require_once 'session.php';
//kod za logovanje
class ControllerUsers {
    
    function goLoginUser() {
        include 'viewLogin.php';
    }
    
    function testInput ($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    function loginUser () {
        $cu = new ControllerUsers();
        
        $username = isset($_POST['username'])? $cu->testInput($_POST['username']) : "";
        $password = isset($_POST['password'])? $cu->testInput($_POST['password']) : "";
        $remember_user = isset($_POST['remember_user'])? $_POST['remember_user'] : "";
        
        if(!empty($username) && !empty($password)) {
            $daoC = new DAOUsers();
            $userC = $daoC->getUserByUsernamePassword($username, $password);
            
            if($username == $userC['username'] && $password == $userC['password']) {
                   
                   if(isset($_SESSION['user_logged'])) {
                        unset($_SESSION['user_logged']);
                        $user_logged = new modelUser($username, $password);
                        $_SESSION['user_logged'] = $user_logged;
                        
                        if($remember_user == "Yes") {
                            $toCookie = array("user" =>$_SESSION["user_logged"]->username, "pass"=>$_SESSION["user_logged"]->password);
                            $json = json_encode($toCookie);
                            setcookie("json_cookie", $json, time() + (10), "/"); 
                        } else {
                            setcookie("json_cookie", "", time()-3600, "/");
                         }
                        
                         header("Location:../movies/viewShowAllMovies.php");
                    } else {
                        $user_logged = new modelUser($username, $password);
                        $_SESSION['user_logged'] = $user_logged;
                        
                        if($remember_user == "Yes") {
                            $toCookie = array("user" =>$_SESSION["user_logged"]->username, "pass"=>$_SESSION["user_logged"]->password);
                            $json = json_encode($toCookie);
                            setcookie("json_cookie", $json, time() + (10), "/"); 
                        } else {
                           setcookie("json_cookie", "", time()-3600, "/"); 
                        }
                        
                        include 'viewDashboard.php';}    
                } else {
                    $msg = "Wrong username or password";
                    include 'viewLogin.php';
                }
        } else {
            $msg = "You must fill in all fields";
            include '../users/viewLogin.php';
        }  
    }
    
    function logoutUser () {
        session_start();
        $idCh = isset($_GET['username'])? $_GET['username'] : "";
       
        
        if(isset($_SESSION['user_logged'])) {
            if ($idCh == $_GET['username']) { 
                session_destroy();
                unset($_SESSION['user_logged']);
                 
                header("Location:../index.php");
            } else {
                header("Location:../index.php");
                
                exit;
            }
        }
    }
    // Kod za registraciju
    function registerUser () {
        $cu = new ControllerUsers();
        
        $username = isset($_POST['username'])? $cu->testInput($_POST['username']) : "";
        $password = isset($_POST['password'])? $cu->testInput($_POST['password']) : "";
        $password_c = isset($_POST['password_c'])? $cu->testInput($_POST['password_c']) : "";
        
        if(!empty($username) && !empty($password) && !empty($password_c)) {
            if (strlen($password) >= 8) {
                if($password == $password_c) {
                    $daoC = new DAOUsers();
                    $userC = $daoC->getUserByUsername($username);
                    if($username != $userC['username']) {
                        $dao = new DAOUsers();
                        $newuser = $dao->insertUser($username, $password);
                        $msg = "You have successfully registered, now you can log in";
                        include 'viewLogin.php';
                        
                    } else {
                        $msg = "Username already exist, you can choose another one";
                        include 'viewRegister.php';
                    }
                } else {
                    $msg = "Passwords don't match";
                    include 'viewRegister.php';
                }
            } else {
                $msg = "Password need to have at least 8 characters";
                include 'viewRegister.php';
            }
        } else {
            $msg = "You must fill in all fields";
            include 'viewRegister.php';
        }
    }
    
    function goRegisterUser () {
        include 'viewRegister.php';
    }
    function validate(){
        $cu = new ControllerUsers();
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = isset($_POST['name'])? $cu->testInput($_POST['name']) : "";
            $email = isset($_POST['email'])? $cu->testInput($_POST['email']) : "";
            $message = isset($_POST['message'])? $cu->testInput($_POST['message']) : "";
            
            if (!empty($name) && !empty($email) && !empty($message)){
                if(preg_match("/^[a-zA-Z]*$/", $name)){
                    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                        if(strlen($message) > 10) {
                            // ???
                            $err = "Message sent succesfully !";
                            include '../users/viewContact.php';
                        }
                        else {
                            
                            $err = "Must have atleast 10 characters !";
                            include '../users/viewContact.php';
                        }
                    }
                    else {
                        $err = "Invalid email !";
                        include '../users/viewContact.php';
                    }
                    
                }
                else {
                    $err = "Name must contain only letters !";
                    include '../users/viewContact.php';
                }
            }
            else {
                $err = 'All fields must be filled !';
                include '../users/viewContact.php';
            }
            
            
        }
        else {
            $err = 'Wrong method !';
            include '../users/viewContact.php';
        }
    }
    
  
    
}




?>