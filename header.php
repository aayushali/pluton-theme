<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package plutonWp
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet'
          type='text/css'>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory' ); ?>/images/ico/favicon.ico">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'plutonwp' ); ?></a>
    <header id="masthead" class="site-header">
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="#" class="brand">
						<?php
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$logo           = wp_get_attachment_image_src( $custom_logo_id, 'full' );
						if ( has_custom_logo() ) {
							echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
						} else {
							?><img src="<?php bloginfo( 'template_directory' ); ?>/images/logo.png" width="120"
                                   height="40"
                                   alt="Logo"/>
							<?php
						}
						?>
                        <!-- This is website logo -->
                    </a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu'           => 'top-navigation',
							'container' => 'ul',
                            'menu_class'=> 'nav'
						) );
						?>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
    </header><!-- #masthead -->
