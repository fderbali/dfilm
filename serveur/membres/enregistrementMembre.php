<?php
session_start();
$relative_path_to_web_root = "../../";
require_once("../../includes/header.php");
// Extraction des données sous forme de varibales
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$courriel = $_POST["courriel"];
$sexe = $_POST["sexe"];
$date_de_naissance = $_POST["date_de_naissance"];
$password = $_POST["mot_de_passe"];
$confirm_mot_de_passe = $_POST["confirm_mot_de_passe"];
$message_erreur = "";

// Validation
require_once("validation.php");
require_once("../../includes/membre.php");
if (!$message_erreur) {
	try {
		$membre = new membre([
			"id" => 0,
			"nom" => $nom,
			"prenom" => $prenom,
			"courriel" => $courriel,
			"sexe" => $sexe,
			"date_de_naissance" => $date_de_naissance,
			"password" => $password
		]);
		if ($membre->checkCourriel()) {
			throw new Exception("L'adresse courriel $courriel est déjà utilisée sur un autre compte");
		}
		$register = $membre->register();
		if ($register->affected_rows > 0) {
			if (isset($_POST["newsletter"])) {
				$membre->register_to_newsletter();
			}
			$new_url = "../../pages/membre.php";
			$_SESSION["username"] = $courriel;
			header("Location: $new_url");
			exit;
		} else {
			throw new Exception("Désolé mais votre enregistrement a échoué ! Veuillez re-essayer plus tard !");
		}
	} catch (Exception $e) {
		$message_erreur = $e->getMessage();
	}
}
?>
<header class="page-header">
	<div class="container">
		<h1>Enregistrement</h1>
	</div>
</header>
<main>
	<section class="content-section" data-background="assets/images/section-pattern01.png">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-7">
					<div class="membership" id="form_membership">
						<?php if ($message_erreur) : ?>
							<h4 class="msgErreur"><?php echo $message_erreur ?></h4>
							<a class="btn btn-success btn-lg" href="serveur/membres/formulaire_enregistrement.php"><i class="lni lni-chevron-left"></i>Retour</a>
						<?php else : ?>
							<h1>Votre enregistrement est effectuée avec succès <i class="lni lni-emoji-smile"></i></h1>
							<p>Merci d'avoir créé votre compte sur Dfilm !</p>
							<a href="pages/membre.php" class="btn brn-lg btn-primary">Aller sur la page membre</a>
						<?php endif; ?>
						</form>
					</div>
					<!-- end membership -->
				</div>
				<!-- end col-7 -->
				<div class="col-lg-5">
					<figure class="side-image">
						<img src="ressources/images/side-image02.png" alt="Image">
					</figure>
					<!-- end side-image -->
				</div>
				<!-- end col-5 -->
			</div>
			<!-- end row -->
		</div>
		<!-- end container -->
	</section>
	<!-- end content-section -->
	<?php
	require_once("../../includes/footer.php");
