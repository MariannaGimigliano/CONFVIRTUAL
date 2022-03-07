<?php
require_once 'connection.php';


if (isset($_POST['btnInserisciDati'])) {
    
    $username = $_SESSION["username"];
    $curriculum = $_POST['curriculum'];
    $foto = $_POST['foto'];
    $nomeUni = $_POST['nomeUni'];
    $nomeDipartimento = $_POST['nomeDipartimento'];
                
    $dbh->updateDatiPresenter($username, $curriculum, $foto, $nomeUni, $nomeDipartimento);
           
}

if (isset($_POST['btnModificaDati'])) {
    
    $username = $_SESSION["username"];
    $curriculum = $_POST['curriculum'];
    $foto = $_POST['foto'];
    $nomeUni = $_POST['nomeUni'];
    $nomeDipartimento = $_POST['nomeDipartimento'];

    if($curriculum!=""){
        $dbh->updateCurriculum($_SESSION['username'], $curriculum);
    }

    if($foto!=""){
        $dbh->updateFoto($_SESSION['username'], $foto);
    }

    if($nomeUni!=""){
        $dbh->updateNomeUni($_SESSION['username'], $nomeUni);
    }

    if($nomeDipartimento!=""){
        $dbh->updateNomeDipartimento($_SESSION['username'], $nomeDipartimento);
    }           
}

//var_dump($templateParams);
require 'template/templateDatiPresenter.php';
?>