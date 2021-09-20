<?php
session_start();
$relative_path_to_web_root = "./";
require_once("includes/header.php");
?>
<header class="slider">
	<div class="main-slider">
		<div class="swiper-wrapper">
			<div class="swiper-slide">
				<div class="slide-inner" data-background="ressources/images/slide01.jpg">
					<div class="containere homepage" data-swiper-parallax="200">
						<!--h6 class="tagline">Nouveau</h6-->
						<h2 class="name">Iron man
							<!--strong>3</strong-->
						</h2>
						<ul class="features">
							<li>
								<div class="rate">
									<svg class="circle-chart" viewBox="0 0 30 30" width="40" height="40" xmlns="http://www.w3.org/2000/svg">
										<circle class="circle-chart__background" stroke="#2f3439" stroke-width="2" fill="none" cx="15" cy="15" r="14"></circle>
										<circle class="circle-chart__circle" stroke="#4eb04b" stroke-width="2" stroke-dasharray="50,100" cx="15" cy="15" r="14"></circle>
									</svg>
									<b>69%</b> SCORE TMDB
								</div>
								<!-- end rate -->
							</li>
							<li>
								<div class="year">2013</div>
							</li>
							<li>
								<div class="hd">4K <b>ULTRA HD</b></div>
							</li>
							<li>
								<div class="tags">Aventure, Action, Science-Fiction</div>
							</li>
						</ul>
						<a href="pages/bande_annonce.php?id=29" class="play-btn">Voir bande annonce</a>
					</div>
					<!-- end container -->
				</div>
				<!-- end slide-inner -->
			</div>
			<!-- end swiper-slide -->
			<div class="swiper-slide">
				<div class="slide-inner bg-image" data-background="ressources/images/slide02.jpg">
					<div class="containere homepage" data-swiper-parallax="200">
						<h2 class="name">Aquaman <br></h2>
						<ul class="features">
							<li>
								<div class="rate">
									<svg class="circle-chart" viewBox="0 0 30 30" width="40" height="40" xmlns="http://www.w3.org/2000/svg">
										<circle class="circle-chart__background" stroke="#2f3439" stroke-width="2" fill="none" cx="15" cy="15" r="14"></circle>
										<circle class="circle-chart__circle" stroke="#4eb04b" stroke-width="2" stroke-dasharray="50,100" cx="15" cy="15" r="14"></circle>
									</svg>
									<b>69%</b> SCORE TMDB
								</div>
								<!-- end rate -->
							</li>
							<li>
								<div class="year">2018</div>
							</li>
							<li>
								<div class="hd">1080 <b>HD</b></div>
							</li>
							<li>
								<div class="tags">Aventure, Action, Fantastique</div>
							</li>
						</ul>
						<a href="pages/bande_annonce.php?id=18" class="play-btn">Voir bande annonce</a>
					</div>
					<!-- end container -->
				</div>
				<!-- end slide-inner -->
			</div>
			<!-- end swiper-slide -->
			<div class="swiper-slide">
				<div class="slide-inner bg-image" data-background="ressources/images/slide03.jpg">
					<div class="containere homepage" data-swiper-parallax="200">
						<!--h6 class="tagline">2018</h6-->
						<h2 class="name">Venom<br></h2>
						<ul class="features">
							<li>
								<div class="rate">
									<svg class="circle-chart" viewBox="0 0 30 30" width="40" height="40" xmlns="http://www.w3.org/2000/svg">
										<circle class="circle-chart__background" stroke="#2f3439" stroke-width="2" fill="none" cx="15" cy="15" r="14"></circle>
										<circle class="circle-chart__circle" stroke="#4eb04b" stroke-width="2" stroke-dasharray="50,100" cx="15" cy="15" r="14"></circle>
									</svg>
									<b>67%</b> SCORE TMDB
								</div>
								<!-- end rate -->
							</li>
							<li>
								<div class="year">2018</div>
							</li>
							<li>
								<div class="hd">720P <b>HD</b></div>
							</li>
							<li>
								<div class="tags">Science-Fiction, Action</div>
							</li>
						</ul>
						<a href="pages/bande_annonce.php?id=26" class="play-btn">Voir bande annonce</a>
					</div>
					<!-- end container -->
				</div>
				<!-- end slide-inner -->
			</div>
			<!-- end swiper-slide -->
		</div>
		<!-- end swiper-wrapper -->
		<div class="swiper-pagination"></div>
		<!-- end swiper-pagination -->
	</div>
	<!-- end main-slider -->
</header>
<!-- end slider -->
<main>

	<section class="content-section" data-background="#111111">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title text-center light">
						<h2>Des films pour vous</h2>
					</div>
					<!-- end section-title -->
				</div>
				<!-- end col-12 -->

				<?php
				$limited_gallery = 12;
				require_once("includes/galerie_films.inc.php");
				?>

				<!-- end col-2 -->
				<div class="col-12 text-center"> <a href="pages/catalogue.php" class="custom-button">Voir plus de films</a> </div>
				<!-- end col-12 -->
			</div>
			<!-- end row -->
		</div>
		<!-- end container -->
	</section>
	<!-- end content-section -->
	<section class="content-section" id="videoseparator">
		<div class="video-bg">
			<video src="ressources/videos/video01.mp4" autoplay muted playsinline loop></video>
		</div>
		<!-- end video-bg -->
	</section>
	<!-- end content-section -->
	<section class="content-section no-spacing" data-background="#111111">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="get-started-box">
						<p>Abonnez-vous &agrave; notre newsletter</p>
						<form method="POST" action="serveur/membres/enregistrementNewsletter.php">
							<input type="email" name="courriel" placeholder="Adresse courriel">
							<input type="submit" value="Envoyer">
						</form>
					</div>
					<!-- end get-started-box -->
				</div>
				<!-- end col-4 -->
			</div>
			<!-- end row -->
		</div>
		<!-- end container -->
	</section>
	<!-- end content-section -->
	<?php require_once("includes/footer.php") ?>