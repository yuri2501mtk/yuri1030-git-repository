<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Portfolio-temporaly
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
	<script src="https://kit.fontawesome.com/77ca52d9ca.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?><script type="text/javascript" src="https://ad.netowl.jp/js/star-php.js"></script>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'portfolio-temporaly' ); ?></a>

	<header id="masthead" class="site-header">

		<nav class=" wrapper-ovn ">
			<div class="hdr-nav dn-sp">


		<?php
		wp_nav_menu(array(
		  'theme_location' => 'header-navi',
		  'container_class' => 'hdr',
		  'container_id' => 'header',
		  'items_wrap' => '<ul class="header-pc">%3$s</ul>'
		));
		?>
		</div>
<div class="hamburger dn-pc">
  <span></span>
  <span></span>
  <span></span>
</div>
		<div class="globalMenuSp dn-pc">
	<?php
	wp_nav_menu(array(
		'theme_location' => 'header-navi',
		'container_class' => '',
		'container_id' => 'header',
		'items_wrap' => '<ul>%3$s</ul>'
	));
	?>
	</div>
		</nav>


		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
