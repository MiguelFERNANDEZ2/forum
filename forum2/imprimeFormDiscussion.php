<?php
  $action = isset($_GET['discussion']) ? 'nouveauMessage.php?discussion=' . $_GET['discussion'] : 'nouvelleDiscussion.php';

  echo "<form method='post' style='margin: 10px 0px;' action='$action'>"; 

  if(!isset($_GET['discussion']))
    echo '<div>titre : <input name="titre" maxlength="128" required /></div>';

  echo '<div>message :</div>';
  echo '<textarea name="message"></textarea>';
  echo '<div><input type="submit"/></div>';

  echo '</form>';
?>
