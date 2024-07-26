<html>        
    <!--
    |
    |   WEB PROGRAMMING
    |   Kategori Food and Beverage
    |
    |   Anggota Kelompok:
    |   1. Cassiel Dannyala Ferdinand || Nim: 06023032
    |   2. Siti Shalu Prilia || Nim: 06023015
    |   3. Muhammad Vico Lacosto || Nim: 06023033
    |
    -->
    <head>
        <!-- End of Async Drift Code -->
        <meta charset="UTF-8">
        <meta name="author" content="Cassiel D. Ferdinand">
        <meta name="description" content="Web Programming - Bertemakan website restourant cepat saji.">
        <meta name="keyword" content="Web Programming, Food and Beverage, F&B, TAU, Tanri Abeng University">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Site Title -->
        <title>Food and Beverage | F & B - Web Programming</title>
		<!-- <title><?php //echo $title['title_web'];?></title> -->

        <!-- Icon Website -->
        <link rel="icon" href="./assets/images/burger-icon.png">

        <!-- CSS -->
        <link href="./assets/css/menu.css" rel="stylesheet">
        <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="./assets/css/owl.carousel.min.css" rel="stylesheet">
        <link href="./assets/css/owl.theme.default.min.css" rel="stylesheet">
        <!-- <link href="./assets/css/magnific-popup.css" rel="stylesheet"> -->

        <!-- CSS Custom -->
        <link href="./assets/css/style.css" rel="stylesheet">


		<!-- Leaflet CSS -->
		<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    </head>
    <body>
        <!-- Header -->
        <!--<header>-->
            <div class="navik-header header-shadow navik-mega-menu">
                <div class="container">
                    <div class="navik-header-container">
                        <!-- Logo -->
                        <div class="logo" data-mobile-logo="./assets/images/Logo.png" data-sticky-logo="./assets/images/Logo.png">
                            <a href="#"><img src="./assets/images/Logo.png" alt="logo"/></a>
                        </div>
                        
                        <!-- Burger menu -->
                        <div class="burger-menu">
                            <div class="line-menu line-half first-line"></div>
                            <div class="line-menu"></div>
                            <div class="line-menu line-half last-line"></div>
                        </div>

                        <!-- Navigasi Menu -->
                        <nav class="navik-menu menu-caret submenu-top-border">
                            <ul>
                                <!-- Menu Home -->
                                <li><a href="./index.php">Home</a>
                                </li>

                                <!-- Menu About-->
                                <li><a href="#">About Us</a>
                                    <ul>
                                        <li><a href="#">About</a></li>
                                        <li><a href="./index.php#Gallery">Image Gallery</a></li>
                                        <li><a href="./index.php#Team">Team</a></li>
										<li><a href="./index.php#Faq">Pertanyaan</a></li>
                                    </ul>
                                </li>

                                <!-- List Menu -->
                                <li><a href="#">List Menu</a>
                                    <ul class="menus-1">
                                        <li class="tab-link" data-tab="tab-1"><a href="./index.php#tabs-content">BURGERS</a></li>
                                        <li class="tab-link" data-tab="tab-2"><a href="./index.php#tabs-content">FRIES & SIDES</a></li>
                                        <li class="tab-link" data-tab="tab-3"><a href="./index.php#tabs-content">DRINKS</a></li>
                                        <li class="tab-link" data-tab="tab-4"><a href="./index.php#tabs-content">DESSERTS</a></li>
                                    </ul>
                                </li>

                                <!-- Menu Blog -->
                                <li><a href="./blog.php">Blog</a>
                                </li>

                                <!-- Menu Contact -->
                                <li class="submenu-right"><a href="#">Contacts</a>
                                    <ul>
                                        <li><a href="./index.php#Location">Location</a></li>
                                        <li><a href="./index.php#Contact">Contact US</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
         <!--</header>-->
        
        <!-- Content -->
        <div class="content">

            <!-- BLOG POSTS LISTING
			============================================= -->
			<section id="blog-listing" class="wide-60 blog-page-section division">
				<div class="container">
					<div class="row">
						<div class="col-xl-10 offset-xl-1">


                            <div class="blog-post">
								<div class="row">
						 			<div class="col-lg-8 blog-post-img">
						 				<div class="hover-overlay"> 
											<img class="img-fluid" src="./assets/images/berita/img-000.jpg" alt="blog-post-image" />
										</div>	
									</div>
									<div class="col-lg-4 blog-post-txt">
										<h4 class="h4-xs"><a href="./post.php">10 Makanan Populer Khas Indonesia</a></h4>
										<p class="grey-color">
                                        Temukan 10 makanan populer khas Indonesia yang wajib Anda coba! Dari rendang yang lezat hingga sate yang menggugah selera.
										</p>
									</div>
								</div>
							</div>


						</div>
					</div>    <!-- End row -->
				</div>     <!-- End container -->
			</section>	<!-- END BLOG POSTS LISTING -->



			<!-- FOOTER-1
			============================================= -->
			<footer id="footer-1" class="footer division wide-50">
				<div class="container">
					<div class="row">


						<!-- FOOTER INFO -->
						<div class="col-md-5 col-lg-4 col-xl-4">
							<div class="footer-info mb-40">

								<!-- Footer Logo -->
								<div class="footer-logo"><img src="./assets/images/Logo.png" alt="footer-logo"/></div>

								<!-- Footer Copyright -->
								<p>&copy; 2024 Suliid Burger. All Rights Reserved</p>

							</div>	
						</div>	


						<!-- FOOTER CONTACTS -->
						<div class="col-md-7 col-lg-4 col-xl-5">
							<div class="footer-contacts mb-40">
							
								<!-- Address -->
								<p class="p-xl mt-10">Pesanggrahan,</p>
								<p class="p-xl">Jakarta Selatan, Indonesia</p> 

								<!-- Contacts -->
								<p class="p-lg foo-email">Email: <a href="mailto:info@terbawasuasana.com">info@terbawasuasana.com</a></p>
								<p class="p-lg">Call Now: <span class="salmon-color"><a href="tel:6281234567890">(62) 812-3456-7890</a></span></p>

							</div>
						</div>


						<!-- FOOTER INSTAGRAM -->
						<div class="col-md-12 col-lg-4 col-xl-3">
							<div class="footer-img mb-40">

								<!-- Images -->
								<ul class="text-center clearfix">
									<li><a href="#" target="_blank"><img class="insta-img" src="./assets/images/gallery/gallery-01.png" alt="insta-img"></a></li>
									<li><a href="#" target="_blank"><img class="insta-img" src="./assets/images/gallery/gallery-02.png" alt="insta-img"></a></li>
									<li><a href="#" target="_blank"><img class="insta-img" src="./assets/images/gallery/gallery-03.png" alt="insta-img"></a></li>
									<li><a href="#" target="_blank"><img class="insta-img" src="./assets/images/gallery/gallery-04.png" alt="insta-img"></a></li>
									<li><a href="#" target="_blank"><img class="insta-img" src="./assets/images/gallery/gallery-05.png" alt="insta-img"></a></li>
									<li><a href="#" target="_blank"><img class="insta-img" src="./assets/images/gallery/gallery-06.png" alt="insta-img"></a></li>	
								</ul>
														
							</div>
						</div>	<!-- END FOOTER IMAGES -->


					</div>	  <!-- End row -->
				</div>	   <!-- End container -->										
			</footer>	<!-- END FOOTER-1 -->

        </div>

        <!-- Javascript -->
        <script src="./assets/js/jquery-3.5.1.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
        <script src="./assets/js/menu.js"></script>
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/materialize.js"></script>
        <script src="./assets/js/jquery.datetimepicker.full.js"></script>
		<!-- <script src="./assets/js/jquery.magnific-popup.min.js"></script> -->
        <script src="./assets/js/custom.js"></script>

		
		<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    </body>
</html>