<?php
$DbAccess = parse_ini_file('../private.ini');
$dbServer = $DbAccess['dbServer'];
$dbuser = $DbAccess['dbuser'];
$dbpass = $DbAccess['dbpass'];
$dbname = $DbAccess['dbname'];
$conn = mysqli_connect($dbServer, $dbuser, $dbpass, $dbname);
