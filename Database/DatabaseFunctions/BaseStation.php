<?php


/**
 * Function class for basestation information
 *
 * @author Robin
 */
require_once __DIR__ . '/../DatabaseConnector/Connector.php';
//require_once __DIR__ . '/../mysql_connect.php';
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
    
    public function getBasestationList() {
        $sql = "SELECT * FROM basestation_overzicht";
        $this->db = Connector::getInstance();
        $this->sth = $this->db->getConnection()->prepare($sql);
        $this->sth->execute();
        $result = $this->sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    public function getBasestationListMysqli() {
        //TODO edit sql query
        global $mysqli;
        $sql = "SELECT * FROM basestation_overzicht";
        $this->stmt = $mysqli->prepare($sql);
        if ($this->stmt !== FALSE) {
            $this->stmt->execute();
            $this->stmt->bind_result($id, $snaam, $datum, $engineer, $type);
            while ($this->stmt->fetch()) {
                print($id . $snaam . $datum . $engineer . $type);
            }
            $this->stmt->close();
        }
    }
    
    public function updateBasestation($nodeNummer, $siteNaam, $typeBasestation) {
        //TODO edit sql query
        global $mysqli;
        $sql = "INSERT INTO basestation (node_nummer, site_naam, type_basestation)"
                . "VALUES (?, ?, ?)"
                . "WHERE node_nummer = ?";
        $this->stmt = $mysqli->prepare($sql);
        if ($this->stmt !== FALSE) {
            $this->stmt->bind_param('issi', $nodeNummer, $siteNaam, $typeBasestation, $nodeNummer);
            $this->stmt->execute();
        }
    }
    
    public function deleteBasestation($id) {
        //TODO edit sql query
        if (!is_int($id)) {
            trigger_error("deleteBasestation expects parameter to be an Integer");
        } else {
            global $mysqli;
            $sql = "DELETE FROM basestation"
                    . "WHERE basestation_id = ?";
            $this->stmt = $mysqli->prepare($sql);
            if ($this->stmt !== FALSE) {
                $this->stmt->bind_param('i', $id);
                $this->stmt->execute();
            }
        }
        
    }
}
