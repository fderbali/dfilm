<?php
session_start();
if (isset($_SESSION["username"]) && (isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"] == "Y")) {
    $username = $_SESSION["username"];
} else {
    $erreur = "Accès ineterdit !";
}
$current_file = $_SERVER["REQUEST_URI"];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>DFILMS AdministrATION</title>
    <link href="assets/ico/favicon.png" rel="shortcut icon">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css" />
</head>

<body class="sb-nav-fixed">
    <?php
    if (isset($erreur) && !empty($erreur)) {
        echo "<div class='container-fluid mt-5'>";
        echo "<div class='alert alert-danger font-weight-bold text-center'>
                    $erreur<br/><br/>
                    <a class='btn btn-success' href='../serveur/membres/formulaire_connexion.php'>Connexion&nbsp;<i class=\"fas fa-sign-in-alt\"></i></a></div>";
        echo "</div>";
        echo "</body>";
        echo "</html>";
        exit;
    }
    ?>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php"><img src="../ressources/images/logo.png" alt="Logo" height="54"></a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <!--form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form-->
        <div class="uername-zone text-right">
            <span><?php echo $username ?></span>
        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="../serveur/membres/deconnexion.php">Déconnexion&nbsp;<i class="fas fa-sign-out-alt"></i></a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav" class="mt-5">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Tableau de bord
                        </a>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-film"></i></div>
                            Gestion des films
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="<?php echo (preg_match("/liste_films|add_film|edit_film/", $current_file) ? "" : "collapse"); ?>" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="liste_films.php">Lister les films</a>
                                <a class="nav-link" href="form_add_film.php">Ajouter un film</a>
                                <!--a class="nav-link" href="films_en_vedette.php">Films en vedette</a-->
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategories" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fab fa-youtube"></i></div>
                            Gestion&nbsp;des&nbsp;catégories
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="<?php echo (preg_match("/liste_categories|add_categorie/", $current_file) ? "" : "collapse"); ?>" id="collapseCategories" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="liste_categories.php">Lister les catégories</a>
                                <a class="nav-link" href="form_add_categorie.php">Ajouter une catégorie</a>
                            </nav>
                        </div>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Gestion des membres
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="<?php echo (preg_match("/liste_membre|liste_admin|add_admin/", $current_file) ? "" : "collapse"); ?>" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                    Admins
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="<?php echo (preg_match("/liste_membre|liste_admin|add_admin/", $current_file) ? "" : "collapse"); ?>" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="liste_admins.php">Lister</a>
                                        <a class="nav-link" href="form_add_admin.php">Ajouter un admin</a>
                                    </nav>
                                </div>
                                <a class="nav-link" href="liste_membres.php">
                                    Clients
                                </a>
                            </nav>
                        </div>

                        <a class="nav-link" href="liste_newsletter.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-envelope"></i></div>
                            Abonnés newsletter
                        </a>
                        <a class="nav-link" href="ventes.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-dollar-sign"></i></div>
                            Ventes
                        </a>
                        <a class="nav-link" href="/" target="_blank">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Aller sur le site
                        </a>
                    </div>
                </div>
            </nav>
        </div>

        <?php //print_r($_SERVER) 
        ?>