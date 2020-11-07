<?php
$pdo = new PDO("mysql:host=localhost;dbname=mercury;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
