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
  print"<h2>Liste des clients de l'Hotel :</h2>";
  
  $qq2=mysqli_query($conn,"SELECT* FROM client");
  print'<table style="border:1 none transparent;" class="tab"><tr><th>Nom</th><th>Prenom</th><th>Contact</th><th>Nationalite</th><th>Numero cni</th><th>adresse</th><th>Profession</th><th>Accompagner de:</th></tr>';
	while($rst2=mysqli_fetch_assoc($qq2)){
	 print"<tr>";
	         echo"<td>".$rst2['nom']."</td>";
	         echo"<td>".$rst2['prenom']."</td>";
                 echo"<td>".$rst2['contact']."</td>";
                 echo"<td>".$rst2['nationalite']."</td>";
                 echo"<td>".$rst2['N_cni']."</td>";
                 echo"<td>".$rst2['adresse']."</td>";
                 echo"<td>".$rst2['profession']."</td>";
                  echo"<td>".$rst2['Accompagnant']."</td>";
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
