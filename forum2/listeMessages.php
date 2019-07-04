<?php
echo '<div style="color: green; font-weight: bold; margin: 10px 0px;">' . Requetes::getDiscussionPresente() . '</div>';

$numMessage = 1;
foreach(Requetes::getMessages() as $message)
{
  echo '<div class="message">';
  echo '<div>#' . $numMessage++ . ' <span class="pseudo">' . $message[0] . '</span> à écrit le ' . $message[2] . '</div>';
  echo '<div>' . htmlspecialchars($message[1]) . '</div>';
  echo '</div>';
}
?>
