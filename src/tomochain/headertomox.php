<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tomochain
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="https://lab.alexcican.com/set_cookies/cookie.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if (!is_404()): ?>
<div class="site-mobile-menu-wrapper">
	<?php
	wp_nav_menu( array(
		'theme_location' => 'primary',
		'menu_id'        => 'site-mobile-menu',
	) );
	tomochain_social_links();
	?>
</div>
<?php endif; ?>
<div class="popup_btn tomo_btn_tmp_grad">

	<?php if (get_bloginfo('language') == 'en-US'): ?>
    	<a href="https://dex.testnet.tomochain.com/markets" title="" target="_blank"><span><?php echo esc_html__('Trade on TomoDEX','tomochain');?></span> <i class="fas fa-chart-area"></i></a>
    <?php elseif(get_bloginfo('language') == 'vi'): ?>
    	<a href="https://dex.testnet.tomochain.com/markets" title="" target="_blank"><span><?php echo esc_html__('Giao dịch trên TomoDEX','tomochain');?></span> <i class="fas fa-chart-area"></i></a>
    <?php elseif(get_bloginfo('language')): ?>
    	<a href="https://dex.testnet.tomochain.com/markets" title="" target="_blank"><span><?php echo esc_html__('Trade on TomoDEX','tomochain');?></span> <i class="fas fa-chart-area"></i></a>
    <?php endif; ?>

    <!-- <span class="close" title="Hide This Message">×</span> -->
</div>
<!--  -->
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'tomochain' ); ?></a>
	<?php if (!is_404()): ?>
	<header id="masthead" class="site-header">
		<div class="container">
			<div class="row">
				<div class="site-branding">
					<?php the_custom_logo(); ?>
				</div><!-- .site-branding -->

				<?php if ( function_exists('get_field') && ! get_field('hide_menu') ) : ?>
					<nav id="site-menu" class="main-menu hidden-md-down">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'link_before'    => '<span class="menu-item-text">',
							'link_after'     => '</span>'
						) );
						?>
					</nav><!-- #site-menu -->
				<?php endif; ?>


				<div class="header-tools">
					<?php
						if ( function_exists('get_field') && ! get_field('hide_language_switcher') ) {
							tomochain_lang_switcher();
						}
						tomochain_mobile_menu_btn();
					?>
				</div><!-- .header-tools-->
			</div>
		</div>
	</header><!-- #masthead -->
	<?php endif; ?>

	<div id="content" class="site-content">
