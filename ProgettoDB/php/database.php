<?php
    class DatabaseHelper{
        
        private $db;
    
        public function __construct($servername, $username, $password, $dbname, $port){
            $this->db = new mysqli($servername, $username, $password, $dbname, $port);
            if ($this->db->connect_error) {
                die("Connection failed: " . $this->db->connect_error);
            }        
        }

        /* Statistiche (visibili da tutti gli utenti nella pagina iniziale) */    

        public function getNumConferenze(){
            $query = "SELECT COUNT(*) as NumConf FROM CONFERENZA";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getNumConferenzeAttive(){
            $attiva = "Attiva";
            $query = "SELECT COUNT(*) as NumConfAtt FROM CONFERENZA WHERE Svolgimento=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s', $attiva);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getNumUtenti(){
            $query = "SELECT COUNT(*) as NumUtenti FROM UTENTE";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result->fetch_all(MYSQLI_ASSOC);
        } 

        public function getUtente($username){
            $query = "SELECT * FROM UTENTE WHERE Username = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s',$username);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getSpeaker($username){
            $query = "SELECT * FROM SPEAKER WHERE UsernameUtente = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s',$username);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getPresenter($username){
            $query = "SELECT * FROM PRESENTER WHERE UsernameUtente = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s',$username);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getAmministratore($username){
            $query = "SELECT * FROM AMMINISTRATORE WHERE UsernameUtente = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s',$username);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function insertUser($username, $password, $nome, $cognome, $datanascita, $luogonascita){
            $query= "INSERT INTO UTENTE(Username, Passwordd, Nome, Cognome, DataNascita, LuogoNascita) VALUES (?,?,?,?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ssssss', $username, $password, $nome, $cognome, $datanascita, $luogonascita);
            $stmt->execute();
        }

        public function insertValutazione($presentazione, $username, $voto, $note){
            $query= "INSERT INTO VALUTAZIONE (CodicePresentazione, UsernameUtente, Voto, Note) VALUES (?,?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('isis', $presentazione, $username, $voto, $note);
            $stmt->execute();
        }

        public function insertConferenza($anno, $acronimo, $nome, $logo){
            $query= "INSERT INTO CONFERENZA (AnnoEdizione, Acronimo, Nome, Logo) VALUES (?,?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('isss', $anno, $acronimo, $nome, $logo);
            $stmt->execute();
        }

        public function insertDataConferenza($acronimo, $anno, $data){
            $query= "INSERT INTO GIORNATA (AnnoEdizioneConferenza, AcronimoConferenza, Giorno) VALUES (?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('iss', $anno, $acronimo, $data);
            $stmt->execute();
        }

        public function updateDatiPresenter($username, $curriculum, $foto, $nomeUni, $nomeDipartimento){
            $query ="UPDATE PRESENTER SET Curriculum=? , Foto=?, NomeUni=?, NomeDipartimento=? WHERE UsernameUtente=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('sssss', $curriculum, $foto, $nomeUni, $nomeDipartimento, $username);
            $stmt->execute();
            $result = $stmt->get_result();
        
            return $stmt->execute();
        }
        
        public function updateCurriculumPresenter($username, $curriculum){
            $query ="UPDATE PRESENTER SET Curriculum=? WHERE UsernameUtente=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss', $curriculum, $username);
            $stmt->execute();
            $result = $stmt->get_result();

            return $stmt->execute();
        }

        public function updateNomeUniPresenter($username, $nomeUni){
            $query ="UPDATE PRESENTER SET NomeUni=? WHERE UsernameUtente=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss', $nomeUni, $username);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $stmt->execute();
        }

        public function updateNomeDipartimentoPresenter($username, $nomeDipartimento){
            $query ="UPDATE PRESENTER SET NomeDipartimento=? WHERE UsernameUtente=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss', $nomeDipartimento, $username);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $stmt->execute();
        }

        public function updateFotoPresenter($username, $foto){
            $query ="UPDATE PRESENTER SET Foto=? WHERE UsernameUtente=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss', $foto, $username);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $stmt->execute();
        }

        public function updateDatiSpeaker($username, $curriculum, $foto, $nomeUni, $nomeDipartimento){
            $query ="UPDATE SPEAKER SET Curriculum=? , Foto=?, NomeUni=?, NomeDipartimento=? WHERE UsernameUtente=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('sssss', $curriculum, $foto, $nomeUni, $nomeDipartimento, $username);
            $stmt->execute();
            $result = $stmt->get_result();
        
            return $stmt->execute();
        }
        
        public function updateCurriculumSpeaker($username, $curriculum){
            $query ="UPDATE SPEAKER SET Curriculum=? WHERE UsernameUtente=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss', $curriculum, $username);
            $stmt->execute();
            $result = $stmt->get_result();

            return $stmt->execute();
        }

        public function updateNomeUniSpeaker($username, $nomeUni){
            $query ="UPDATE SPEAKER SET NomeUni=? WHERE UsernameUtente=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss', $nomeUni, $username);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $stmt->execute();
        }

        public function updateNomeDipartimentoSpeaker($username, $nomeDipartimento){
            $query ="UPDATE SPEAKER SET NomeDipartimento=? WHERE UsernameUtente=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss', $nomeDipartimento, $username);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $stmt->execute();
        }

        public function updateFotoSpeaker($username, $foto){
            $query ="UPDATE SPEAKER SET Foto=? WHERE UsernameUtente=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('ss', $foto, $username);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $stmt->execute();
        }

        public function getConferenze(){
            $query = "SELECT DISTINCT Nome, Acronimo, AnnoEdizione, Logo FROM CONFERENZA WHERE Svolgimento=?";
            $stmt = $this->db->prepare($query);
            $attiva = "Attiva";
            $stmt->bind_param('s',$attiva);

            $stmt->execute();
            $result = $stmt->get_result();
    
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getConferenzaByNome($nome){
            $query = "SELECT AnnoEdizione, Acronimo, Nome FROM CONFERENZA WHERE Nome=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s',$nome);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getDateConferenza($nomeConf){
            $query = "SELECT Giorno FROM conferenze_disponibili WHERE Nome=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s',$nomeConf);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function insertIscrizione($annoEdizioneConferenza, $acronimoConferenza, $usernameUtente){
            $query= "INSERT INTO ISCRIZIONE(AnnoEdizioneConferenza, AcronimoConferenza, UsernameUtente) VALUES (?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('sss', $annoEdizioneConferenza, $acronimoConferenza, $usernameUtente);
            $stmt->execute();
        }

        public function getSessionibyConferenza($acronimoConf){
            $query = "SELECT * FROM SESSIONE WHERE AcronimoConferenza=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s',$acronimoConf);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getPresentazioniBySessione($codiceSessione){
            $query = "SELECT * FROM SESSIONE, FORMAZIONE, PRESENTAZIONE WHERE SESSIONE.Codice=CodiceSessione AND PRESENTAZIONE.Codice=CodicePresentazione AND CodiceSessione=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('i',$codiceSessione);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $result->fetch_all(MYSQLI_ASSOC);
        }

        public function getGiornate($conferenza){
            $query = "SELECT Giorno FROM GIORNATA WHERE AcronimoConferenza=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s',$conferenza);
            $stmt->execute();
            $result = $stmt->get_result();
    
            return $result->fetch_all(MYSQLI_ASSOC);
        }

    }
?>
