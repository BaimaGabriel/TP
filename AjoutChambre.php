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
$id=@$_POST['id'];
$dated=@$_POST['dated'];
$datef=@$_POST['datef'];
$numcli=@$_POST['numcli'];
$num=@$_POST['nump'];
$prix1=@$_POST['prix1'];
$prix2=@$_POST['prix2'];
$prix=@$_POST['prix'];
$mess='';
$mess2='';
if(isset($_POST['boutadd'])&&!empty($num)){
$rq=mysqli_query($conn,"INSERT INTO chambre (id_chambre,numporte,prix_nuite,prix_sieste,numclient,occupee) VALUES ('$id','$num','$prix1','$prix2','0','non')");
if($rq){
$mess='<b class="succes">Insertion réussie !</b>';
}
else
$mess="<b class='erreur'>Impossible d'insérer !</b>";
}
?>
<?php 
//supprimer
if(isset($_POST['boutsupp'])&&!empty($num)){
$rq=mysqli_query($conn,"DELETE FROM chambre WHERE numporte='$num'");
if($rq){
$mess='<b class="succes">Suppréssion réussie !</b>';
}
else
$mess="<b class='erreur'>Impossible de supprimer !</b>";
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
<li><a href="Aide.php" style="background-color:olive; text-decoration:none;color:white;border-radius:10px;">Aide</a></li>
</nav></header></div>
<div align="center" style="background-color:transparent;background-position:center;">
<h2>Enregistrement des chambres</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" >
  <table align="">
  
     <tr ><td></td><td> <?php print $mess;?></td></tr><br>
    <tr><td></td><td><strong >Numéro porte :</strong></td>
   <td></td><td><input type="text" name="nump" class="champ" size="25" style="border-radius:10px;"></td></tr>
   <tr><td></td><td><strong>Prix nuite (fcfa) :</strong></td>
<td></td><td><input type="number" name="prix1" min="0" class="champ" size="50" style="border-radius:10px;"></td></tr>
<tr><td></td><td><strong>Prix siestes (fcfa) :</strong></td>
   <td></td><td><input type="number" name="prix2" min="0" class="champ" size="50" style="border-radius:10px;"></td></tr>
      <tr><td></td><td><input type="submit" name="boutadd" value="Enregistrer" class="bouton" style="background-color:green;border:none;border-radius:10px"></td>
       <td></td><td><input type="submit" name="boutsupp" value="Supprimer" class="bouton" style="background-color:red;border:none;border-radius:10px""></td></tr>
  
  </table>
  </form> <br><a href="ListeChambre.php" style="background-color: #98C9E2; text-decoration:none;color:white;border-radius:10px;" >Liste Des Chambres ici</a> <br>
<footer style="background-color=black;display:bock-inline;color:white;width:100%;margin-top:15%">
<div style="float:right;">
<img src="image/logo.jpg" style="width:60px;height:60px;color:white;olor:yellow;border-radius:30px;">HOTEL FLOBERNA"calme/securité/discretion"</img>
</div>
<div style="float:left;">contact:(+237)699914952/699269596/675688855</div>
</footer>
</body>
</html>
