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
        $username = ($_SESSION["agbID"]);
        $year = ($_SESSION["ShYear"]);
        // select all query
        $query = "SELECT
                ID, AGBNo, EvName, EvRound, EvDate, EvOrg,EvLevel,EvDiscipline,EvOptional,EvStatus,EvRole
            FROM
                shootrec
                WHERE
                AGBNo ='$username' AND YEAR(EvDate) = $year
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
        $year = ($_SESSION["ShYear"]);
        // select all query
        $query = "SELECT shootrec.ID, AGBNo, EvName, EvRound, EvDate, EvOrg, EvLevel,EvDiscipline,EvOptional,EvStatus,EvRole,region,display_name
            FROM shootrec, registered_users
            WHERE AGBNo = agb_no AND region = '$Region' AND YEAR(EvDate)=$year
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
    function J08()
    {
    $Region=($_SESSION["region"]);
        $year = ($_SESSION["ShYear"]);
    $query ="SELECT AGBNo,display_name,region, COUNT(*)'TotalDays', Count(IF(EvOrg='WA',1,NULL))'WA',Count(IF(EvOrg='AGB',1,NULL))'AGB',Count(IF(EvOrg='Training',1,NULL))'Training',Count(IF(EvLevel='International',1,NULL))'International',Count(IF(EvLevel='National',1,NULL))'National',Count(IF(EvLevel='Regional',1,NULL))'Regional',Count(IF(EvLevel='County',1,NULL))'County',Count(IF(EvLevel='Club',1,NULL))'Club',Count(IF(EvDiscipline='Target',1,NULL))'Target',Count(IF(EvDiscipline='Field',1,NULL))'Field',Count(IF(EvDiscipline='Clout',1,NULL))'Clout',Count(IF(EvDiscipline='Flight',1,NULL))'Flight',Count(IF(EvDiscipline='3D',1,NULL))'3D',Count(IF(EvDiscipline='Seminar',1,NULL))'Seminar',Count(IF(EvDiscipline='Conference',1,NULL))'Conference',Count(IF(EvDiscipline='Other CPD',1,NULL))'CPD',Count(IF(EvDiscipline='Other',1,NULL))'Other',Count(IF(EvOptional='H2H',1,NULL))'H2H',Count(IF(EvOptional='Indoor',1,NULL))'Indoor',Count(IF(EvStatus='WRS',1,NULL))'WRS',Count(IF(EvStatus='UKRS',1,NULL))'UKRS',Count(IF(EvStatus='Non-Record',1,NULL))'Non-RS',Count(IF(EvRole='COJ',1,NULL))'COJ',Count(IF(EvRole='DOS',1,NULL))'DOS',Count(IF(EvRole='Judge',1,NULL))'Judge',Count(IF(EvRole='Trainer',1,NULL))'Trainer',Count(IF(EvRole='Attendee',1,NULL))'Attendee' ,Count(IF(EvRole='Training',1,NULL))'Training'
            FROM shootrec, registered_users 
            WHERE AGBNo = agb_no and region ='$Region' AND YEAR(EvDate) =$year
            GROUP BY AGBNo";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
}
