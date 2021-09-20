<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1,
        shrink-to-fit=no">
	<meta name="theme-color" content="#e90101" />
	<title>DFilm</title>
	<meta name="author" content="Fahmi Derbali">
	<meta name="description" content="Site de streaming video">
	<base href="../">
	<!-- FAVICON FILE -->
	<link href="assets/ico/favicon.png" rel="shortcut icon">

	<!-- CSS FILES -->
	<link rel="stylesheet" href="assets/css/lineicons.css">
	<link rel="stylesheet" href="assets/css/fancybox.min.css">
	<link rel="stylesheet" href="assets/css/swiper.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/bootstrap-datepicker.min.css">
</head>
<?php
require_once('../includes/films.php');
$film = new film(['id' => $_GET['id']]);
$film->loadFromBd();
$bande_annonce = $film->url_bande_annonce;
$bande_annonce = str_replace("watch?v=", "embed/", $bande_annonce);
?>

<body>
	<main>
		<header class="page-header single" data-background="images/movie-poster-bg.jpg">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="video-player">
							<a href="/index.php" class="back-btn"><i class="lni lni-chevron-left"></i> Retour</a>
							<iframe width="900" height="506" src="<?php echo $bande_annonce ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
						<!-- end video-player -->
					</div>
					<!-- end col-12 -->
				</div>
				<!-- end col-12 -->
				<!-- end row -->
			</div>
			<!-- end container -->
		</header>
		<!-- end header -->
	</main>
</body>

</html>