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

    <?php 
                if (isset($_POST['submit']))
                {
                    if (empty($_POST['nom'])){
                        echo "le champ nom est vide";
                    }
                    else
                    {
                    if(empty($_POST['motdepass'])) {
                        echo "le champs mot de pass est vide";
                       }
                       else
                       {
                       $nom=htmlentities ($_POST['nom']);
                       $mdp=htmlentities ($_POST['motdepass']);
                       $sql="SELECT * FROM administrateur";
                       $run=mysqli_query($conn,$sql);
                      }
                       if (mysqli_num_rows($run)==0) {
                        echo "le nom ou le mot de pass est incorrecte";
                       }else{
                       $nom=$_SESSION['nom'];
                       $mdp=$_SESSION['mot_de_pass'];
                        }
                          if($nom==$_SESSION['nom'] && $mdp==$_SESSION['mot_de_pass'])
                            {
                              header("location:AccueilAdmin.php");
                            }
                             else
                            {
                              header("location:indexA.php?erreur");
                            }
                    }
                }
               
                ?>
                  
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" >
      <div align="center" > 
      <h3 style="margin-top:10%;"> Formulaire De Connexion</h3> 
     <p>vueillez renseignez vos informations de connexion cher administrateur</p>     
      <label for="nom">nom</label>
           <input type="text" name="nom" style="border-radius:10px;margin-right:50px;"><br><br>
        <label for="motdepass">Mot de passe</label>
        <input type="text" id="motdepass" name="motdepass" style="border-radius:10px;margin-right:100px;"><br><br>
        <input type="submit" name="submit" value="Se connecter" style="border-radius:10px;background-color:purple;">
    </form><br><br>
<a href="index.php" style="background-color: #98C9E2; text-decoration:none;color:white;border-radius:5px;width:100px;"><b>je suis receptioniste</b></a> <br>
<a href=" PageClient.php" style="background-color: #98C9E2; text-decoration:none;color:white;border-radius:5px;width:100px;"><b>je suis client</b></a><br>         
    <br> <img src="image/logo.jpg" style="width:100Px;height:100px;border-radius:30px;"> <b>HOTEL FLOBERNA </b></img>   
</body>
</html>