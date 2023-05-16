<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_floberna_db";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="include/css/bootstrap.min.css"> 
    <script src="include/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="include/style.css">
    <title>hotel_appli</title>
</head>
<body style="background-color:#13727a;margin:0;padding:0;">
<div class=nav-bar>
<header style="background-color:black;display:inline-block">
<nav style="display:block;padding:10px;text-decoration:none;">
<li><img src="image/logo.jpg" style="width:60px;height:60px;color:yellow;border-radius:30px;"><b>HOTEL FLOBERNA</b></img></li>
<li><a href="AjoutClient.php" style="background-color: olive; text-decoration:none;color:white;border-radius:10px;">Gestion des Client</a></li>
<li><a href="ReservationChambre.php" style="background-color: olive; text-decoration:none;color:white;border-radius:10px;">Gestion des Reservations</a></li>
<li><a href="ListeChambre.php" style="background-color: olive; text-decoration:none;color:white;border-radius:10px;">Liste des Chambres </a></li>
<li><a href="ListeClient.php" style="background-color: olive; text-decoration:none;color:white;border-radius:10px;">Listes des Clients </a></li>
<li><a href="facturation.php" style="background-color: olive; text-decoration:none;color:white;border-radius:10px;">gestion de facture</a></li>
<li><a href="Aide.php" style="background-color:olive; text-decoration:none;color:white;border-radius:10px;">Aide</a></li>
</nav></header></div>
<div align="center">
<p><h1>Salut cher receptioniste!</h1><br> bienvenu dans le site de gestion de <b> l'Hotel Floberna</b></p>
</div>
<footer style="background-color=black;display:bock-inline;color:white;width:100%;margin-top:25%">
<div style="float:right;">
<img src="image/logo.jpg" style="width:60px;height:60px;color:white;olor:yellow;border-radius:30px;">HOTEL FLOBERNA"calme/securité/discretion"</img>
</div>
<div style="float:left;">contact:(+237)699914952/699269596/675688855</div>
</footer>
</body>
</html>