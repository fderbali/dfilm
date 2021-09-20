<?php
session_start();
$relative_path_to_web_root = "../../";
require("../../includes/header.php");
?>
<script src="assets/js/validation.js"></script>
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
          <div class="membership">
            <?php if (isset($_SESSION["username"])) : ?>
              <h1>Vous êtes déjà connecté</h1>
            <?php else : ?>
              <h1>Veuillez remplir le formulaire pour vous connecter</h1>
              <div id="msgErreur" class="msgErreur"></div>
              <form action="serveur/membres/connexionMembre.php" method="POST" onsubmit="return validerFormulaireConnexion()">
                <div class="form-group">
                  <label for="courriel">Courriel</label>
                  <input type="text" name="courriel" id="courriel" placeholder="Courriel">
                </div>
                <!-- end form-group -->
                <div class="form-group">
                  <label for="mot_de_passe">Mot de passe</label>
                  <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Mot de passe">
                </div>
                <!--div class="g-recaptcha my-5" data-sitekey="6LeQ4zcaAAAAAK-HGXDjXF-dctvg-pPqvopg-1mT"></!--div>
                <script-- src="https://www.google.com/recaptcha/api.js?hl=fr" async defer></script-->
                <!-- end form-group -->
                <div class="form-group">
                  <input type="submit" value="Envoyer">
                </div>
                <div class="form-group">
                  <input type="reset" value="Vider" class="btn btn btn-light">
                </div>
                <!-- end form-group -->
              </form>
            <?php endif; ?>
          </div>
          <!-- end  -->
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