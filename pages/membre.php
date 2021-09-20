<?php
session_start();
if (isset($_SESSION["username"]) and !empty($_SESSION["username"])) {
	require_once("../includes/membre.php");
	$membre = new membre(["courriel" => $_SESSION["username"]]);
	$membre->loadFromBd();
}
$relative_path_to_web_root = "../";
require_once("../includes/header.php");
?>
<script src="assets/js/validation.js"></script>
<header class="page-header">
	<div class="container">
		<h1>Votre profil</h1>
	</div>
</header>
<main>
	<section class="content-section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div id="form_membership">
						<h1 class='w-100'>Bienvenue
							<?php echo $membre->prenom . " " . $membre->nom ?> <i class="lni lni-emoji-smile"></i>
						</h1>
						<button class="btn btn-danger" data-toggle="collapse" href="#user-infos" role="button" href="">Modifier mes informations&nbsp;&nbsp;<i class="fas fa-edit"></i></button>
						<a class="btn btn-primary" href="pages/catalogue.php">Consulter le catalogue&nbsp;&nbsp;<i class="fas fa-book-open"></i></a>
						<a class="btn btn-success" href="pages/mes-locations.php">Consulter mes locations&nbsp;&nbsp;<i class="fas fa-video"></i></a>
					</div>
					<!-- end membership -->
				</div>
				<div class="col-12 collapse" id="user-infos">
					<div class="col-lg-7">
						<div class="membership" id="form_membership">
							<div class="msgErreur mt-5" id="msgErreur">
							</div>
							<form action="serveur/membres/modifierMembre.php" method="POST" onsubmit="return validerFormulaireMembres();">
								<div class="form-group">
									<label for="nom">Nom</label>
									<input type="text" name="nom" id="nom" placeholder="Nom" value="<?php echo $membre->nom ?>">
									<input type="hidden" name="id" value="<?php echo $membre->id ?>" />
								</div>
								<!-- end form-group -->
								<div class="form-group">
									<label for="prenom">Prénom</label>
									<input type="text" name="prenom" id="prenom" placeholder="Prénom" value="<?php echo $membre->prenom ?>">
								</div>
								<!-- end form-group -->
								<div class="form-group">
									<label for="courriel">Courriel</label>
									<input type="text" name="courriel" id="courriel" placeholder="Courriel" value="<?php echo $membre->courriel ?>">
								</div>

								<!-- end form-group -->
								<div class="form-check">
									<input class="form-check-input" type="radio" name="sexe" id="sexeM" value="M" <?php echo ($membre->sexe == 'M' ? 'checked' : '') ?>>
									<label class="form-check-label label_radio" for="sexeM">
										Masculin
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="sexe" id="sexeF" value="F" <?php echo ($membre->sexe == 'F' ? 'checked' : '') ?>>
									<label class="form-check-label label_radio" for="sexeF">
										Féminin
									</label>
								</div>
								<br>
								<div class="form-group">
									<label for="date_de_naissance">Date de naissance</label>
									<input type="text" name="date_de_naissance" id="date_de_naissance" placeholder="Date de naissance" value="<?php echo $membre->date_de_naissance ?>">
								</div>
								<!-- end form-group -->
								<div class="form-group">
									<label for="mot_de_passe">Mot de passe</label>
									<input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Mot de passe">
								</div>
								<!-- end form-group -->
								<div class="form-group">
									<label for="confirm_mot_de_passe">Confirmer le mot de passe</label>
									<input type="password" name="confirm_mot_de_passe" id="confirm_mot_de_passe" placeholder="Confirmer le mot de passe">
								</div>
								<!-- end form-group -->
								<br>
								<div class="form-group">
									<input type="submit" value="Envoyer">
								</div>
								<div class="form-group">
									<input type="reset" value="Vider" class="btn btn btn-light">
								</div>
								<!-- end form-group -->
							</form>
						</div>
						<!-- end membership -->
					</div>
				</div>
			</div>
			<!-- end row -->
		</div>
		<!-- end container -->
	</section>
	<!-- end content-section -->
	<?php
	require_once("../includes/footer.php");
