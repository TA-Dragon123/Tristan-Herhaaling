<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inlog</title>
</head>
<body>
    <h1>Login</h1>
    <?php
    echo '  <form method="post" action="controle.php">
            Gebruikersnaam: <input type="text" name="naam"> <br>
            Wachtwoord: <input type="text" name="wachtwoord"> <br>
            <input type="submit" name="knop" value="Login"> 
            </form>';
    ?>
</body>
</html>