<?php
/* 
 * Template for displaying the header 
 *
 * @package Wordpress * @subpackage Nathalie-Mota *
 */
if
(!defined('ABSPATH')) {
	exit;
	// Exit if accessed directly. 
}
?>
<!Doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="keywords" content="photographe événementiel, photographe event, nathalie mota, photo format hd" />
	<meta name="description" content="Nathalie Mota - Site personnel pour la vente de mes photos en impression HD.">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap"
		rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<header>
		<div id="site-header">
			<div class="logo">
				<a href="<?php echo home_url('/'); ?>" aria-label="Page d'accueil de Nathalie Mota">
					<img src="<?php echo get_template_directory_uri(); ?>./images/Logo.png"
						alt="Logo <?php echo bloginfo('name'); ?>">
				</a>
			</div>

			<!-- Menu burger Mobile -->
			<div class="container-menu" onclick="Open(this)">
				<div class="bar1"></div>
				<div class="bar2"></div>
				<div class="bar3"></div>
			</div>

			<div class="nav">
				<?php wp_nav_menu(
					array(
						'theme_location' => 'main-mobile',
						'container' => false,
						'menu_class' => 'nav-menu',
					)
				); ?>
			</div>

			<!--Navigation menu desktop-->
			<nav class="navigation">

				<?php wp_nav_menu(array('theme_location' => 'main')); ?>
			</nav>
		</div>


	</header>