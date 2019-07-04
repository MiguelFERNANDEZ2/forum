<?php
class Client
{

  private static $pretendEtre = null;
  private static $pretendEtreAffichable = null;
 
  private static $compteExiste;
  private static $mdp = null;
  private static $authentifie;

  public static function init()
  {
    if(isset($_COOKIE['identifiant']))
    {
      self::$pretendEtre = $_COOKIE['identifiant'];
      self::$pretendEtreAffichable = htmlspecialchars(self::$pretendEtre);
    }

    if(isset($_COOKIE['mdp']))
      self::$mdp = $_COOKIE['mdp'];

    self::$compteExiste = Requetes::getIdExiste();
    self::$authentifie = Requetes::getIdmdpExiste();
  }

  public static function getMDP()
  {
    return self::$mdp;
  }
  public static function getCompteExiste()
  {
    return self::$compteExiste;
  }
  public static function getPretendEtre()
  {
    return self::$pretendEtre;
  }
  public static function getPretendEtreAffichable()
  {
    return self::$pretendEtreAffichable;
  }
  public static function getAuthentifie()
  {
    return self::$authentifie;
  }
} 
Client::init();
?>
