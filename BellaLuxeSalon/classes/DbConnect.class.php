<?php

class DbConnect {
  private $host = "localhost";
  private $user = "root";
  private $pwd = "";
  private $dbName = "jennys-menu";

//Connects to the database.
  protected function connect(){
    try{
      $dsn = 'mysql:host='. $this->host . ';dbname=' . $this->dbName;
      $pdo = new PDO($dsn, $this->user, $this->pwd);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      // echo "Connected successfully" . '</br>';
    } catch(PDOException $e) {
      echo "Connection failed:" . $e->getMessage() . '</br>';
    }
    return $pdo;
  }
protected function closeConn(){
  $pdo = null;
}

}