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
    session_start();
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
        
        }
    </style>
    <!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small">I'm </span><?php
    echo "".$_SESSION["gebruiker"]."<br>
            leerkracht op zandpoort";
            ?></h1>
    <p> <a href='Loguit.php'>Log uit</a>.</p>
    <img src="logo-zandpoort.png" alt="boy" class="borderrr" class="w3-image" width="400" height="600">
  </header>
  <img src="Busleyden_Atheneum_Logo.png" alt="" class="BAfoto"> >
</body>
</html>