<?php
class Afficheur
{
  public static function faire()
  {
    if(isset($_GET['discussion']))
      require 'retour.php';

    if(Client::getAuthentifie())
      require 'saluer.php';
    else
      require 'imprimeFormConnexionInscription.php';

    if(isset($_GET['discussion']))
      require 'listeMessages.php';
    else
      require 'listeDiscussions.php';

    if(Client::getAuthentifie())
      require 'imprimeFormDiscussion.php';
  }
}
?>
