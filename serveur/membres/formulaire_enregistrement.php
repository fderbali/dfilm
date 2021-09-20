<?php
session_start();
$relative_path_to_web_root = "../../";
require("../../includes/header.php");
?>
<script src="assets/js/validation.js"></script>
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
            <h1>Veuillez remplir le formulaire pour vous enregistrer</h1>
            <div class="msgErreur" id="msgErreur">
            </div>
            <form action="serveur/membres/enregistrementMembre.php" method="POST" onsubmit="return validerFormulaireMembres()">
              <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" placeholder="Nom">
              </div>
              <!-- end form-group -->
              <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" placeholder="Prénom">
              </div>
              <!-- end form-group -->
              <div class="form-group">
                <label for="courriel">Courriel</label>
                <input type="text" name="courriel" id="courriel" placeholder="Courriel">
              </div>

              <!-- end form-group -->
              <div class="form-check">
                <input class="form-check-input" type="radio" name="sexe" id="sexeM" value="M">
                <label class="form-check-label label_radio" for="sexeM">
                  Masculin
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="sexe" id="sexeF" value="F">
                <label class="form-check-label label_radio" for="sexeF">
                  Féminin
                </label>
              </div>
              <br>
              <div class="form-group">
                <label for="date_de_naissance">Date de naissance</label>
                <input type="text" name="date_de_naissance" id="date_de_naissance" placeholder="Date de naissance">
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
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="newsletter" id="newsletter">&nbsp;
                <label class="form-check-label label_radio" for="newsletter">
                  S'inscrire à la newsletter
                </label>
              </div>
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

  <?php require("../../includes/footer.php") ?>