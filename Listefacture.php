<?php 
/*include_once('conn.php');*/
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
<html>
<head>
	<title>hotel_appli</title>
	<meta charset="utf8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="include/css/bootstrap.min.css"> 
    <script src="include/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="include/style.css">
</head>

<body style="background-color:#13727a;margin:0;padding:0;">
<div class=nav-bar>
<header style="background-color:black;display:inline-block">
<nav style="display:block;padding:10px;text-decoration:none;">
<li><img src="image/logo.jpg" style="width:60px;height:60px;color:yellow;border-radius:30px;"><b>HOTEL FLOBERNA</b></img></li>

<li><a href="Aide.php" style="background-color:olive; text-decoration:none;color:white;border-radius:10px;">Aide</a></li>
</nav></header></div>
<div align="center">
   <?php 
  print"<h2>Liste des factures de l'Hotel :</h2>";
  
  $qq2=mysqli_query($conn,"SELECT* FROM facture");
  print'<table style="border:1 none transparent;" class="tab"><tr><th>Numero facture</th><th>nom du client</th><th>Contact du client</th><th>date de reservation</th><th>montant</th><th>chambre</th><th>accompagner de</th><th>facturer par:</th></tr>';
	while($rst2=mysqli_fetch_assoc($qq2)){
	 print"<tr>";
	         echo"<td>".$rst2['num_facture']."</td>";
	         echo"<td>".$rst2['nom_client']."</td>";
                 echo"<td>".$rst2['contact_client']."</td>";
                 echo"<td>".$rst2['date_reservation']."</td>";
                 echo"<td>".$rst2['montant']."</td>";
                  echo"<td>".$rst2['num_chambre']."</td>";
                 echo"<td>".$rst2['Accompagnant']."</td>";
                 echo"<td>".$rst2['nom_receptioniste']."</td>";
	         print"</tr>";
	}
	  print'</table>';
  
  ?>
   
</div>
<footer style="background-color=black;display:bock-inline;color:white;width:100%;margin-top:25%;">
<div style="float:right;">
<img src="image/logo.jpg" style="width:60px;height:60px;color:white;olor:yellow;border-radius:30px;">HOTEL FLOBERNA"calme/securité/discretion"</img>
</div>
<div style="float:left;">contact:(+237)699914952/699269596/675688855</div>
</footer>
</body>
</html>
