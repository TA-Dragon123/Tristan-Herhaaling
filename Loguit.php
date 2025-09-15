<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uitloggen</title>
</head>
<body>
    <?php
        session_destroy();
        echo "  <h2>Je bent succesvol uitgelogd <br>
                <a href='index.php'>Log terug in</a></h2>";
    ?>
</body>
</html>