<?php
$pdo = new PDO("mysql:host=localhost:3306;dbname=mercury;charset=utf8", "root", "jamesWebDev");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
