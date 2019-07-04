<?php
class PostMessage
{
  public static function faire($index)
  {
    $link = mysqli_connect('localhost', 'forum') or die('connect echec');
    mysqli_select_db($link, 'forum') or die('select db echec');

    $stmt = mysqli_prepare($link, "INSERT INTO messages (auteur, message, timestamp, discussion) VALUES (?, ?, NOW(), $index);") or die (mysqli_error($link));

    $auteur = Client::getPretendEtreAffichable();
    $message = $_POST['message'];

    mysqli_stmt_bind_param($stmt, 'ss', $auteur, $message) or die('bind echec');
    mysqli_stmt_execute($stmt);

    $res = mysqli_query($link, "SELECT MAX(timestamp) FROM messages WHERE discussion = $index;");
    $timestamp = mysqli_fetch_array($res)[0];

    $requete = 'UPDATE discussions SET dernier_message = "' . $timestamp . '" WHERE id = ' . $index . ';';
    mysqli_query($link, $requete) or die($requete);

    mysqli_close($link);
  }
}
?>
