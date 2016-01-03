<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Head -->
<title>Réservation effectuée, unité du Porc-épic 25, scouts et guides pluralistes de Ganshoren, Bruxelles-Norois</title>
<?php include("../includes/header.php"); ?>

<body class="faq">

	<?php
		
	try {
			
		// On se connecte à MySQL
		$bdd = new PDO('mysql:host=rdbms.strato.de;dbname=DB1981852', 'U1981852', 'W3bma5t3r355610');	
					
	}catch(Exception $e){
			
		// En cas d'erreur, on affiche un message et on arrête tout
	        die('Erreur : '.$e->getMessage());
			        
	}
	
	$_SESSION['nom'] = $_POST['nom'];
	$_SESSION['tel'] = $_POST['tel'];
	$_SESSION['mail'] = $_POST['mail'];
	$_SESSION['adultes'] = $_POST['adultes'];
	$_SESSION['enfants'] = $_POST['enfants'];
	$_SESSION['halal'] = $_POST['halal'];
	$_SESSION['remarque'] = $_POST['remarque'];
	
	$req = $bdd->prepare('INSERT INTO reservations(nom, tel, mail, adultes, enfants, halal, remarque) VALUES(:nom, :tel, :mail, :adultes, :enfants, :halal, :remarque)');
	
	$req->execute(array(
	
		'nom' => $_POST['nom'],
		'tel' => $_SESSION['tel'],
		'mail' => $_SESSION['mail'],
		'adultes' => $_SESSION['adultes'],
		'enfants' => $_SESSION['enfants'],
		'halal' => $_SESSION['halal'],
		'remarque' => $_SESSION['remarque']
		
	));
	
	?>

	<!-- Navbar -->
    <?php include("../includes/navbar.php"); ?>
    <!-- /Navbar -->
    
    <!-- Full Page Image Header Area -->
    <div id="top" class="header_contacts">
        <div class="vert-text">
            <h1>Réservation effectuée</h1>
            <br/>
            <a href="/" id="bouton_intro" class="btn btn-lg btn-default little">Accueil</a>
        </div>
    </div>
    <!-- /Full Page Image Header Area -->
	
    <!-- Footer -->
    <footer class="footer_contacts">
        <div class="container" id="footer_contacts">
            <?php include("../includes/footer.php") ?>
        </div>
    </footer>
    <!-- /Footer -->
</body>

</html>
