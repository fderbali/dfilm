<?php
session_start();
$relative_path_to_web_root = "../";
require_once("../includes/header.php");
?>
<header class="page-header">
    <div class="container">
        <h1>Catalogue</h1>
    </div>
</header>
<main>
    <section class="content-section" id="catalogue">
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <div class="refine">
                        <div class="card">
                            <div class="card-header text-center">
                                Raffinez votre recherche
                            </div>
                            <div class="card-body">
                                <?php
                                require_once("../includes/refine.inc.php");
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- end section-title -->
                </div>
                <div class="col-9 listecatalogue">
                    <div class="container-fluid">
                        <div class="row">
                            <div id="error_no_avail" class="alert alert-danger alert alert-danger col-9 text-center mt-5 p-5 discard">
                                <strong> Aucun film ne correspond à vos critères ! Veuillez élargir votre recherche.</strong>
                            </div>
                            <?php
                            require_once("../includes/catalogue.inc.php");
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- end content-section -->
    <?php
    require_once("../includes/footer.php");
