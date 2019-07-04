<?php
spl_autoload_register(function($class){require_once '/var/www/forum2/' . $class . '.php';});

setcookie('identifiant');
setcookie('mdp');

header('Location: index.php?' . DonneesNavig::complementAdr());
?>
