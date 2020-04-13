<?php

class Product
{

    // database connection and table name
    private $conn;
    private $table_name = "shootrec";

    // object properties
    public $ID;
    public $AGBNo;
    public $EvName;
    public $EvRound;
    public $EvDate;
    public $EvOrg;
    public $EvLevel;
    public $EvDiscipline;
    public $EvOptional;
    public $EvStatus;
    public $EvRole;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }
    function read(){

        // select all query
        $query = "SELECT
                ID, AGBNo, EvName, EvRound, EvDate, EvOrg,EvLevel,EvDiscipline,EvOptional,EvStatus,EvRole
            FROM
                shootrec
            ORDER BY
                EvDate DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    // create product
    function create(){

        // query to insert record
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
                AGBNo=:AGBNo, EvName=:EvName, EvRound=:EvRound, EvDate=:EvDate, EvOrg=:EvOrg, EvLevel=:EvLevel, EvDiscipline=:EvDiscipline, EvOptional=:EvOptional, EvStatus=:EvStatus, EvRole=:EvRole";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->AGBNo=htmlspecialchars(strip_tags($this->AGBNo));
        $this->EvName=htmlspecialchars(strip_tags($this->EvName));
        $this->EvRound=htmlspecialchars(strip_tags($this->EvRound));
        $this->EvDate=htmlspecialchars(strip_tags($this->EvDate));
        $this->EvOrg=htmlspecialchars(strip_tags($this->EvOrg));
        $this->EvLevel=htmlspecialchars(strip_tags($this->EvLevel));
        $this->EvDiscipline=htmlspecialchars(strip_tags($this->EvDiscipline));
        $this->EvOptional=htmlspecialchars(strip_tags($this->EvOptional));
        $this->EvStatus=htmlspecialchars(strip_tags($this->EvStatus));
        $this->EvRole=htmlspecialchars(strip_tags($this->EvRole));
        // bind values
        $stmt->bindParam(":AGBNo", $this->AGBNo);
        $stmt->bindParam(":EvName", $this->EvName);
        $stmt->bindParam(":EvRound", $this->EvRound);
        $stmt->bindParam(":EvDate", $this->EvDate);
        $stmt->bindParam(":EvOrg", $this->EvOrg);
        $stmt->bindParam(":EvLevel", $this->EvLevel);
        $stmt->bindParam(":EvDiscipline", $this->EvDiscipline);
        $stmt->bindParam(":EvOptional", $this->EvOptional);
        $stmt->bindParam(":EvStatus", $this->EvStatus);
        $stmt->bindParam(":EvRole", $this->EvRole);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }
}
