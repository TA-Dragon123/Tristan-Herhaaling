<?php
session_start();
$_SESSION["login"] = false;
$_SESSION["gebruikernr"] = 0;
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
    if (isset($_POST["knop"])) {
        $sql = "SELECT wachtwoord, naam, Klas , nummer FROM tblgebruiker WHERE naam ='".$_POST["naam"]."' and wachtwoord  ='".$_POST['wachtwoord']."'";
        $resultaat = $mysqli->query($sql);
        $rowAantal = $resultaat->num_rows;
        if ($rowAantal == 1) {
            $rij = $resultaat->fetch_assoc();
            $_SESSION["gebruikernr"] = $rij["nummer"];
            if ($rij["Klas"]  == "LKR") {
                $_SESSION["leerkracht"] = "ja";
                $_SESSION["login"] = true;
                $_SESSION["LKRNR"] = $rij["nummer"];
                header ('Location: Leerkracht.php');
                exit;
            } else if ($rij["Klas"]  == "6AD") {
                $_SESSION["leerkracht"] = "nee";
                $_SESSION["login"] = true;

                header ('Location: Leerling.php');
                exit;
            } else {
                echo "  <h2>Je bent niet ingelogd <br>
                        <a href='index.php'>Probeer opnieuw</a></h2>";
        }
        } else {
            echo "  <h2>Je bent niet ingelogd <br>
                    <a href='index.php'>Probeer opnieuw</a></h2>";
    }
}
    ?>
</body>
</html>