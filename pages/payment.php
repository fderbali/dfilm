<?php
session_start();
require_once("../includes/films.php");
require_once("../includes/paiement.php");
require_once("../includes/location.php");
require_once("../includes/membre.php");
require_once("../includes/detail_location.php");
$total_to_pay = 0;

if (isset($_POST["cardNumber"])) {
    if (isset($_SESSION['PANIER'])) {
        if (count($_SESSION['PANIER'])) {
            foreach ($_SESSION['PANIER'] as $id => $nb_jours) {
                $film = new film(["id" => $id]);
                $film->loadFromBd();
                $films_in_panier[] = $film;
                $total_to_pay += $film->prix;
            }
        }
    }
    try {
        $membre = new membre(['courriel' => $_SESSION["username"]]);
        $membre->loadFromBd();
        $total_to_pay = sprintf("%.2f", $total_to_pay);
        // Enregistrement du paiement :
        $payment = new paiement(["montant" => $total_to_pay, "id_membre" => $membre->id]);
        $id_paiement = $payment->save()->insert_id;
        //Enregistrement de la commande :
        $location = new location(['paiements_id' => $id_paiement, 'id_membre' => $membre->id]);
        $id_location = $location->save()->insert_id;
        foreach ($films_in_panier as $film) {
            //id	id_film	id_location	prix	expire_at
            // calculer l'expiration :
            $nb_jours_location = $_SESSION["PANIER"][$film->id];
            $dateTime = new DateTime();
            $dateTime->add(new DateInterval('P' . $nb_jours_location . 'D'));
            $expire_at = $dateTime->format('Y-m-d H:i:s');
            $detail_panier = new detail_location([
                'id_film' => $film->id,
                'id_location' => $id_location,
                'prix' => $film->prix,
                'expire_at' => $expire_at
            ]);
            $detail_panier->save();
        }
    } catch (Exception $e) {
        $erreur = $e->getMessage();
    }
    $_SESSION["PANIER"] = [];
}

$relative_path_to_web_root = "../";
require_once("../includes/header.php");
?>
<header class="page-header">
    <div class="container">
        <h1>Paiement</h1>
    </div>
</header>
<main>
    <section class="content-section">
        <div class="container-fluid">
            <?php if (isset($_POST["cardNumber"])) : ?>
                <div class="container py-5">
                    <div class="row">
                        <div class="alert alert-success w-100 text-center">
                            <i class="fas fa-check-circle"></i> Paiement acceptée !
                        </div>
                        <div class="row" id="panier">
                            <?php

                            foreach ($films_in_panier as $film) :
                                $dateTime = new DateTime($film->duree);
                                $duree = $dateTime->format("H\h:i\m");
                                $duree_in_minutes = $dateTime->format("i") + $dateTime->format("H") * 60;
                                $score = ceil(($film->score * 88) / 100);
                                $dateTime = new DateTime($film->date);
                                $annee_sortie = $dateTime->format("Y");
                            ?>
                                <div class="col-4 film">
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
                                            <a class="btn btn-primary btn-block" href="pages/bande_annonce.php?id=<?php echo $film->id ?>"> <i class="far fa-play-circle"></i> Visionner</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="container py-5">
                    <!-- For demo purpose -->
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <div class="card ">
                                <div class="card-header">
                                    <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                                        <!-- Credit card form tabs -->
                                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                            <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit Card </a> </li>
                                            <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> <i class="fab fa-paypal mr-2"></i> Paypal </a> </li>
                                            <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link "> <i class="fas fa-mobile-alt mr-2"></i> Net Banking </a> </li>
                                        </ul>
                                    </div> <!-- End -->
                                    <!-- Credit card form content -->
                                    <div class="tab-content">
                                        <!-- credit card info-->
                                        <div id="credit-card" class="tab-pane fade show active pt-3">
                                            <form role="form" method="POST" action="pages/payment.php">
                                                <div class="form-group"> <label for="username">
                                                        <h6>Card Owner</h6>
                                                    </label> <input type="text" name="username" placeholder="Card Owner Name" required class="form-control "> </div>
                                                <div class="form-group"> <label for="cardNumber">
                                                        <h6>Card number</h6>
                                                    </label>
                                                    <div class="input-group"> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control " required>
                                                        <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <div class="form-group"> <label><span class="hidden-xs">
                                                                    <h6>Expiration Date</h6>
                                                                </span></label>
                                                            <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control" required> <input type="number" placeholder="YY" name="" class="form-control" required> </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                                <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                            </label> <input type="text" required class="form-control"> </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer"> <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment </button>
                                            </form>
                                        </div>
                                    </div> <!-- End -->
                                    <!-- Paypal info -->
                                    <div id="paypal" class="tab-pane fade pt-3">
                                        <h6 class="pb-2">Select your paypal account type</h6>
                                        <div class="form-group "> <label class="radio-inline"> <input type="radio" name="optradio" checked> Domestic </label> <label class="radio-inline"> <input type="radio" name="optradio" class="ml-5">International </label></div>
                                        <p> <button type="button" class="btn btn-primary "><i class="fab fa-paypal mr-2"></i> Log into my Paypal</button> </p>
                                        <p class="text-muted"> Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                                    </div> <!-- End -->
                                    <!-- bank transfer info -->
                                    <div id="net-banking" class="tab-pane fade pt-3">
                                        <div class="form-group "> <label for="Select Your Bank">
                                                <h6>Select your Bank</h6>
                                            </label> <select class="form-control" id="ccmonth">
                                                <option value="" selected disabled>--Please select your Bank--</option>
                                                <option>Bank 1</option>
                                                <option>Bank 2</option>
                                                <option>Bank 3</option>
                                                <option>Bank 4</option>
                                                <option>Bank 5</option>
                                                <option>Bank 6</option>
                                                <option>Bank 7</option>
                                                <option>Bank 8</option>
                                                <option>Bank 9</option>
                                                <option>Bank 10</option>
                                            </select> </div>
                                        <div class="form-group">
                                            <p> <button type="button" class="btn btn-primary "><i class="fas fa-mobile-alt mr-2"></i> Proceed Pyment</button> </p>
                                        </div>
                                        <p class="text-muted">Note: After clicking on the button, you will be directed to a secure gateway for payment. After completing the payment process, you will be redirected back to the website to view details of your order. </p>
                                    </div> <!-- End -->
                                    <!-- End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- end content-section -->
    <?php
    require_once("../includes/footer.php");
