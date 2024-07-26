<?php
include('koneksi.php');
$query = mysqli_query($db, 'SELECT title_web FROM setting');
$title = mysqli_fetch_assoc($query); 

//echo $row['title_web'];

session_start();
error_reporting(0);
?>

<?php
error_reporting(0);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './assets/PHPMailer/src/Exception.php';
require './assets/PHPMailer/src/PHPMailer.php';
require './assets/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST['email'];
    $subject = $_POST['name']." - ".$_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'vikram.gfireservers.in';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'info@terbawasuasana.com';                     // SMTP username
        $mail->Password   = 'Admin7299!@#';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('info@terbawasuasana.com', 'Web Design TAU');
        $mail->addAddress($to);     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        echo "";
    } catch (Exception $e) {
        echo "";
    }
}
?>
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
        <!--<title>Food and Beverage | F & B - Web Programming</title>-->
		<title><?php echo $title['title_web'];?></title>

        <!-- Icon Website -->
        <link rel="icon" href="./assets/images/burger-icon.png">

        <!-- CSS -->
        <link href="./assets/css/menu.css" rel="stylesheet">
        <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="./assets/css/owl.carousel.min.css" rel="stylesheet">
        <link href="./assets/css/owl.theme.default.min.css" rel="stylesheet">
        <link href="./assets/css/magnific-popup.css" rel="stylesheet">

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
                                <li><a href="#">Home</a>
                                </li>

                                <!-- Menu About-->
                                <li><a href="#">About Us</a>
                                    <ul>
                                        <li><a href="#">About</a></li>
                                        <li><a href="#Gallery">Image Gallery</a></li>
                                        <li><a href="#Team">Team</a></li>
										<li><a href="#Faq">Pertanyaan</a></li>
                                    </ul>
                                </li>

                                <!-- List Menu -->
                                <li><a href="#">List Menu</a>
                                    <ul class="menus-1">
                                        <li class="tab-link" data-tab="tab-1"><a href="#tabs-content">BURGERS</a></li>
                                        <li class="tab-link" data-tab="tab-2"><a href="#tabs-content">FRIES & SIDES</a></li>
                                        <li class="tab-link" data-tab="tab-3"><a href="#tabs-content">DRINKS</a></li>
                                        <li class="tab-link" data-tab="tab-4"><a href="#tabs-content">DESSERTS</a></li>
                                    </ul>
                                </li>

                                <!-- Menu Blog -->
                                <li><a href="./blog.php">Blog</a>
                                </li>

                                <!-- Menu Contact -->
                                <li class="submenu-right"><a href="#">Contacts</a>
                                    <ul>
                                        <li><a href="#Location">Location</a></li>
                                        <li><a href="#Contact">Contact US</a></li>
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
			<section id="MainBanner" class="bg-fixed ">
				<div class="container">
					<div class="row d-flex align-items-center">
                        <div class="col-md-6 col-lg-6">
							<div class="mb-40">
								<img class="img-fluid" src="./assets/images/menu/Burger/menu-burger-04.png" alt="promo-image" />
							</div>
						</div>
						<div class="col-md-6 col-lg-6 mt-5 justify-content-center">
							<div class="box-11-txt mb-40 white-color">
								<h4>Restaurant</h4>
								<h2 class="h2-lg">SULIID BURGER</h2>
								<p class="p-md">Menyantap burger yang lezat dan inovatif dengan citarasa yang memikat.</p>
								<a href="#Menu" class="btn btn-lg btn-red tra-white-hover">Order Now</a>
								<?php 

								if ($_SESSION['login_user'] ) {
									echo '<a href="./admin/index.php" class="btn btn-lg btn-yellow tra-white-hover">Dashboard</a>';
								} else {
									//echo '<a href="#Menu" class="btn btn-lg btn-yellow tra-white-hover" data-bs-toggle="modal" data-bs-target="#LoginModalCenter">Login</a>';
									echo '<a href="./admin/login.php" class="btn btn-lg btn-yellow tra-white-hover">Login</a>';
								}
								?>
							</div>
						</div>
					</div> 	
				</div>
			</section>

            <!-- Menu Pilihan -->
			<section id="Menu" class="wide-70 menu-section division">
				<div class="container">


					<!-- TABS NAVIGATION -->
					<div id="tabs-nav">
					 	<div class="row">
							<div class="col-lg-12 text-center">
						 		<ul class="tabs-1 ico-55 red-tabs clearfix">

						 			<!-- TAB-1 LINK -->
									<li class="tab-link current" data-tab="tab-1">
										<h5 class="h5-sm">Burgers</h5>
									</li>

									<!-- TAB-2 LINK -->
									<li class="tab-link" data-tab="tab-2">
										<h5 class="h5-sm">Fries & Sides</h5>
									</li>

									<!-- TAB-3 LINK -->
									<li class="tab-link" data-tab="tab-3">
										<h5 class="h5-sm">Drinks</h5>
									</li>

									<!-- TAB-3 LINK -->
									<li class="tab-link" data-tab="tab-4">
										<h5 class="h5-sm">Desserts</h5>
									</li>

								</ul>
							</div>
						</div>	
				 	</div> 

				 	<!-- TABS CONTENT -->
				 	<div id="tabs-content">
				 		<!-- TAB-1 CONTENT -->
						<div id="tab-1" class="tab-content current">
							<div class="row">
								<?php
									$query = mysqli_query($db, "SELECT id, judul, deskripsi, harga, gambar FROM menu WHERE category = 'burgers'");
									if (mysqli_num_rows($query) > 0) {
										while ($menu = mysqli_fetch_assoc($query)) {
								?>
								<!-- MENU ITEM -->
								<div class="col-sm-6 col-lg-3">
									<div class="menu-7-item">
										<!-- IMAGE -->
										<div class="menu-7-img rel">
											<!-- Image -->
											<img class="img-fluid" src="./assets/images/menu/<?php echo $menu['gambar'];?>" alt="menu-image" />
											<!-- Price -->
											<div class="menu-7-price bg-coffee">
												<h5 class="h5-xs yellow-color">Rp. <?php echo $menu['harga'];?>,00</h5>
											</div>
											<!-- Rating (Assumed static for this example) -->
											<div class="item-rating">
												<div class="stars-rating stars-lg">
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star-half-alt"></i>
												</div>
											</div>
											<!-- Like Icon (Assumed static for this example) -->
											<div class="like-ico ico-20">
												<a href="#"><span class="flaticon-heart"></span></a>
											</div>
										</div>
										<!-- TEXT -->
										<div class="menu-7-txt rel">
											<!-- Title -->
											<h5 class="h5-sm"><?php echo $menu['judul'];?></h5>
											<!-- Description -->
											<p class="grey-color"><?php echo $menu['deskripsi'];?></p>
											<!-- Button (Assumed static for this example) -->
											<a href="#AddCart" class="btn btn-sm btn-tra-grey yellow-hover">
												<span class="flaticon-shopping-bag"></span> Add to Cart
											</a>
										</div>
									</div>
								</div> <!-- END MENU ITEM -->
								<?php
										} // End while loop
									} else {
										echo "No menu items found.";
								}
								?>
							</div>  <!-- End row -->	
						</div>	<!-- END TAB-1 CONTENT -->

						<!-- TAB-2 CONTENT -->
						<div id="tab-2" class="tab-content">
							<div class="row">
								<?php
									$query = mysqli_query($db, "SELECT id, judul, deskripsi, harga, gambar FROM menu WHERE category = 'sides'");
									if (mysqli_num_rows($query) > 0) {
										while ($menu = mysqli_fetch_assoc($query)) {
								?>
								<!-- MENU ITEM -->
								<div class="col-sm-6 col-lg-3">
									<div class="menu-7-item">
										<!-- IMAGE -->
										<div class="menu-7-img rel">
											<!-- Image -->
											<img class="img-fluid" src="./assets/images/menu/<?php echo $menu['gambar'];?>" alt="menu-image" />
											<!-- Price -->
											<div class="menu-7-price bg-coffee">
												<h5 class="h5-xs yellow-color">Rp. <?php echo $menu['harga'];?>,00</h5>
											</div>
											<!-- Rating (Assumed static for this example) -->
											<div class="item-rating">
												<div class="stars-rating stars-lg">
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star-half-alt"></i>
												</div>
											</div>
											<!-- Like Icon (Assumed static for this example) -->
											<div class="like-ico ico-20">
												<a href="#"><span class="flaticon-heart"></span></a>
											</div>
										</div>
										<!-- TEXT -->
										<div class="menu-7-txt rel">
											<!-- Title -->
											<h5 class="h5-sm"><?php echo $menu['judul'];?></h5>
											<!-- Description -->
											<p class="grey-color"><?php echo $menu['deskripsi'];?></p>
											<!-- Button (Assumed static for this example) -->
											<a href="#AddCart" class="btn btn-sm btn-tra-grey yellow-hover">
												<span class="flaticon-shopping-bag"></span> Add to Cart
											</a>
										</div>
									</div>
								</div> <!-- END MENU ITEM -->
								<?php
										} // End while loop
									} else {
										echo "No menu items found.";
								}
								?>
							</div>  <!-- End row -->	
						</div>	<!-- END TAB-2 CONTENT -->

						<!-- TAB-3 CONTENT -->
						<div id="tab-3" class="tab-content">
							<div class="row">
								<?php
									$query = mysqli_query($db, "SELECT id, judul, deskripsi, harga, gambar FROM menu WHERE category = 'drinks'");
									if (mysqli_num_rows($query) > 0) {
										while ($menu = mysqli_fetch_assoc($query)) {
								?>
								<!-- MENU ITEM -->
								<div class="col-sm-6 col-lg-3">
									<div class="menu-7-item">
										<!-- IMAGE -->
										<div class="menu-7-img rel">
											<!-- Image -->
											<img class="img-fluid" src="./assets/images/menu/<?php echo $menu['gambar'];?>" alt="menu-image" />
											<!-- Price -->
											<div class="menu-7-price bg-coffee">
												<h5 class="h5-xs yellow-color">Rp. <?php echo $menu['harga'];?>,00</h5>
											</div>
											<!-- Rating (Assumed static for this example) -->
											<div class="item-rating">
												<div class="stars-rating stars-lg">
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star-half-alt"></i>
												</div>
											</div>
											<!-- Like Icon (Assumed static for this example) -->
											<div class="like-ico ico-20">
												<a href="#"><span class="flaticon-heart"></span></a>
											</div>
										</div>
										<!-- TEXT -->
										<div class="menu-7-txt rel">
											<!-- Title -->
											<h5 class="h5-sm"><?php echo $menu['judul'];?></h5>
											<!-- Description -->
											<p class="grey-color"><?php echo $menu['deskripsi'];?></p>
											<!-- Button (Assumed static for this example) -->
											<a href="#AddCart" class="btn btn-sm btn-tra-grey yellow-hover">
												<span class="flaticon-shopping-bag"></span> Add to Cart
											</a>
										</div>
									</div>
								</div> <!-- END MENU ITEM -->
								<?php
										} // End while loop
									} else {
										echo "No menu items found.";
								}
								?>
							</div>  <!-- End row -->	
						</div>	<!-- END TAB-3 CONTENT -->

						<!-- TAB-4 CONTENT -->
						<div id="tab-4" class="tab-content">
							<div class="row">
								<?php
									$query = mysqli_query($db, "SELECT id, judul, deskripsi, harga, gambar FROM menu WHERE category = 'desserts'");
									if (mysqli_num_rows($query) > 0) {
										while ($menu = mysqli_fetch_assoc($query)) {
								?>
								<!-- MENU ITEM -->
								<div class="col-sm-6 col-lg-3">
									<div class="menu-7-item">
										<!-- IMAGE -->
										<div class="menu-7-img rel">
											<!-- Image -->
											<img class="img-fluid" src="./assets/images/menu/<?php echo $menu['gambar'];?>" alt="menu-image" />
											<!-- Price -->
											<div class="menu-7-price bg-coffee">
												<h5 class="h5-xs yellow-color">Rp. <?php echo $menu['harga'];?>,00</h5>
											</div>
											<!-- Rating (Assumed static for this example) -->
											<div class="item-rating">
												<div class="stars-rating stars-lg">
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star"></i>
													<i class="fas fa-star-half-alt"></i>
												</div>
											</div>
											<!-- Like Icon (Assumed static for this example) -->
											<div class="like-ico ico-20">
												<a href="#"><span class="flaticon-heart"></span></a>
											</div>
										</div>
										<!-- TEXT -->
										<div class="menu-7-txt rel">
											<!-- Title -->
											<h5 class="h5-sm"><?php echo $menu['judul'];?></h5>
											<!-- Description -->
											<p class="grey-color"><?php echo $menu['deskripsi'];?></p>
											<!-- Button (Assumed static for this example) -->
											<a href="#AddCart" class="btn btn-sm btn-tra-grey yellow-hover">
												<span class="flaticon-shopping-bag"></span> Add to Cart
											</a>
										</div>
									</div>
								</div> <!-- END MENU ITEM -->
								<?php
										} // End while loop
									} else {
										echo "No menu items found.";
								}
								?>
							</div>  <!-- End row -->	
						</div>	<!-- END TAB-4 CONTENT -->
				 	</div>	<!-- END TABS CONTENT -->
				</div>	   <!-- End container -->
			</section>	<!-- END MENU-8 -->

			<!-- Faktor Error -->
			<!-- GALLERY-3
			============================================= -->
			<section id="Gallery" class="gallery-section division">
				<!-- IMAGES HOLDER -->
				<div class="row gallery-grid">
					<div class="col">	
						<div class="owl-carousel images-carousel">	
							<!-- IMAGE #1 -->
						  	<div class="gallery-img">
								<a href="./assets/images/gallery/gallery-01.png" class="image-link">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="./assets/images/gallery/gallery-01.png" alt="gallery-image" />			
										<div class="item-overlay"></div>
										<!-- Image Meta -->
										<div class="img-meta white-color">
											<h5 class="h5-md">Daging Steak</h5>											 
										</div> 
									</div>
								</a>
							</div>
							<!-- IMAGE #2 -->
						  	<div class="gallery-img">
								<a href="./assets/images/gallery/gallery-02.png" class="image-link">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="./assets/images/gallery/gallery-02.png" alt="gallery-image" />			
										<div class="item-overlay"></div>
										<!-- Image Meta -->
										<div class="img-meta white-color">
											<h5 class="h5-md">Hamburger</h5>										 
										</div> 
									</div>
								</a>
							</div>
							<!-- IMAGE #3 -->
						  	<div class="gallery-img">
								<a href="./assets/images/gallery/gallery-03.png" class="image-link">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="./assets/images/gallery/gallery-03.png" alt="gallery-image" />			
										<div class="item-overlay"></div>
										<!-- Image Meta -->
										<div class="img-meta white-color">
											<h5 class="h5-md">Pizza Italia</h5>										 
										</div> 
									</div>
								</a>
							</div>
							<!-- IMAGE #4 -->
						  	<div class="gallery-img">
								<a href="./assets/images/gallery/gallery-04.png" class="image-link">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="./assets/images/gallery/gallery-04.png" alt="gallery-image" />			
										<div class="item-overlay"></div>
										<!-- Image Meta -->
										<div class="img-meta white-color">
											<h5 class="h5-md">Hot Dog</h5>											 
										</div> 
									</div>
								</a>
							</div>
							<!-- IMAGE #5 -->
						  	<div class="gallery-img">
								<a href="./assets/images/gallery/gallery-05.png" class="image-link">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="./assets/images/gallery/gallery-05.png" alt="gallery-image" />			
										<div class="item-overlay"></div>
										<!-- Image Meta -->
										<div class="img-meta white-color">
											<h5 class="h5-md">Daging Steak</h5>												 
										</div> 
									</div>
								</a>
							</div>
							<!-- IMAGE #6 -->
						  	<div class="gallery-img">
								<a href="./assets/images/gallery/gallery-06.png" class="image-link">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="./assets/images/gallery/gallery-06.png" alt="gallery-image" />			
										<div class="item-overlay"></div>
										<!-- Image Meta -->
										<div class="img-meta white-color">
											<h5 class="h5-md">Hamburger</h5>											 
										</div> 
									</div>
								</a>
							</div>
							<!-- IMAGE #7 -->
						  	<div class="gallery-img">
								<a href="./assets/images/gallery/gallery-07.png" class="image-link">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="./assets/images/gallery/gallery-07.png" alt="gallery-image" />			
										<div class="item-overlay"></div>
										<!-- Image Meta -->
										<div class="img-meta white-color">
											<h5 class="h5-md">Pizza Italia</h5>											 
										</div> 
									</div>
								</a>
							</div>
							<!-- IMAGE #8 -->
						  	<div class="gallery-img">
								<a href="./assets/images/gallery/gallery-08.png" class="image-link">
									<div class="hover-overlay"> 
										<img class="img-fluid" src="./assets/images/gallery/gallery-08.png" alt="gallery-image" />			
										<div class="item-overlay"></div>
										<!-- Image Meta -->
										<div class="img-meta white-color">
											<h5 class="h5-md">Hot Dog</h5>													 
										</div> 
									</div>
								</a>
							</div>
						</div>
					</div>  <!-- End col-x -->
				</div>	<!-- END IMAGES HOLDER -->
			</section>	<!-- END GALLERY-3 -->	

			<!-- team -->
			<section id="Team" class="wide-70">
				<div class="container">
				  <div class="sb-group-title mb-30">
					<div class="sb-left mb-30">
					  <h2 class="mb-20">Koki <span>Suliid</span> Burger</h2>
					  <p class="sb-text">Menghadirkan cita rasa burger yang <br>autentik dan inovatif dengan sentuhan khas.</p>
					</div>
				  </div>
				  <div class="row">
					<div class="col-lg-4">
					  <div class="sb-team-member mb-30">
						<div class="sb-photo-frame mb-35">
						  <img src="./assets/images/team/team-01.png" alt="Team member">
						</div>
						<div class="sb-member-description">
						  <h4 class="sb-mb-10">Cassiel D. Ferdinand</h4>
						  <p class="sb-text sb-text-sm sb-mb-10">Teknik Informatika</p>
						  <ul class="sb-social">
							<li><a href="#."><i class="fab fa-twitter"></i></a></li>
							<li><a href="#."><i class="fab fa-instagram"></i></a></li>
							<li><a href="#."><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#."><i class="fab fa-youtube"></i></a></li>
						  </ul>
						</div>
					  </div>
					</div>
					<div class="col-lg-4">
					  <div class="sb-team-member mb-30">
						<div class="sb-photo-frame mb-35">
						  <img src="./assets/images/team/team-02.png" alt="Team member">
						</div>
						<div class="sb-member-description">
						  <h3 class="sb-mb-10">Siti Shalu Prilia</h3>
						  <p class="sb-text sb-text-sm sb-mb-10">Teknik Informatika</p>
						  <ul class="sb-social">
							<li><a href="#."><i class="fab fa-twitter"></i></a></li>
							<li><a href="#."><i class="fab fa-instagram"></i></a></li>
							<li><a href="#."><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#."><i class="fab fa-youtube"></i></a></li>
						  </ul>
						</div>
					  </div>
					</div>
					<div class="col-lg-4">
					  <div class="sb-team-member mb-30">
						<div class="sb-photo-frame mb-35">
						  <img src="./assets/images/team/team-03.png" alt="Team member">
						</div>
						<div class="sb-member-description">
						  <h3 class="sb-mb-10">M. Vico Lacosto</h3>
						  <p class="sb-text sb-text-sm sb-mb-10">Teknik Informatika</p>
						  <ul class="sb-social">
							<li><a href="#."><i class="fab fa-twitter"></i></a></li>
							<li><a href="#."><i class="fab fa-instagram"></i></a></li>
							<li><a href="#."><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#."><i class="fab fa-youtube"></i></a></li>
						  </ul>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			</section><!-- team end -->

			<section id="Faq">
				<div class="container">
					<div class="row">
						<div class="sb-left mb-30">
							<h2 class="mb-20">Pertanyaan</h2>
							<p class="sb-text">Selamat datang di Suliid Burger! Temukan jawaban atas <br>pertanyaan umum tentang pengalaman bersantap Anda di sini. Pelajari</p>
						</div>
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                  <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Apa metode pengiriman yang tersedia?
                                    </button>
                                  </h2>
                                  <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Kami menyediakan layanan pengiriman dengan kurir untuk pengiriman lokal dan pengiriman ekspres untuk pengiriman internasional.</div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                        Bagaimana cara memesan layanan?
                                    </button>
                                  </h2>
                                  <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Anda dapat memesan layanan kami melalui website kami dengan mengisi formulir pemesanan atau menghubungi layanan pelanggan kami di (nomor telepon atau email).</div>
                                  </div>
                                </div>
                                <div class="accordion-item">
                                  <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        Apakah layanan tersedia secara online atau offline?
                                    </button>
                                  </h2>
                                  <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Layanan kami tersedia secara online melalui platform kami. Anda dapat mengakses dan memesan layanan kami kapan saja.</div>
                                  </div>
                                </div>
                            </div>
					</div>
				</div>
			</section>

			<section id="Location" class="wide-30">
				<div class="container">
					<div class="sb-left mb-30">
						<h2 class="mb-20">Location Outlet</h2>
						<p class="sb-text">Jelajahi dunia burger di Suliid Burger, terletak di Jakarta. <br>Dari burger klasik hingga kreasi modern, kami menyajikan hidangan yang menggugah selera dengan pelayanan yang ramah.</p>
					</div>
					<div id="map" style="height: 400px;"></div>
				</div>	
            </section>

			<section id="Contact" class="wide-50">
				<div class="container">
					<div class="row">
					   <!-- Contact FORM -->
						<div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
							<div class="form-holder">'
							<h2 class="mb-20 text-center">Contact</h2>
								<!-- Text -->	
							   <p class="p-xl text-center">
								   Hubungi Kami di <a href="tel:6281234567890">(62) 812-3456-7890</a>
							   </p>
							   <!-- Form -->
							   <form name="bookinkform" class="row booking-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
								   <!-- Form Input -->
								   <div class="col-lg-6">
									   <input type="text" id="name" name="name" class="form-control name" placeholder="Your Name*" required> 
								   </div>
								   <div class="col-lg-6">
										<input type="text" id="subject" name="subject" class="form-control name" placeholder="Subject*" required> 
								   </div>
								   <!-- Form Input -->        
								   <div class="col-lg-12">
									   <input type="email" id="email" name="email" class="form-control email" placeholder="Email Address*" required> 
								   </div>
								   <!-- Form Textarea -->	        
								   <div class="col-md-12">
									   <textarea id="message" name="message" class="form-control message" rows="4" placeholder="Your Message ..."></textarea>
								   </div> 				   
								   <!-- Form Button -->
								   <div class="col-md-12 mt-10">  
									   <button type="submit" class="btn btn-md btn-red tra-red-hover submit">Send</button> 
								   </div>									 
								   <!-- Form Message -->
								   <div class="col-md-12 booking-form-msg text-center">
									   <div class="sending-msg"><span class="loading"></span></div>
								   </div>												   
							   </form>	<!-- End Form -->	
							</div>	
						</div>	<!-- END BOOKING FORM -->	
				   </div>	<!-- End row -->
			   </div>	   <!-- End container -->	
			</section>


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
		<script src="./assets/js/jquery.magnific-popup.min.js"></script>
        <script src="./assets/js/custom.js"></script>

		
		<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
		<!-- JavaScript to initialize the map -->
		<script>
			// Initialize the map
			var map = L.map('map').setView([-6.22993, 106.76108], 16); // Set the center of the map to Jakarta
	
			// Add tile layer to the map
			L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			maxZoom: 19,
			attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
			}).addTo(map);
	
			// Add markers for Tanri Abeng University and Universitas Prof Dr Moestopo Beragama
			var tanriAbengMarker = L.marker([-6.22993, 106.76108]).addTo(map)
			.bindPopup('<b>Tanri Abeng University</b><br>Jl. Swadarma Raya No.58, Ulujami, Kec. Pesanggrahan, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12250, Indonesia');
	
			var moestopoMarker = L.marker([-6.22887, 106.76120]).addTo(map)
			.bindPopup('<b>Universitas Prof Dr Moestopo Beragama</b><br>Jl. Swadarma Raya No.54 1, RT.1/RW.2, Ulujami, Kec. Pesanggrahan, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12250, Indonesia');
								
			var moestopoMarker = L.marker([-6.23145, 106.76053]).addTo(map)
			.bindPopup('<b>SD NEGERI ULUJAMI 02</b><br>Jl. Swadarma Raya No.3, RT.3/RW.8, Ulujami, Kec. Pesanggrahan, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12250, Indonesia');
	
		</script>

		<script>
		$(document).ready(function() {
			// Initialize Magnific Popup for image links
			$('.image-link').magnificPopup({
				type: 'image',
				gallery: {
					enabled: true // Enable gallery mode
				},
				zoom: {
					enabled: true, // Enable zoom effect
					duration: 300 // Duration of zoom effect
				}
			});
		});
		</script>
    </body>
</html>