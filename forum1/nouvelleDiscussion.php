<?php
spl_autoload_register(function($class){require_once '/var/www/forum2/' . $class . '.php';});
if(Client::getAuthentifie() && isset($_POST['message']) && isset($_POST['titre']) && $_POST['titre'] !== '')
{
  $link = mysqli_connect('localhost', 'forum') or die('connect echec');
  mysqli_select_db($link, 'forum') or die('select db echec');

  $stmt = mysqli_prepare($link, "INSERT INTO discussions(auteur, titre) VALUES (?, ?);") or die('nouvelle discu prepare echec');

  $auteur = Client::getPretendEtreAffichable();
  $titre = $_POST['titre'];

  mysqli_stmt_bind_param($stmt, 'ss', $auteur, $titre) or die('bind echec');
  mysqli_stmt_execute($stmt);

  $res = mysqli_query($link, 'SELECT MAX(id) FROM discussions;') or die ('max id echec');
  $index = mysqli_fetch_array($res)[0];
  PostMessage::faire($index);

  mysqli_close($link);
}
header('Location: index.php?discussion=' . $index);
?>
