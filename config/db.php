<?php

class DB{
  private $dbHost="localhost";
  private $dbUsername="root";
  private $dbPassword="";
  private $dbName="dbusermgmt";

  public $db_con;

  public function __construct(){
    if(!isset($this->db)){
      try{
        $pdo=new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName, $this->dbUsername, $this->dbPassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db_con=$pdo;
      }catch(PDOEXCEPTION $e){
        die("Failed to connect with mysql :".$e->getMessage());
      
      }
    }
  }

  public function userLogin($username, $password)
  {
    $stmt=$this->db_con->prepare("SELECT * FROM tblusers WHERE username=:username");
    $stmt->execute(array(":username"=>$username));
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $count=$stmt->rowCount();
    if($row['userpassword']==$password){
      return $count;
    }else{
      return false;
    }
  }

  public function registerUser($username, $userpassword, $useremail, $usercontact, $userregdate)
  {
    $sql="INSERT into tblusers(username, userpassword, useremail, usercontact, userregdate) VALUES (:username, :userpassword, :useremail, :usercontact, :userregdate)";
    $stmt=$this->db_con->prepare($sql);
    $stmt->bindParams(":username", $username);
    $stmt->bindParams(":userpassword", $userpassword);
    $stmt->bindParams(":useremail", $useremail);
    $stmt->bindParams(":usercontact", $usercontact);
    $stmt->bindParams(":userregdate", $userregdate);
    $stmt->execute();
    $newId=$this->db_con->lastInsertId();
    return $newId;
  }
}
