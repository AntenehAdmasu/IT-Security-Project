<?php

require_once "../Manager/session.php";
ini_set("display_errors",0);
$sessionClass = new sessionClass();
$sessionClass->destorySession();
