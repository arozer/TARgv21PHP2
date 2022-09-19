<?php
require_once('conf.php');
global $yhendus;

// tabeli sisu näitamine
$kask=$yhendus->prepare("SELECT id, nimi, synnipaev, pilt FROM inimene");
$kask->bind_result($id, $nimi, $synnipaev,$pilt);
$kask->execute();
?>
<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <title>Inimeste andmed tabelist</title>
</head>
<body>
<h1>Inimeste andmed AB tabelist</h1>

<table>

    <tr>
        <th>id</th>
        <th>nimi</th>
        <th>sünnipäev</th>
        <th>pilt</th>
    </tr>
<?php
while($kask->fetch())
{
    echo "<tr>";
    echo "<td>".htmlspecialchars($id)."</td>";
    echo "<td>".htmlspecialchars($nimi)."</td>";
    echo "<td>".htmlspecialchars($synnipaev)."</td>";
    echo "<td> <image src='$pilt' alt='ilus pilt'></image></td>";
    echo "</tr>";
}
?>

</table>

</body>
</html>
