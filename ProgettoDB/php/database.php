<?php
    class DatabaseHelper{
        private $db;
    
        public function __construct($servername, $username, $password, $dbname, $port){
            $this->db = new mysqli($servername, $username, $password, $dbname, $port);
            if ($this->db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }        
        }

        /* Statistiche (visibili da tutti gli utenti nella pagina iniziale) */    

        public function getNumConferenze(){
            $query = "SELECT COUNT(*) as num FROM conferenza";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }
?>
