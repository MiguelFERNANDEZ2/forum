<?php
class Requetes
{
  private static $idExiste;
  private static $idmdpExiste;
  private static $discussionPresente;
  private static $discussions;
  private static $messages;
  private static $discussionTermine;

  public static function init()
  {
    $link = mysqli_connect('localhost', 'forum') or die('connect echec');
    mysqli_select_db($link, 'forum') or die('select db echec');

    if(Client::getPretendEtre() !== null)
    {
      $stmt = mysqli_prepare($link, 'SELECT identifiant FROM membres WHERE identifiant = ?;') or die('prepare echec 1');
      $identifiant = Client::getPretendEtre();
      mysqli_stmt_bind_param($stmt, 's', $identifiant) or die('bind echec');
      mysqli_stmt_execute($stmt) or die('exec echec');
      $res = mysqli_stmt_get_result($stmt) or die('recup mysqli_result echec');
      $vraiRes = mysqli_fetch_assoc($res);
      self::$idExiste = (bool)$vraiRes;
    }

    if(Client::getMDP() !== null)
    {
      $stmt = mysqli_prepare($link, 'SELECT hashMDP FROM membres WHERE identifiant = ?;') or die('prepare echec 2');
      $identifiant = Client::getPretendEtre();
      mysqli_stmt_bind_param($stmt, 's', $identifiant) or die('bind echec');
      mysqli_stmt_execute($stmt) or die('exec echec');
      $res = mysqli_stmt_get_result($stmt) or die('recup mysqli_result echec');
      $vraiRes = mysqli_fetch_assoc($res);
      self::$idmdpExiste = password_verify(Client::getMDP(), $vraiRes['hashMDP']);
    }

    if(isset($_GET['discussion']))
    {
      $index = intval($_GET['discussion']);
      $res = mysqli_query($link, "SELECT * FROM messages WHERE discussion = $index ORDER BY timestamp ASC");
      self::$messages = mysqli_fetch_all($res);

      $res = mysqli_query($link, 'SELECT titre FROM discussions WHERE id = ' . $_GET['discussion'] . ';');
      self::$discussionPresente = mysqli_fetch_array($res)[0];

      $res = mysqli_query($link, "SELECT COUNT(*) FROM messages WHERE discussion = $index;") or die('comptage echec');
      self::$discussionTermine = mysqli_fetch_array($res, MYSQLI_NUM)[0] >= 3;
    }
    else
    {
      $res = mysqli_query($link, 'SELECT * FROM discussions WHERE auteur <> "" ORDER BY dernier_message DESC;');
      self::$discussions = mysqli_fetch_all($res);
    }

    mysqli_close($link);
  }

  public static function getIdExiste()
  {
    return self::$idExiste;
  }
  public static function getIdmdpExiste()
  {
    return self::$idmdpExiste;
  }
  public static function getDiscussionPresente()
  {
    return self::$discussionPresente;
  }
  public static function getDiscussions()
  {
    return self::$discussions;
  }
  public static function getMessages()
  {
    return self::$messages;
  }
  public static function getDiscussionTermine()
  {
    return self::$discussionTermine;
  }
}
Requetes::init();
?>



