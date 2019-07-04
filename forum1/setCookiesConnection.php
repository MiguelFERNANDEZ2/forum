<?php
setcookie('identifiant', $_POST['identifiant'], time() + 60*60*24*365);
setcookie('mdp', $_POST['mdp'], time() + 60*60*24*365);
?>
