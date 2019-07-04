<?php
spl_autoload_register(function($class){require_once '/var/www/forum2/' . $class . '.php';});

PostMessage::faire($_GET['discussion']);
header('Location: index.php?discussion=' . $_GET['discussion']);
?>
