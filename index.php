<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inlog</title>
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    <style>
        body{
        background-color: black;
        color: #ffffffff;
        }    
    </style>
    <!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    <h1 class="w3-jumbo"><span class="w3-hide-small">Login</span><?php
    echo '  <form method="post" action="controle.php">
            <br>
            Gebruikersnaam: <input type="text" name="naam"> <br><br>
            Wachtwoord: <input type="text" name="wachtwoord"> <br><br>
            <input type="submit" name="knop" value="Login"> 
            </form>';
    ?></h1>
   
   
    
  
</body>
</html>