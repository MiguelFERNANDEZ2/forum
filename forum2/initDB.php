<?php
$link = mysqli_connect('localhost', 'forum') or die('connection echec');
mysqli_query($link, 'CREATE DATABASE forum;');
mysqli_select_db($link, 'forum') or die('selection db echec');

mysqli_query($link, 'CREATE TABLE membres (identifiant VARCHAR(32) PRIMARY KEY, hashMDP CHAR(60) NOT NULL);');
mysqli_query($link, 'CREATE TABLE discussions (id TINYINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, auteur VARCHAR(32) NOT NULL, titre VARCHAR(128) NOT NULL, dernier_message TIMESTAMP);');
mysqli_query($link, "CREATE TABLE messages (auteur VARCHAR(32), message TEXT, timestamp TIMESTAMP, discussion TINYINT UNSIGNED, FOREIGN KEY (discussion) REFERENCES discussions(id), PRIMARY KEY(auteur,timestamp, discussion));");

mysqli_close($link);
?>
