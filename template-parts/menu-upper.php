<?php
/**
 * Template part for displaying the primary navigation menu.
 *
 * @package    scaffold
 * @copyright  Copyright (c) 2019, Danny Cooper
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

?>

<nav id="site-navigation" class="menu-upper">
	<div class="wrapper">
		<button class="menu-toggle" aria-controls="site-menu" aria-expanded="false">
			<?php esc_html_e( 'Site Navigation', 'scaffold' ); ?>
		</button>

		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'menu-upper',
				'menu_id'        => 'site-menu-upper',
			)
		);
		?>
	</div><!-- .wrapper -->
</nav><!-- .menu-1 -->
