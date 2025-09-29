<?php
 session_start();
if ($_SESSION["login"] != true || $_SESSION["leerkracht"] != "ja") {
    header('Location: index.php');
    exit;
}
?>
<?php
include "connect.php";
echo "<h1>Vak verwijderen</h1>";
    $sql = "DELETE FROM tblpunt WHERE volgnummer ='".$_GET['tewissen']."'";
    if ($mysqli->query($sql)) {
        echo "Vak succesvol gewist.";
    } else {
        echo "Error vak wissen: " . $mysqli->error;
    }
    $mysqli->close();
    echo "<br><a href='Leerkracht.php'>Ga terug naar Punten</a>";
?>