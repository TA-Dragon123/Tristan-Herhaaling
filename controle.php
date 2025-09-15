<?php
session_start();
$_SESSION["gebruiker"] = "";
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>controle</title>
</head>
<body>
    <?php
    if (isset($_POST["knop"])) {
        $sql = "SELECT wachtwoord, naam FROM tblgebruikers WHERE naam ='".$_SESSION["gebruiker"]."' and wachtwoord  ='".$_SESSION['wachtwoord']."'";
        $resultaat = $mysqli->query($sql);
        $rowAantal = $resultaat->num_rows;
        if $rowAantal = 1 {
            header ('Location: Leerling.php');
        }
    }
    ?>
</body>
</html>