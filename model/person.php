<?php
class Person{

  private $conn;
  private $table_name = "mittable";


  public $ID;
  public $Navn;
  public $EfterNavn;


      // constructor with $db as database connection
  public function __construct($db){
        $this->conn = $db;
    }

function Get(){
  //sql statement
$sqlstring = "SELECT ID, Navn, EfterNavn FROM mittable";

    // stmt = lacer connect klargøre sqlstring
  //PDO::prepare — Prepares a statement for execution and returns a statement object
    $stmt = $this->conn->prepare($sqlstring);       

    //kør klargjort statement
     $stmt->execute();
 
    return $stmt;
}


// post person
function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                Navn=:Navn, EfterNavn=:EfterNavn";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->Navn=htmlspecialchars(strip_tags($this->Navn));
    $this->EfterNavn=htmlspecialchars(strip_tags($this->EfterNavn));
 
    // bind values
    $stmt->bindParam(":Navn", $this->Navn);
    $stmt->bindParam(":EfterNavn", $this->EfterNavn);
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}

}//end