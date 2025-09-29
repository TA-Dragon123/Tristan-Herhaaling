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
    $_get['nummer'] = $_GET['nummer'];
    ?>
    <style>
        body{
        background-color: black;
        }    
        .BAfoto{
            width: 200px;
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .borderrr{
        background-color: white;
        border: solid rgba(129, 129, 129, 0.13) 8px;
        border-radius: 10px;
        width: 90%;
        padding: 80px;
        color: #000;
        
        }
        
       
    </style>
    <!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small">I'm </span><?php
    echo "".$_SESSION["gebruiker"]."<br>
            Leerkracht op zandpoort";
            ?></h1>
    <p> <a href='Loguit.php'>Log uit</a>.</p>
    <div class="borderrr">
    <?php
    $sql = "SELECT volgnummer, leerlingnummer, vaknaam, score, maximum, (score / maximum) * 100 as resultaat 
    FROM tblpunt 
    WHERE leerlingnummer = '".$_get['nummer']."'";     
     $resultaat = $mysqli->query($sql);

     if ($resultaat->num_rows == 0) {
        echo "<h3>Deze leerling heeft nog geen punten.</h3>";
        exit;
     }
      
      echo "<table>
       <tr><td><h4>zijn punten</h4></td><tr>
                 <tr><td><strong>vak</strong></td><td><strong> punt </strong></td></tr>";
        while ($row = $resultaat->fetch_assoc()) {
            echo "<tr><td>". $row['vaknaam'] ."</td><td>".intval($row['resultaat'])."%</td>
            <td> <a href=wijzig.php?teveranderen=".$row['volgnummer'].">Wijzigen</a> </td>
            <td> <td> <a href=wis.php?tewissen=".$row['volgnummer'].">Wissen</a> </td>
            </tr>";
        }
        echo "</table>";
        ?>
    <!-- <img src="logo-zandpoort.png" alt="boy"  class="w3-image" width="400" height="600"> -->
    </div>
  </header>
  <img src="Busleyden_Atheneum_Logo.png" alt="" class="BAfoto"> >
</body>
</html>