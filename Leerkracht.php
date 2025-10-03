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
    ?>
    <style>
        body {
            background-color: black;
        }    
        .BAfoto {
            width: 200px;
            position: absolute;
            top: 20px;
            right: 20px;
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
                echo "" . $_SESSION["gebruiker"] . "<br>leerkracht op zandpoort";
                ?>
            </h1>
            <p><a href='Loguit.php'>Log uit</a>.</p>
            <div class="borderrr">
                <?php
                $LKRNR = $_SESSION["LKRNR"];

                $sql = "SELECT g.naam, g.voornaam, g.nummer, ROUND(SUM(p.score) / SUM(p.maximum) * 100, 2) AS resultaat
                        FROM tblgebruiker g
                        JOIN tblpunt p ON g.nummer = p.leerlingnummer
                        JOIN tblpuntenboek pb ON p.vaknaam = pb.vaknaam
                        WHERE g.klas = '6AD'
                        AND pb.leerkrachtnr = ?
                        AND pb.klasnaam = '6AD'
                        GROUP BY g.naam, g.voornaam, g.nummer
                        ORDER BY g.naam, g.voornaam";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("i", $LKRNR);
                $stmt->execute();
                $resultaat = $stmt->get_result();

                echo "<table>
                        <tr><td><h4>Jouw klas</h4></td></tr>
                        <tr><td><strong>Naam</strong></td><td><strong>Voornaam</strong></td><td><strong>Resultaat</strong></td></tr>";
                while ($row = $resultaat->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row['naam']) . "</td>
                            <td>" . htmlspecialchars($row['voornaam']) . "</td>
                            <td>" . htmlspecialchars($row['resultaat']) . "</td>
                            <td><a href='bekijkenpunten.php?nummer=" . htmlspecialchars($row['nummer']) . "'>Bekijk</a></td>
                          </tr>";
                }
                echo "</table>";

                $sql = "SELECT vaknaam FROM tblpuntenboek WHERE leerkrachtnr = ? AND klasnaam = '6AD'";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("i", $LKRNR);
                $stmt->execute();
                $resultaat = $stmt->get_result();

                echo "<form method='POST' action='toevoegen.php'>";
                echo "<label for='vak'>Kies een vak:</label>";
                echo "<select name='vak' id='vak'>";
                echo "<option value=''>Selecteer een vak</option>";

                while ($row = $resultaat->fetch_assoc()) {
                    echo "<option value='" . htmlspecialchars($row['vaknaam']) . "'>" . htmlspecialchars($row['vaknaam']) . "</option>";
                }
                

                echo "</select>";
                echo "<input type='submit' name='Submit' value='Select'>";
                echo "</form>";
                ?>
            </div>
        </header>
        <img src="Busleyden_Atheneum_Logo.png" alt="" class="BAfoto">
    </div>
</body>
</html>
