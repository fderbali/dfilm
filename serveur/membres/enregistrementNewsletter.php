<?php
session_start();
$relative_path_to_web_root = "../../";
require_once("../../includes/header.php");
// Extraction des données sous forme de varibales
$courriel = $_POST["courriel"];
$message_erreur = "";

// Validation
if (!preg_match("/^(\w+[\-\.])*\w+@(\w+\.)+[A-Za-z]+$/", $courriel)) {
  $message_erreur = "Desolé mais votre adresse courriel n'est pas valide !";
}

require_once("../../includes/newsletter.php");
if (!$message_erreur) {
  try {
    $newsletter = new newsletter([
      "id" => 0,
      "courriel" => $courriel
    ]);
    $register = $newsletter->save();
    if (!$register) {
      throw new Exception("Désolé mais votre inscription à la newsletter a échoué ! Veuillez re-essayer plus tard !");
    }
  } catch (Exception $e) {
    $message_erreur = $e->getMessage();
  }
}
?>
<header class="page-header">
  <div class="container">
    <h1>Newsletter</h1>
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
              <a class="btn btn-success btn-lg" href="index.php"><i class="lni lni-chevron-left"></i>Retour</a>
            <?php else : ?>
              <h1>Votre inscription à la newsletter est effectuée avec succès <i class="lni lni-emoji-smile"></i></h1>
              <a href="../../index.php" class="btn brn-lg btn-success"><i class="lni lni-chevron-left"></i> Retour</a>
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
