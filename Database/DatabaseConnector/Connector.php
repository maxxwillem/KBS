<?php

/**
 * This is a factory class for creating a (PDO) connection with the database<br />
 * usage example: <br />
 * $exampleVariable = Connector::getInstance(); 
 * <br />
 * To use this class for mysql statements: <br />
 * $exampleVariable->getConnection()->prepare(SQL query here);
 * 
 * @author Robin Koning
 */
class Connector {

    private static $INSTANCE;
    /**
     *
     * @var PDO
     */
    private $db;

    /**
     * 
     * @return the instance for the database connection
     */
    public static function getInstance() {
        if (!self::$INSTANCE) {
            self::$INSTANCE = new Connector();
        }
        return self::$INSTANCE;
    }

    /**
     * 
     * @return the database connection
     */
    public function getConnection() {
        try {
            if (!$this->db) {
                $this->db = new PDO('mysql:host=localhost:3307;dbname=rmd', "root", "usbw");
            }
        } catch (PDOException $e) {
            print("Connection error: " . $e->getMessage());
        }
        return $this->db;
    }

}
