<?php

/**
 * Function class for basestation information
 *
 * @author Robin Koning
 */
//require_once __DIR__ . '/../DatabaseConnector/Connector.php';

require_once __DIR__ . '/../mysql_connect.php';
class BaseStation {

    /**
     *
     * @var PDO $db
     */
    private $db;

    /**
     *
     * @var PDO $sth
     */
    private $sth;

    /**
     * 
     * @var MySQLi
     */
    private $stmt;
    
    private $returnedArray;

//    public function getBasestationList() {
//        $sql = "SELECT * FROM basestation_overzicht";
//        $this->db = Connector::getInstance();
//        $this->sth = $this->db->getConnection()->prepare($sql);
//        $this->sth->execute();
//        $result = $this->sth->fetchAll(PDO::FETCH_ASSOC);
//        return $result;
//    }

    public function getBasestationListMysqli() {
        //TODO edit sql query
        global $mysqli;
        $this->returnedArray = array();
        $sql = "SELECT * FROM basestation_overzicht";
        $this->stmt = $mysqli->prepare($sql);
        if ($this->stmt !== FALSE) {
            $this->stmt->execute();
            $this->stmt->bind_result($id, $nodenr, $regio, $type, $opmerking);
            while ($this->stmt->fetch()) {
                array_push($this->returnedArray, array($id, $nodenr, $regio, $type, $opmerking));
            }
            $this->stmt->close();
            return $this->returnedArray;
        }
        
    }
    
    public function getBasestationListMysqliT() {
        global $mysqli;
        $rArray = array();
        $sql = "SELECT *"
                . "FROM basestation_overicht";
        $stmt = mysqli_prepare($mysqli, $sql);
        if ($stmt !== FALSE) {
            $stmt->execute();
            $stmt->bind_result($id, $nodenr, $regio, $type, $opmerking);
            while($stmt->fetch())  {
                array_push($rArray, array($id, $nodenr, $regio, $type, $opmerking));
            }
            $stmt->close();
            return $rArray;
        }
    }

    public function updateBasestation($nodeNummer, $regio, $siteNaam, $type) {
        //TODO edit sql query
        global $mysqli;
        $sql = "UPDATE basestation"
                . "SET node=?, regio=?, site_naam=?, type=?"
                . "WHERE node_nummer = ?";
        $this->stmt = $mysqli->prepare($sql);
        if ($this->stmt !== FALSE) {
            $this->stmt->bind_param('sisss', $nodeNummer, $regio, $siteNaam, $type, $nodeNummer);
            $this->stmt->execute();
        }
    }

    public function deleteBasestation($nodeNummer) {
        //TODO edit sql query
        if (!is_int($id)) {
            trigger_error("deleteBasestation expects parameter to be an Integer");
        } else {
            global $mysqli;
            $sql = "DELETE FROM basestation"
                    . "WHERE basestation_id = ?";
            $this->stmt = $mysqli->prepare($sql);
            if ($this->stmt !== FALSE) {
                $this->stmt->bind_param('s', $nodeNummer);
                $this->stmt->execute();
            }
        }
    }

}
