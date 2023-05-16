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
<?php 
$id=@$_POST['id'];
$dated=@$_POST['dated'];
$datef=@$_POST['datef'];
$numcli=@$_POST['numcli'];
$num=@$_POST['nump'];
$prix=@$_POST['prix2'];
$montant=@$_POST['prix'];
$mess='';
$mess2='';
//reserver
if(isset($_POST['boutrsv'])){
  if(!empty($num)){
  $rq=mysqli_query($conn,"INSERT INTO reservation (numporte,prix,datedebut,datefin,numclient,montant) VALUES ('$num','$prix','$dated','$datef','$numcli','$montant')");
      
       if($rq){
    $mess2='<b class="succes">Réservation réussie !</b>';
             }
        else
    $mess2="<b class='erreur'>Echec réservation !</b>";
  }
  
     }
?>
<?php 
//occupée oui
if(isset($_POST['btoui'])&&!empty($num)){
$rq=mysqli_query($conn,"UPDATE chambre SET occupee='oui' WHERE numporte='$num'");
if($rq){
$mess2='<b class="succes">OK!</b>';
}
else
$mess2="<b class='erreur'>Erreur de validation !</b>";
}

?>
<?php 
//occupée non
if(isset($_POST['btnon'])&&!empty($num)){
$rq=mysqli_query($conn,"UPDATE chambre SET occupee='non' where numporte='$num'");
if($rq){
$mess2='<b class="succes">OK!</b>';
}
else
$mess2="<b class='erreur'>Erreur de validation !</b>";
}

?>
<?php 
//annulation
if(isset($_POST['boutannul'])&&!empty($num)){
$rq=mysqli_query($conn,"UPDATE reservation SET datedebut='NULL',datefin='NULL',numclient='NULL',occupee='non' WHERE numporte='$num'");
if($rq){
$mess2='<b class="succes">Annulation réussie !</b>';
}
else
$mess2="<b class='erreur'>Impossible d'annuler !</b>";
}
?>

<?php 
  //fin d'une reservation
   mysqli_query($conn,"UPDATE chambre SET datedebut='NULL',datefin='NULL',numclient='NULL',occupee='non'
   WHERE (DATEDIFF(datefin,NOW())<0) OR (occupee='non' AND DATEDIFF(datedebut,NOW())<=-1) ");
  
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
<li><a href="AjoutClient.php" style="background-color: olive; text-decoration:none;color:white;border-radius:10px;">Gestion des Client</a></li>
<li><a href="ReservationChambre.php" style="background-color: olive; text-decoration:none;color:white;border-radius:10px;">Gestion des Reservations</a></li>
<li><a href="ListeChambre.php" style="background-color: olive; text-decoration:none;color:white;border-radius:10px;">Liste des Chambres </a></li>
<li><a href="ListeClient.php" style="background-color: olive; text-decoration:none;color:white;border-radius:10px;">Listes des Clients </a></li>
<li><a href="AccueilReceptioniste.php" style="background-color:olive; text-decoration:none;color:white;border-radius:10px;">Accueil</a></li>
<li><a href="Aide.php" style="background-color:olive; text-decoration:none;color:white;border-radius:10px;">Aide</a></li>
</nav></header></div>
<div align="center">
<?php 
  print"<h2>Liste des chambres disponibles de l'Hotel :</h2>";
  
  $qq2=mysqli_query($conn,"SELECT numporte,prix_sieste,prix_nuite FROM chambre where numclient=0 ");
  print'<table style="border:1 none transparent" class="tab"><tr><th>NUMERO PORTE</th><th>PRIX_SIESTE(FCFA)</th><th>PRIX_NUITE(FCFA)</th></tr>';
	while($rst2=mysqli_fetch_assoc($qq2)){
	 print"<tr>";
	         echo"<td>".$rst2['numporte']."</td>";
	         echo"<td>".$rst2['prix_sieste']."</td>";
                 echo"<td>".$rst2['prix_nuite']."</td>";
	         print"</tr>";
	}
	  print'</table>';
  
  ?>
<hr>
  <h2>Réservation des chambres</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" >
  <table align="">
  
     <tr ><td></td><td> <?php print $mess2;?></td></tr>
    <tr><td></td><td><strong >Numéro porte :</strong></td>
   <td></td><td><input type="text" name="nump" class="champ" size="20" style="border-radius:10px;" ></td>
   <td><strong >Occupée ?</strong></td>
   <td><input type="submit" name="btoui" value="Oui" class="bouton" style="border-radius:10px;"></td>
   <td><input type="submit" name="btnon" value="Non" class="bouton" style="border-radius:10px;"></td>
   </tr>
    <tr><td></td><td><strong >Prix :</strong></td>
   <td></td><td><input type="number" name="prix2" class="champ" size="20" min="0" style="border-radius:10px;" ></td></tr>
   <tr><td></td><td><strong>Date début :</strong></td>
   <td></td><td><input type="date" name="dated"  class="champ" size="25" style="border-radius:10px;"></td></tr>
   <tr><td></td><td><strong>Date fin :</strong></td>
   <td></td><td><input type="date" name="datef"  class="champ" size="25" style="border-radius:10px;"></td></tr>
   <tr><td></td><td><strong>Contact client :</strong></td>
   <td></td><td><input type="number" name="numcli" min="0"  class="champ" size="25" style="border-radius:10px;"></td></tr>
   <tr><td></td></tr>
   <tr><td></td><td><strong >montant :</strong></td>
   <td></td><td><input type="number" name="prix" class="champ" size="20" min="0" style="border-radius:10px;" ></td></tr>
   <tr><td></td><td><input type="submit" name="boutrsv" value="réserver" class="bouton" style="background-color:green;border-radius:10px;" ></td>
  <td></td><td><input type="submit" name="boutannul" value="annuler" class="bouton" style="background-color:red;border-radius:10px;" ></td></tr>
  
  </table>
<a href="ListeReservation.php" style="background-color: #98C9E2; text-decoration:none;color:white;border-radius:10px;">ici la liste des reservations</a>
  </form>
</div>
<footer style="background-color=black;display:bock-inline;color:white;width:100%;margin-top:0;">
<div style="float:right;">
<img src="image/logo.jpg" style="width:60px;height:60px;color:white;olor:yellow;border-radius:30px;">HOTEL FLOBERNA"calme/securité/discretion"</img>
</div>
<div style="float:left;">contact:(+237)699914952/699269596/675688855</div>
</footer>
</body>
</html>