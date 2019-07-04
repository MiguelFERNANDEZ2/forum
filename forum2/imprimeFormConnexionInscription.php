<?php
$identifiant = isset($_COOKIE['identifiant']) ? $_COOKIE['identifiant'] : '';

$erreur = '';


if(isset($_GET['inscription']))
  $erreur = 'ce compte existe déja';

if(isset($_GET['connection']))
{
  if(Client::getCompteExiste())
    $erreur = 'mot de passe incorrect';
  else
    $erreur = 'compte inexistant';
}

echo "<form method='post'>";
echo '<table><tbody>';
echo '<tr>';
echo '<td style="text-align:right;">identifiant : </td>';
echo "<td><input name='identifiant' maxlength='32' value='$identifiant' required /></td>";
echo "<td><button formaction='connection.php?" . DonneesNavig::complementAdr() . "'>connection</button></td>";
echo "<td rowspan='2'>$erreur</td>";
echo '</tr>';
echo '<tr>';
echo '<td style="text-align:right;">mot de passe : </td>';
echo "<td><input name='mdp' maxlength='32' required /></td>";
echo "<td><button style='width:100%;' formaction='inscription.php?" . DonneesNavig::complementAdr() . "'>inscription</button></td>";
echo '</tr>';
echo '</tbody></table>';
echo '</form>';
?>
