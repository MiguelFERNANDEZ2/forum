<?php
spl_autoload_register(function($class){require_once '/var/www/forum2/' . $class . '.php';});
require 'setCookiesConnection.php';
header('Location: index.php?' . DonneesNavig::complementAdr() . '&connection');
?>
