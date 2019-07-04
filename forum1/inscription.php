<?php
spl_autoload_register(function($class){require_once '/var/www/forum2/' . $class . '.php';});

if(isset($_POST['identifiant']) && $_POST['identifiant'] !== '' && isset($_POST['mdp']) && $_POST['mdp'] !== '') 
{
  $link = mysqli_connect('localhost', 'forum') or die('connect echec');
  mysqli_select_db($link, 'forum') or die('select db echec');

  $stmt = mysqli_prepare($link, 'INSERT INTO membres VALUES (?, ?);') or die('prepare echec');

  $identifiant = $_POST['identifiant'];
  $hashMDP = password_hash($_POST['mdp'], PASSWORD_BCRYPT);

  mysqli_stmt_bind_param($stmt, 'ss', $identifiant, $hashMDP) or die('bind echec');
  mysqli_stmt_execute($stmt);

  mysqli_close($link);
}
require 'setCookiesConnection.php';
header('Location: index.php?' . DonneesNavig::complementAdr() . '&inscription');
?>
