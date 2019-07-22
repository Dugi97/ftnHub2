<?php
require_once '../config/db.php';

class DAOUsers {
	private $db;

	private $INSERTUSER = "INSERT INTO reviewer (username, password) VALUES (?, ?)";
	private $SELECTBYUSERNAMEPASSWORD = "SELECT * FROM reviewer WHERE username = ? AND password = ?";	
	private $SELECTBYUSERNAME = "SELECT * FROM reviewer WHERE username = ?";
	private $DELETEUSER="DELETE FROM reviewer WHERE username=?";
	private $GETALLUSERS="SELECT * FROM reviewer";
	private $SELECTUSERID="SELECT ReviewerID FROM reviewer WHERE username=?";
	private $DELETEFROMWATCHLIST="DELETE FROM watchlist WHERE MovieID=?";
	
	
	public function __construct()
	{
		$this->db = DB::createInstance();
	}
    
	public function deleteFromWatchlist($MovieID)
	{
	    
	    $statement = $this->db->prepare($this->DELETEFROMWATCHLIST);
	    
	    $statement->bindValue(1, $MovieID);
	    
	    $statement->execute();
	}
	
	public function insertUser($username, $password)
	{
	    
	    $statement = $this->db->prepare($this->INSERTUSER);
	    $statement->bindValue(1, $username);
	    $statement->bindValue(2, $password);
	    
	    
	    $statement->execute();
	}
	
	public function getUserByUsernamePassword($username, $password)
	{
	    
	    $statement = $this->db->prepare($this->SELECTBYUSERNAMEPASSWORD);
	    $statement->bindValue(1, $username);
	    $statement->bindValue(2, $password);
	    
	    $statement->execute();
	    
	    $result = $statement->fetch();
	    return $result;
	}
	
	public function getUserByUsername($username)
	{
	    
	    $statement = $this->db->prepare($this->SELECTBYUSERNAME);
	    $statement->bindValue(1, $username);
	    
	    $statement->execute();
	    
	    $result = $statement->fetch();
	    return $result;
	}
	
	public function getAllUsers()
	{
	    
	    $statement = $this->db->prepare($this->GETALLUSERS);
	    
	    $statement->execute();
	    
	    $result = $statement->fetchAll();
	    return $result;
	}
	public function deleteUser($username)
	{
	    
	    $statement = $this->db->prepare($this->DELETEUSER);
	    
	    $statement->bindValue(1, $username);
	    
	    $statement->execute();
	}
	public function selectUserID($username)
	{
	    
	    $statement = $this->db->prepare($this->SELECTUSERID);
	    $statement->bindValue(1, $username);
	    
	    $statement->execute();
	    
	    $result = $statement->fetch();
	    return $result;
	}

	
	
}
?>
