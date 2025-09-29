<?php
 session_start();
if ($_SESSION["login"] != true || $_SESSION["leerkracht"] != "ja") {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php
    
    include "connect.php";
    $vak = isset($_POST['vak']) ? $_POST['vak'] : null;

    if (isset($_POST['Submit'])) {
        $vak = $_POST['vak'];
        print "$vak";
    }
    ?>
    <style>
        body {
            background-color: black;
        }
        .borderrr {
            background-color: white;
            border: solid rgba(129, 129, 129, 0.13) 8px;
            border-radius: 10px;
            width: 90%;
            padding: 80px;
            color: #000;
        }
    </style>

    <div class="w3-padding-large" id="main">

        <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
            <h1 class="w3-jumbo">
                <span class="w3-hide-small">I'm </span>
                <?php
                echo $_SESSION["gebruiker"] . "<br>leerkracht op zandpoort";
                ?>
            </h1>
            <p><a href='Loguit.php'>Log uit</a>.</p>
            <div class="borderrr">
                <?php
                $sql = "SELECT * FROM tblgebruiker WHERE klas = '6AD'";
                $resultaat = $mysqli->query($sql);

                if ($resultaat->num_rows == 0) {
                    echo "<h3>6AD heeft geen kinderen</h3>";
                    exit;
                }

                echo "<table  style='width:100%; text-align:left;'>
                        <tr>
                            <th>Naam</th>
                            <th>Voornaam</th>
                            <th>Punten</th>
                        </tr>";

                        while ($row = $resultaat->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row['naam'] . "</td>
                                    <td>" . $row['voornaam'] . "</td>
                                    <td>";
                        
                            $sqlPunten = "SELECT * FROM tblpunt 
                                          WHERE leerlingnummer = '" . $row['nummer'] . "' 
                                          AND vaknaam = '" . $vak . "'";
                            $resultaatPunten = $mysqli->query($sqlPunten);
                        
                            if ($resultaatPunten->num_rows > 0) {
                                echo "<table  style='width:100%; text-align:left;'>
                                        <tr>
                                            <th>Score</th>
                                            <th>Maximum</th>
                                        </tr>";
                                while ($punt = $resultaatPunten->fetch_assoc()) {
                                    
                                    $volgnummer = $punt['volgnummer'] ?? 'Onbekend';
                                    echo "<tr>
                                    <td>" . $punt['score'] . "</td>
                                    <td>" . $punt['maximum'] . "</td>
                                    <td> <a href=wijzig.php?teveranderen=" . $volgnummer . ">Wijzigen</a> </td>
                                    <td> <a href=wis.php?tewissen=" . $volgnummer . ">Wissen</a> </td>
                                    </tr>";
                        }
                            echo" <form action='verwerk_toevoegen.php' method='POST'>
                        <input type='hidden' name='leerlingnummer' value='" . $row['nummer'] . "'>
                        <input type='hidden' name='vaknaam' value='" . $vak . "'>
                        <input type='number' name='score' placeholder='Score' required>
                        <input type='number' name='maximum' placeholder='Maximum' required>
                        <button type='submit'>Toevoegen</button>
                    </form>";
                        echo "</table>";
                    } else {
                        echo "Geen punten beschikbaar.";
                        echo" <form action='verwerk_toevoegen.php' method='POST'>
                        <input type='hidden' name='leerlingnummer' value='" . $row['nummer'] . "'>
                        <input type='hidden' name='vaknaam' value='" . $vak . "'>
                        <input type='number' name='score' placeholder='Score' required>
                        <input type='number' name='maximum' placeholder='Maximum' required>
                        <button type='submit'>Toevoegen</button>
                    </form>";
                    }

                    echo "</td></tr>";
                }

                echo "</table>";
                ?>

     