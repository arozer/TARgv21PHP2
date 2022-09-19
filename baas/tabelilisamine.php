<?php
require_once('conf.php');
global $yhendus;


if(isset($_REQUEST["kustuta"]))
{
    $kask=$yhendus->prepare("DELETE FROM inimene WHERE id=?");
    $kask->bind_param("i", $_REQUEST["kustuta"]);
    $kask->execute();
}

if(isset($_REQUEST["eesnimi"])) {
    $kask = $yhendus->prepare("INSERT INTO inimene(nimi,synnipaev,pilt) VALUES (?,?,?)");
    $kask->bind_param("sss", $_REQUEST["eesnimi"], $_REQUEST["synnipaev"], $_REQUEST["pilt"]);
//$_REQUEST["eesnimi"] - обращение к текстовому ящику  в форме
    $kask->execute();
    // header("Location: $_SERVER[PHP_SELF]");
}


// tabeli sisu näitamine
$kask=$yhendus->prepare("SELECT id, nimi, synnipaev, pilt,silmadevarv FROM inimene");
$kask->bind_result($id, $nimi, $synnipaev,$pilt,$silmadevarv);
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
        <th>silmadevärv</th>
    </tr>
    <?php
    while($kask->fetch())
    {
        echo "<tr>";
        echo "<td>".htmlspecialchars($id)."</td>";
        echo "<td style='color:$silmadevarv'>".htmlspecialchars($nimi)."</td>";
        echo "<td >".htmlspecialchars($synnipaev)."</td>";
        echo "<td> <image src='$pilt' alt='ilus pilt'></image></td>";
        echo "<td >".htmlspecialchars($silmadevarv)."</td>";
        echo "</tr>";
        echo "<td> <a href='?kustuta=$id'>kustuta</a></td>";
    }
    ?>

</table>

<h2>Uue inimeste lisamine</h2>
<form action="?">
    <input type="hidden" name="lisamisvorm">
    Nimi: <input type="text" name="eesnimi">
    <br>
    Sünnipäev: <input type="date" name="synnipaev">
    <br>
    Pildi link: <textarea name="pilt">
    </textarea>
    <br>
    <input type="submit" value="Lisa">
</form>

</body>
<?php
$yhendus->close();

//lisa tabelisse veerg silmadevärv ja taida värvidega,ingilise kelles.
//veebilehel kõik Nimed(tekst) värvida silmadevärviga
?>
</html>

