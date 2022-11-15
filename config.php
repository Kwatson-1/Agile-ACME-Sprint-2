<?php

    const DB_HOST = 'localhost';
    const DB_NAME = 'Assessment_3';
    const DB_USER = 'adminer';
    const DB_PASSWORD = 'P@ssw0rd';
	
$pdo = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);