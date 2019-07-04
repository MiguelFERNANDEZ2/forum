<?php
class DonneesNavig
{
  private static $discussion;

  public static function init()
  {
    self::$discussion = isset($_GET['discussion']) ? 'discussion=' . $_GET['discussion'] : '';
  }

  public static function complementAdr()
  {
    return self::$discussion;
  }
}
DonneesNavig::init();
?>
