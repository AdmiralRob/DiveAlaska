<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div class="site-content">
 *
 * @link       https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package    scaffold
 * @copyright  Copyright (c) 2019, Danny Cooper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Anton">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="site-wrapper">

	<header class="site-header">
		<div class="wrapper">
			<?php get_template_part( 'template-parts/branding' ); ?>
		</div><!-- .wrapper -->
		
		<?php get_template_part( 'template-parts/menu-1' ); ?>
	</header><!-- .site-header -->


	<div class="site-content">
		<div class="wrapper">