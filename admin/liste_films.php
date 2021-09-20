<?php 
    require_once("includes/header.php");
    require_once("../includes/films.php");
    $erreur = "";
    try{
        $film = new film([]);
        $films = $film->getFilmList();
    } catch(Exception $e){
        $erreur = $e->getMessage();
    }
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Liste des films</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Tableau de bord</a></li>
                <li class="breadcrumb-item active">Liste des films</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Films
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <?php if($erreur): echo $erreur; ?>
                        <?php else: ?>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>date</th>
                                    <th>Langue</th>
                                    <th>realisateur</th>
                                    <th>duree</th>
                                    <th>pochette</th>
                                    <th>Bande annonce</th>
                                    <th>Supprimer</th>
                                    <th>Éditer</th>
                                    <th>Ctégories</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nom</th>
                                    <th>date</th>
                                    <th>Langue</th>
                                    <th>realisateur</th>
                                    <th>duree</th>
                                    <th>pochette</th>
                                    <th>Bande annonce</th>
                                    <th>Supprimer</th>
                                    <th>Éditer</th>
                                    <th>Catégories</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
                                    foreach($films as $film){
                                        echo"<tr>"
                                            ."<td>".$film->nom."</td>"
                                            ."<td>".date("Y/m/d", strtotime($film->date))."</td>"
                                            ."<td>".($film->langue == "en"?"Anglais":($film->langue=="fr"?"Français":$film->langue))."</td>"
                                            ."<td>".$film->realisateur."</td>"
                                            ."<td>".$film->duree."</td>"
                                            ."<td><img class='pochette img-thumbnail' src='../assets/images/pochettes/".$film->pochette."'/></td>"
                                            ."<td><a target='_blank' href='$film->url_bande_annonce'><i class='fas fa-external-link-alt'></i></a></td>"
                                            ."<td>
                                                <button data-id_film='".$film->id."' class='btn btn-danger deleteFilm' data-toggle='modal' data-target='#deleteFilmModal'>
                                                    <i class='far fa-trash-alt'></i>
                                                </button>
                                            </td>"
                                            ."<td>
                                                <a class='btn btn-success' href='form_edit_film.php?id=$film->id'>
                                                    <i class='far fa-edit'></i>
                                                </a>
                                            </td>"
                                            ."<td>
                                                <a class='btn btn-primary' href='film_categories.php?id=$film->id'>Catégories&nbsp;<i class='fas fa-grip-horizontal'></i></a>
                                            </td>"
                                        ."</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="deleteFilmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Supprimer un film</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Êtes vous sûr ?</h4>
                    <form action="delete_film.php" id="formDeleteFilm" method="POST">
                        <input type="hidden" id="id_film_to_delete" name="id_film_to_delete" />
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Non</button>
                    <button id="BtndeleteFilm" type="button" class="btn btn-warning">Oui, Supprimer !</button>
                </div>
            </div>
        </div>
    </div>
<?php require_once("includes/footer.php"); ?>
