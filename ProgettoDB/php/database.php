<?php
    class DatabaseHelper{
        
        private $db;

        public function __construct($serverName, $username, $password, $dbName, $port){
            $db = new mysqli($serverName, $username, $password, $dbName, $port);
            if ($this->db->connect_error) {
                die("Connection failed." . $db->connect_error);
            }        
        }

        /* Statistiche (visibili da tutti gli utenti nella pagina iniziale) */
        
        public function getNumConferenze(){
            $query = "SELECT COUNT(*) FROM CONFERENZA";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getNumConferenzeAttive(){
            $query = "SELECT COUNT(*) FROM CONFERENZA WHERE Svolgimento=Completata";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getNumUtentiRegistrati(){
            $query = "SELECT COUNT(*) FROM UTENTE";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

    }
?>
