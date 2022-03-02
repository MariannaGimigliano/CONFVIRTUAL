<?php
    session_start();
    require_once("database.php");
    $dbh = new DatabaseHelper("localhost", "root", "root", "confvirtual", 8889);
?>
