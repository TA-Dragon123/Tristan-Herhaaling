<?php
 session_start();
if ($_SESSION["login"] != true || $_SESSION["leerkracht"] != "ja") {
    header('Location: index.php');
    exit;
}
?>
<?php

include "connect.php";

if (isset($_POST['leerlingnummer'], $_POST['vaknaam'], $_POST['score'], $_POST['maximum'])) {
    $leerlingnummer = $mysqli->real_escape_string($_POST['leerlingnummer']);
    $vaknaam = $mysqli->real_escape_string($_POST['vaknaam']);
    $score = $mysqli->real_escape_string($_POST['score']);
    $maximum = $mysqli->real_escape_string($_POST['maximum']);

    $sql = "INSERT INTO tblpunt (leerlingnummer, vaknaam, score, maximum) 
            VALUES ('$leerlingnummer', '$vaknaam', '$score', '$maximum')";

    if ($mysqli->query($sql) === TRUE) {
        echo "Punten succesvol toegevoegd.";
    } else {
        echo "Fout bij het toevoegen van punten: " . $mysqli->error;
    }
} else {
    echo "Vul alle velden in.";
}

header("Location: Leerkracht.php");
exit();
?>