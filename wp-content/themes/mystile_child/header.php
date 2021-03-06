<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
global $woo_options, $woocommerce;
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php if ( $woo_options['woo_boxed_layout'] == 'true' ) echo 'boxed'; ?> <?php if (!class_exists('woocommerce')) echo 'woocommerce-deactivated'; ?>">
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php woo_title(''); ?></title>
<?php woo_meta(); ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	wp_head();
	woo_head();
?>

</head>

<body <?php body_class(); ?>>
<?php woo_top(); ?>

<div id="wrapper">

	<div id="top">
		<nav class="amano-top-nav" role="navigation">	
			<?php
				if ( class_exists( 'woocommerce' ) ) {
					echo '<ul class="nav wc-nav wc-cart">';
					woocommerce_cart_link();
					echo '<li class="checkout"><a href="'.esc_url($woocommerce->cart->get_checkout_url()).'">'.__('Checkout','woothemes').'</a></li>';
					echo '</ul>';
				}
			?>

			<?php
				if ( class_exists( 'woocommerce' ) ) {
					// echo '<div id="search">';
					echo '<ul class="nav wc-nav wc-search">';
					echo get_search_form();
					echo '</ul>';
					// echo '<div>';
				}
			?>
			
			<?php if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'top-menu' ) ) { ?>
			<?php wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'top-nav', 'menu_class' => 'nav fl', 'theme_location' => 'top-menu' ) ); ?>
			<?php } ?>
		</nav>
	</div><!-- /#top -->

    <?php woo_header_before(); ?>

	<header id="header" class="col-full">

	    <h1 class="site-title">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<img itemprop="logo" src="<?php echo site_url(); ?>/wp-content/themes/mystile_child/images/layout/amano-connect-logo-horizontal.png" alt="<?php bloginfo( 'name' ); ?>" />
			</a>
		</h1>

		<?php if ( is_page_template('template-assessment.php') ) { ?>
			<!-- Add advisor character to header -->
			<div class="advisor-header">
				<img src="<?php echo site_url(); ?>/wp-content/themes/mystile_child/images/layout/assessment-advisor-header.png" alt="An illustration of a lady saying we are here to help" />
			</div>
		<?php } ?>

		<ul id="font-resizer">
			<li class="normal-font"><a class="small-style" href="javascript:;">Normal Font Size</a></li>
			<li class="medium-font"><a class="medium-style" href="javascript:;">Medium Font Size</a></li>
			<li class="large-font"><a class="large-style" href="javascript:;">Large Font Size</a></li>
		</ul>

		<ul id="colour-picker">
			<li class="full-colour"><a class="full-colour-style" href="javascript:;">Full Colour</a></li>
			<li class="black-white"><a class="black-white-style" href="javascript:;">Black on White</a></li>
			<li class="black-yellow"><a class="black-yellow-style" href="javascript:;">Black on Yellow</a></li>
			<li class="yellow-black"><a class="yellow-black-style" href="javascript:;">Yellow on Black</a></li>
			<li class="black-cream"><a class="black-cream-style" href="javascript:;">Black on Cream</a></li>
		</ul>

		<h3 class="nav-toggle"><a href="#navigation">&#9776; &nbsp; Toggle Main Menu<span><?php _e('Navigation', 'woothemes'); ?></span></a></h3>

        <?php woo_nav_before(); ?>

		<nav id="navigation" class="col-full" role="navigation">

			<?php
			if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' ) ) {
				wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'main-nav', 'menu_class' => 'nav fr', 'theme_location' => 'primary-menu' ) );
			} else {
			?>
	        <ul id="main-nav" class="nav fl">
				<?php if ( is_page() ) $highlight = 'page_item'; else $highlight = 'page_item current_page_item'; ?>
				<li class="<?php echo $highlight; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home', 'woothemes' ); ?></a></li>
				<?php wp_list_pages( 'sort_column=menu_order&depth=6&title_li=&exclude=' ); ?>
			</ul><!-- /#nav -->
	        <?php } ?>

		</nav><!-- /#navigation -->

		<?php woo_nav_after(); ?>

	</header><!-- /#header -->

	<?php woo_content_before(); ?>