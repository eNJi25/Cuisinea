<?php

$pdo = new PDO('mysql:dbname=studi_cuisinea;host=localhost', 'test', 'test');

$id = (int)$_GET['id'];
$query = $pdo->prepare("SELECT * FROM users WHERE id = :id");
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();
$result = $query->fetch();
