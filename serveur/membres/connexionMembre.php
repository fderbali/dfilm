<?php
session_start();
// Extraction des données sous forme de varibales
$courriel = $_POST["courriel"];
$mot_de_passe = $_POST["mot_de_passe"];
$message_erreur = "";
// Validation
if (!$courriel || !$mot_de_passe) {
	$message_erreur = "Veuillez saisir votre adresse courriel et votre mot de passe";
}
$RegExpcourriel = "/^(\w+[\-\.])*\w+@(\w+\.)+[A-Za-z]+$/";
$RegExpMotpasse = "/^[A-Za-z\d#_!-]{8,10}$/";

if (!preg_match($RegExpcourriel, $courriel)) {
	$message_erreur = "Votre courriel est invalide";
}

if (!preg_match($RegExpMotpasse, $mot_de_passe)) {
	$message_erreur = "Votre mot de passe est invalide";
}

if (!$message_erreur) {
	require_once("../../includes/membre.php");
	$membre = new membre(["courriel" => $courriel, "password" => $mot_de_passe]);
	try {
		$user_found = $membre->authenticate();
		if ($user_found) {
			if ($user_found->is_admin == "Y") {
				$new_url = "../../admin/index.php";
				$_SESSION["isAdmin"] = "Y";
			} else {
				$new_url = "../../pages/membre.php";
			}
			$_SESSION["username"] = $courriel;
			header("Location: $new_url");
			exit;
		} else {
			$message_erreur = "Désolé, vos données de connexion sont incorrects !";
		}
	} catch (Exception $e) {
		$message_erreur = $e->getMessage();
	}
}
$relative_path_to_web_root = "../../";
require_once("../../includes/header.php");
?>
<header class="page-header">
	<div class="container">
		<h1>Connexion</h1>
	</div>
</header>
<main>
	<section class="content-section" data-background="assets/images/section-pattern01.png">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-7">
					<div class="membership" id="form_membership">
						<h1>Oops !</h1>
						<p><?php echo $message_erreur ?> <i class="lni lni-emoji-sad"></i></p>
						<a class="btn btn-success btn-lg" href="serveur/membres/formulaire_connexion.php"><i class="lni lni-chevron-left"></i>Retour</a>
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
