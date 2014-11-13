<?php


/**
 * Function class for basestation information
 *
 * @author Robin
 */
require_once __DIR__ . '/../DatabaseConnector/Connector.php';
class BaseStation {
    private $db;
    
    
    public function getBasestationList() {
        $this->db = Connector::getInstance();
        $sql = "SELECT * FROM basestation_overzicht";
        $sth = $this->db->getConnection()->prepare($sql);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}
