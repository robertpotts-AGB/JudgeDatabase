<?php
session_start();
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
        $username = ($_SESSION["username"]);
        // select all query
        $query = "SELECT
                ID, AGBNo, EvName, EvRound, EvDate, EvOrg,EvLevel,EvDiscipline,EvOptional,EvStatus,EvRole
            FROM
                shootrec
                WHERE
                AGBNo ='$username'
            ORDER BY
                EvDate DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    // create shootrecords
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
    // update the shootrecords
    function update(){

        // update query
        $query = "UPDATE shootrec
            SET
                EvName=:EvName, 
                EvRound=:EvRound, 
                EvDate=:EvDate, 
                EvOrg=:EvOrg, 
                EvLevel=:EvLevel, 
                EvDiscipline=:EvDiscipline, 
                EvOptional=:EvOptional, 
                EvStatus=:EvStatus, 
                EvRole=:EvRole
            WHERE
                ID = :ID";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->EvName=htmlspecialchars(strip_tags($this->EvName));
        $this->EvRound=htmlspecialchars(strip_tags($this->EvRound));
        $this->EvDate=htmlspecialchars(strip_tags($this->EvDate));
        $this->EvOrg=htmlspecialchars(strip_tags($this->EvOrg));
        $this->EvLevel=htmlspecialchars(strip_tags($this->EvLevel));
        $this->EvDiscipline=htmlspecialchars(strip_tags($this->EvDiscipline));
        $this->EvOptional=htmlspecialchars(strip_tags($this->EvOptional));
        $this->EvStatus=htmlspecialchars(strip_tags($this->EvStatus));
        $this->EvRole=htmlspecialchars(strip_tags($this->EvRole));

        // bind new values
        $stmt->bindParam(":EvName", $this->EvName);
        $stmt->bindParam(":EvRound", $this->EvRound);
        $stmt->bindParam(":EvDate", $this->EvDate);
        $stmt->bindParam(":EvOrg", $this->EvOrg);
        $stmt->bindParam(":EvLevel", $this->EvLevel);
        $stmt->bindParam(":EvDiscipline", $this->EvDiscipline);
        $stmt->bindParam(":EvOptional", $this->EvOptional);
        $stmt->bindParam(":EvStatus", $this->EvStatus);
        $stmt->bindParam(":EvRole", $this->EvRole);
        $stmt->bindParam(':ID', $this->ID);

        // execute the query
        if($stmt->execute()){
            return true;
        }

        return false;
    }
    // delete the shootrecords
    function delete(){

        // delete query
        $query = "DELETE FROM shootrec WHERE ID = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->ID));

        // bind id of record to delete
        $stmt->bindParam(1, $this->ID);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;
    }
    // used when filling up the update shootrecords form
    function readOne(){

        // query to read single record
        $query = "SELECT
             ID,EvName,EvRound,EvDate,EvOrg,EvLevel,EvDiscipline,EvRole,EvOptional,EvStatus
            FROM
                shootrec
            WHERE
                ID = ?
            LIMIT
                0,1";

        // prepare query statement
        $stmt = $this->conn->prepare( $query );

        // bind id of shootrecords to be updated
        $stmt->bindParam(1, $this->ID);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->ID = $row['ID'];
        $this->EvName = $row['EvName'];
        $this->EvRound = $row['EvRound'];
        $this->EvOrg = $row['EvOrg'];
        $this->EvLevel = $row['EvLevel'];
        $this->EvDiscipline = $row['EvDiscipline'];
        $this->EvRole = $row['EvRole'];
        $this->EvOptional = $row['EvOptional'];
        $this->EvDate = $row['EvDate'];
        $this->EvStatus = $row['EvStatus'];

    }
    function readJLO(){
        $username = ($_SESSION["username"]);
        $Region=($_SESSION["region"]);
        // select all query
        $query = "SELECT shootrec.ID, AGBNo, EvName, EvRound, EvDate, EvOrg, EvLevel,EvDiscipline,EvOptional,EvStatus,EvRole,region,display_name
            FROM shootrec, registered_users
            WHERE AGBNo = agb_no AND region = '$Region'
            ORDER BY
                EvDate DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    function OrganisationCount()
    {
        $Region = ($_SESSION["region"]);
        // select all query
        $query = "SELECT COUNT(shootrec.EvOrg) AS OrgTotal,EvOrg,region
            FROM shootrec, registered_users
             WHERE region = '$Region'
            GROUP BY EvOrg";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    function LevelCount()
    {
        $Region = ($_SESSION["region"]);
        // select all query
        $query = "SELECT COUNT(shootrec.EvLevel) AS LevelTotal, EvLevel,region
            FROM shootrec, registered_users
            WHERE region ='$Region'
		Group By EvLevel, region
		ORDER BY LevelTotal";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    function RoleCount()
    {
        $Region = ($_SESSION["region"]);
        // select all query
        $query = "SELECT COUNT(shootrec.EvRole) AS RoleTotal, EvRole,region
            FROM shootrec, registered_users
            WHERE region ='$Region'
		Group By EvRole, region";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    function TypeCount()
    {
        $Region = ($_SESSION["region"]);
        // select all query
        $query = "SELECT COUNT(shootrec.EvDiscipline) AS TypeTotal, EvDiscipline,region
            FROM shootrec, registered_users
            WHERE region ='$Region'
		Group By EvDiscipline, region";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    function StatusCount()
    {
        $Region = ($_SESSION["region"]);
        // select all query
        $query = "SELECT COUNT(shootrec.EvStatus) AS StatusTotal, EvStatus,region
            FROM shootrec, registered_users
            WHERE region ='$Region'
		Group By EvStatus, region";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

}
