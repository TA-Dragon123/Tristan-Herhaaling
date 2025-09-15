<?php
session_start();
$_SESSION["gebruiker"] = "";
$_SESSION["wachtwoord"] = "";
if (isset($_POST["naam"])) $_SESSION["gebruiker"] = $_POST["naam"];
if (isset($_POST["wachtwoord"])) $_SESSION["wachtwoord"] = $_POST["wachtwoord"];
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
        $sql = "SELECT wachtwoord, naam, Klas FROM tblgebruiker WHERE naam ='".$_POST["naam"]."' and wachtwoord  ='".$_POST['wachtwoord']."'";
        $resultaat = $mysqli->query($sql);
        $rowAantal = $resultaat->num_rows;
        if ($rowAantal == 1) {
            $rij = $resultaat->fetch_assoc();
            if ($rij["Klas"]  == "LKR") {
                $_SESSION["leerkracht"] = "ja";
                header ('Location: Leerkracht.php');
                exit;
            } else if ($rij["Klas"]  == "6AD") {
                $_SESSION["leerkracht"] = "nee";
                header ('Location: Leerling.php');
                exit;
            } else {
                echo "  <h2>Je bent niet ingelogd <br>
                        <a href='index.php'>Probeer opnieuw</a></h2>";
    }
}
    }
    ?>
</body>
</html>