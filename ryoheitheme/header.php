<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage motionbasetheme
 * @since motionbasetheme 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,900|Rubik" rel="stylesheet">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:description" content="Freelance UX/UI/WEB Designer & Developer Based in Berlin" />
	<meta property="og:url" content="http://www.ryoheihara.com/" />
	<meta property="og:image" content="<?php bloginfo('template_url'); ?>/img/ogp.png" />
	<meta property="og:site_name" content="Ryohei Hara" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<!-- Global site tag (gtag.js) - Google Analytics
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-139532279-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-139532279-1');
	</script>-->
	<?php wp_enqueue_script( 'jquery' ); ?>
	<?php wp_head(); ?>
</head>
<body>
	<script type="text/javascript">
		var j = jQuery.noConflict();
		j(document).ready(function() {
			j(".menu-trigger").click( function () {
				j(this).toggleClass("active");
				j(".nav-sp").slideToggle(500);
			});
		});
	</script>
<div id="page">
	<header class="header fix-header">
		<div class="header-main">
			<div class="site-logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					Ryohei Hara (Beta)
				</a>
			</div>
			<a class="menu-trigger sponly" href="#"><span></span><span></span><span></span></a>

			<div class="header-menu sp-wrap nav-sp">
				<ul>
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>projects/">projects</a></li>
					<!--<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">reference</a></li>-->
					<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>about/">about</a></li>
					<li><a href="mailto:h.ryohei.titech@gmail.com">contact</a></li>
				</ul>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="main" class="site-main">
