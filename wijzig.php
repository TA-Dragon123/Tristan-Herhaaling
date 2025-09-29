<?php
 session_start();
if ($_SESSION["login"] != true || $_SESSION["leerkracht"] != "ja") {
    header('Location: index.php');
    exit;
}
?>
<?php
    echo "<h1>Tabel wijzigen</h1>";
    include "connect.php";
    if (isset($_POST['teveranderen'])) {
        $score = $_POST["score"];
        $volgnummer = $_POST['volgnummer'];
    
        $sql = "UPDATE tblpunt SET score =".$score." WHERE volgnummer = '".$volgnummer."'";
        if ($mysqli->query($sql)) {
            echo "Vak succesvol gewijzigt";
        } else {
            echo "Error record wijzigen: ". $mysqli->error;
        }
        echo "<br><a href='leerkracht.php'>Ga terug</a>";

    } else {
        $sql = "SELECT * FROM tblpunt WHERE volgnummer ='".$_GET['teveranderen']."'";
        $resultaat = $mysqli->query($sql);
        $row = $resultaat->fetch_assoc();
        echo "<form method='post' action='wijzig.php'>
                <input type='hidden' name='volgnummer' value='".$row["volgnummer"]."'>
                <input type='text' name='score' value='".$row["score"]."'>
                <input type='submit' value='wijzig vak' name='teveranderen'>
              </form>";
    }
?>