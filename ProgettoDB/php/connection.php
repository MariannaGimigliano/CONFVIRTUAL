<?php
    session_start();
    require_once("database.php");
    $dbh = new DatabaseHelper("localhost", "root", "", "confvirtual", 3306);
?>
