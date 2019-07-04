<?php
echo '<table style="margin: 10px 0px;">';
echo '<thead><tr><th>auteur</th><th>titre</th><th>dernier message</th></tr></thead>';
echo '<tbody>';

foreach(Requetes::getDiscussions() as $discussion)
  echo '<tr class="discussion"><td>' . $discussion[1] . '</td><td><a href="index.php?discussion=' . $discussion[0] . '">' . $discussion[2] . '</a></td><td>' . $discussion[3] . '</td></tr>';

echo '</tbody>';
echo '</table>';
?>
