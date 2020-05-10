<?php
session_start();
class Levels
{

    // database connection and table name
    private $conn;
    private $table_name = "levels";

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

    function LevelShow()
    {
        $username = ($_SESSION["username"]);
        $NextLv = ($_SESSION["NextLevel"]);
        // select all query
        $query = "SELECT LvName, LvWRS, LvRS, LvIndoor, LvNatConf, LvCOJ, LvMinDays,LvH2H,COUNT(*)'TotalDays', Count(IF(EvDiscipline='Target',1,NULL))'Target',Count(IF(EvDiscipline='Field',1,NULL))'Field',Count(IF(EvDiscipline='Clout',1,NULL))'Clout',Count(IF(EvDiscipline='Flight',1,NULL))'Flight',Count(IF(EvDiscipline='3D',1,NULL))'3D',Count(IF(EvDiscipline='Conference',1,NULL))'Conference',Count(IF(EvOptional='H2H',1,NULL))'H2H',Count(IF(EvOptional='Indoor',1,NULL))'Indoor',Count(IF(EvStatus='WRS',1,NULL))'WRS',Count(IF(EvStatus='UKRS',1,NULL))'UKRS',Count(IF(EvStatus='Non-Record',1,NULL))'Non-RS',Count(IF(EvRole='COJ',1,NULL))'COJ',AGBNo
            FROM levels, shootrec
            WHERE AGBNo = '$username' AND LvName = '$NextLv'
            ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
}