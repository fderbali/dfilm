<?php
session_start();
$relative_path_to_web_root = "../";
require_once("../includes/header.php");
?>
<header class="page-header">
  <div class="container">
    <h1>Votre profil</h1>
  </div>
</header>
<main>
  <section class="content-section" data-background="assets/images/section-pattern01.png">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-7">
          <div class="membership" id="form_membership">
            <h1>Bienvenue à la page admin&nbsp;!<i class="lni lni-emoji-smile"></i></h1>
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
  require_once("../includes/footer.php");
