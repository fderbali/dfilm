<?php
session_start();
$relative_path_to_web_root = "../";
require_once("../includes/header.php");
require_once("../includes/films.php");
require_once("../includes/membre.php");

try {
    $membre = new membre(['courriel' => $_SESSION["username"]]);
    $membre->loadFromBd();
    $locations = $membre->getLocations();
    $films_loues = [];
    $expire_at = [];
    foreach ($locations as $location) {
        $film_loue = new film(['id' => $location->id_film]);
        $film_loue->loadFromBd();
        $films_loues[] = $film_loue;
        $dateTime = new DateTime($location->expire_at);
        $expire_at[$location->id_film] = $dateTime->format('d/m/Y à H:i');
    }
} catch (Exception $e) {
    $erreur = $e->getMessage();
}

?>
<header class="page-header">
    <div class="container">
        <h1>Mes locations</h1>
    </div>
</header>
<main>
    <section class="content-section">
        <div class="container-fluid">
            <div class="container py-5">
                <div class="row">
                    <div class="alert alert-success w-100 text-center">
                        Mes locations <i class="fas fa-video"></i>
                    </div>
                    <?php if (count($films_loues) == 0) : ?>
                        <div class="alert alert-danger w-100 text-center">Vous n'avez de films loués pour l'instant ! <a href="pages/catalogue.php" class="btn btn-primary">Continuer à magasiner&nbsp;&nbsp;<i class="fas fa-book-open"></i></a></div>

                    <?php endif; ?>
                    <div class="row" id="panier">
                        <?php
                        foreach ($films_loues as $film) :
                            $dateTime = new DateTime($film->duree);
                            $duree = $dateTime->format("H\h:i\m");
                            $duree_in_minutes = $dateTime->format("i") + $dateTime->format("H") * 60;
                            $score = ceil(($film->score * 88) / 100);
                            $dateTime = new DateTime($film->date);
                            $annee_sortie = $dateTime->format("Y");
                        ?>
                            <div class="col-3 film">
                                <div class="video-thumb">
                                    <figure class="video-image"><img src="assets/images/pochettes/<?php echo $film->pochette ?>" class="img-thumbnail" alt="Image">
                                        <div class="circle-rate">
                                            <svg class="circle-chart" viewBox="0 0 30 30" width="100" height="100" xmlns="http://www.w3.org/2000/svg">
                                                <circle class="circle-chart__background" stroke="#2f3439" stroke-width="2" fill="none" cx="15" cy="15" r="14"></circle>
                                                <circle class="circle-chart__circle" stroke="#4eb04b" stroke-width="2" stroke-dasharray="<?php echo $score ?>,100" cx="15" cy="15" r="14"></circle>
                                            </svg>
                                            <b><?php echo $film->score ?>%</b>
                                        </div>
                                        <div class="hd"><?php echo $film->definition ?> <b>HD</b></div>
                                    </figure>
                                    <div class="video-content alert alert-success">
                                        <h3 class="name"><i class="fas fa-film"></i>&nbsp;<?php echo $film->nom ?></h3>
                                        <p>Expire le : <?php echo $expire_at[$film->id] ?></p>
                                        <a class="btn btn-primary btn-block" href="pages/bande_annonce.php?id=<?php echo $film->id ?>"> <i class="far fa-play-circle"></i> Visionner</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- end content-section -->
    <?php
    require_once("../includes/footer.php");
