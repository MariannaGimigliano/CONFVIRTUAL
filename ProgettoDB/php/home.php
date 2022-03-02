<?php
    require_once 'connection.php';
    $numConf = $dbh->getNumConferenze();
    //var_dump($numConf);
    require 'template/templateHome.php';
?>