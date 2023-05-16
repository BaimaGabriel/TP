<?php 
/*include_once('conn.php');*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_floberna_db";
// Cree la connexion
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
} 

?>
<?php 
//ajouter
$num=@$_POST['numfacture'];
$nom=@$_POST['nomclient'];
$contact=@$_POST['contactclient'];
$date=@$_POST['datereservation'];
$montant=@$_POST['montant'];
$chambre=@$_POST['chambrereserver'];
$accompagnant=@$_POST['accompagnant'];
$receptioniste=@$_POST['nomreceptioniste'];
$mess='';
$mess2='';
if(isset($_POST['boutadd'])&&!empty($num)){
$rq=mysqli_query($conn,"INSERT INTO facture (num_facture,nom_client,contact_client,date_reservation,montant,num_chambre,Accompagnant,nom_receptioniste) VALUES ('$num','$nom','$contact','$date','$montant','$chambre','$accompagnant','$receptioniste')");
if($rq){
$mess='<b class="succes">Insertion réussie !</b>';
}
else
$mess="<b class='erreur'>Impossible d'insérer !</b>";
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
<li><a href="AjoutClient.php" style="background-color: olive; text-decoration:none;color:white;border-radius:10px;">Gestion des Client</a></li>
<li><a href="ReservationChambre.php" style="background-color: olive; text-decoration:none;color:white;border-radius:10px;">Gestion des Reservations</a></li>
<li><a href="ListeChambre.php" style="background-color: olive; text-decoration:none;color:white;border-radius:10px;">Liste des Chambres </a></li>
<li><a href="ListeClient.php" style="background-color: olive; text-decoration:none;color:white;border-radius:10px;">Listes des Clients </a></li>
<li><a href="attente.php" style="background-color: olive; text-decoration:none;color:white;border-radius:10px;">Reservation en attente</a></li>
<li><a href="Aide.php" style="background-color:olive; text-decoration:none;color:white;border-radius:10px;">Aide</a></li>
</nav></header></div>
<div align="center" style="background-color:transparent;background-position:center;">
<h2>Enregistrement des factures</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" >
  <table align="">
  
     <tr ><td></td><td> <?php print $mess;?></td></tr>
    <tr><td></td><td><strong >Numero de la facture :</strong></td>
   <td></td><td><input type="text" name="numfacture" class="champ" size="25" style="border-radius:10px;"></td></tr>
<tr><td></td><td><strong >nom du client:</strong></td>
   <td></td><td><input type="text" name="nomclient" class="champ" size="25" style="border-radius:10px;"></td></tr>
   <tr><td></td><td><strong>Contact du client :</strong></td>
<td></td><td><input type="number" name="contactclient"  class="champ" size="50" style="border-radius:10px;"></td></tr>
<tr><td></td><td><strong >date de reservation :</strong></td>
   <td></td><td><input type="date" name="datereservation" class="champ" size="25" style="border-radius:10px;"></td></tr>
<tr><td></td><td><strong>montant :</strong></td>
   <td></td><td><input type="number" name="montant"  class="champ" size="50" style="border-radius:10px;"></td></tr>
<tr><td></td><td><strong >chambre reserver:</strong></td>
   <td></td><td><input type="number" name="chambrereserver" class="champ" size="25" style="border-radius:10px;"></td></tr>
<tr><td></td><td><strong >Accompagner de :</strong></td>
   <td></td><td><input type="text" name="accompagnant" class="champ" size="25" style="border-radius:10px;" ></td></tr><br><br>
<tr><td></td><td><strong >Facturer par:</strong></td>
   <td></td><td><input type="text" name="nomreceptioniste" class="champ" size="25" style="border-radius:10px;" ></td></tr><br><br>
      <tr><td></td><td><input type="submit" name="boutadd" value="Enregistrer" class="bouton" style="background-color:green;border:none;border-radius:10px;"></td>
      </tr>
  
  </table>
  </form> <br><br>
<a href="Listefacture.php" style="background-color: #98C9E2; text-decoration:none;color:white;border-radius:20px;"><b>ici liste des factures</b> </a><br><br><br>
<footer style="background-color=black;display:bock-inline;color:white;width:100%;margin-top:0">
<div style="float:right;">
<img src="image/logo.jpg" style="width:60px;height:60px;color:white;olor:yellow;border-radius:30px;">HOTEL FLOBERNA"calme/securité/discretion"</img>
</div>
<div style="float:left;">contact:(+237)699914952/699269596/675688855</div>
</footer>
</body>
</html>
