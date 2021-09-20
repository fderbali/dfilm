<?php
require_once("../includes/films.php");
require_once("../includes/membre.php");
require_once("../includes/detail_location.php");
require_once("../includes/paiement.php");

$film = new film([]);
$resultat = $film->getNbFilms();
$nb_films = $resultat[0]->nb_films;

$membre = new membre([]);
$resultat = $membre->getNbMembre();
$nb_membres = $resultat[0]->nb_membres;

$detail_location = new detail_location([]);
$resultat = $detail_location->getNbLocations();
$nb_locations = $resultat[0]->nb_locations;

$paiement = new paiement([]);
$resultat = $paiement->getProfit();
$profit = sprintf("%.2f", $resultat[0]->profit);

require_once("includes/header.php")
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Tableau de bord</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Tableau de bord</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Nombre de films : <?php echo $nb_films ?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="liste_films.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Nombre de membres : <?php echo $nb_membres ?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="liste_membres.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Nombre de Locations : <?= $nb_locations ?></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="ventes.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Profit : <?= $profit ?> $</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="ventes.php">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area mr-1"></i>
                            Ventes par jour
                        </div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar mr-1"></i>
                            Profit par mois
                        </div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require_once("includes/footer.php"); ?>