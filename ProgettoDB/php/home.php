<?php
    require_once 'connection.php';
    $templateParams["conferenze"] = $dbh->getNumConferenze();    //var_dump($numConf);
    require 'template/templateHome.php';
?>