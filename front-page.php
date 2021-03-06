<?php
get_header();
?>
    <!-- Start home section -->
    <div id="home">
        <!-- Start cSlider -->
		<?php
		$args      = array(
			'post_type' => 'slider',
		);
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ): ?>
        <div id="da-slider" class="da-slider">
            <div class="triangle"></div>
            <!-- mask element use for masking background image -->
            <div class="mask"></div>
            <!-- All slides centred in container element -->
            <div class="container">
				<?php while ( $the_query->have_posts() ):$the_query->the_post();
					?>
                    <div class="da-slide">
                        <h2 class="fittext2"><?php the_title(); ?></h2>
                        <!--                        <h4>--><?php //echo get_the_excerpt() ?><!--</h4>-->
						<?php the_content(); ?>
                        <a href="#" class="da-link button">Read more</a>
                        <div class="da-img">
                            <!--                            <img src="-->
							<?php //the_post_thumbnail_url(); ?><!--" alt="image01" width="320">-->
							<?php if ( has_post_thumbnail() ) {
								the_post_thumbnail();
							} ?>
                        </div>
                    </div>
				<?php
				endwhile; ?>
                <!-- Start cSlide navigation arrows -->
                <div class="da-arrows">
                    <span class="da-arrows-prev"></span>
                    <span class="da-arrows-next"></span>
                </div>
                <!-- End cSlide navigation arrows -->
            </div>
			<?php endif;
			wp_reset_postdata();
			?>
        </div>
    </div>
    <!-- End home section -->
    <!-- Service section start -->
    <div class="section primary-section" id="services">
		<?php
		$args      = array(
			'post_type' => 'service',
		);
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ): ?>
            <div class="container">
                <!-- Start title section -->
                <div class="title">
                    <h1><?php echo get_theme_mod( 'plutonwp_service_title' ); ?>
                    </h1>
                    <!-- Section's title goes here -->
                    <p><?php echo get_theme_mod( 'plutonwp_description_services' ) ?></p>
                    <!--Simple description for section goes here. -->
                </div>
                <div class="row-fluid">
					<?php
					while ( $the_query->have_posts() ):
						$the_query->the_post();
						?>
                        <div class="span4">
                            <div class="centered service">
                                <div class="circle-border zoom-in">
									<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail();
									} ?>
                                </div>
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo get_the_excerpt(); ?></p>
                            </div>
                        </div>
					<?php endwhile; ?>
                </div>
            </div>
		<?php
		endif;
		wp_reset_postdata();
		?>
    </div>
    <!-- Service section end -->
    <!-- Portfolio section start -->
    <div class="section secondary-section " id="portfolio">
        <div class="triangle"></div>
        <div class="container">
            <div class=" title">
                <h1><?php echo get_theme_mod( 'plutonwp_portfolio_title' ); ?></h1>
                <p><?php echo get_theme_mod( 'plutonwp_portfolio_description' ); ?></p>
            </div>
            <ul class="nav nav-pills">
                <li class="filter" data-filter="all">
                    <a href="#noAction">All</a>
                </li>
				<?php $taxonomies = get_taxonomies( [ 'object_type' => [ 'portfolio' ] ] ); ?>
				<?php foreach ( $taxonomies as $taxonomy ) { ?>
                    <li class="filter" data-filter="<?php echo $taxonomy; ?>">
                        <a href="#noAction"><?php
							echo $taxonomy; ?>
                        </a>
                    </li> <?php } ?>
            </ul>
            <!-- Start details for portfolio -->
            <div id="single-project">
				<?php
				$count     = 0;
				$args      = array(
					'post_type' => 'portfolio',
				);
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ):
					while ( $the_query->have_posts() ):$the_query->the_post();
						?>
                        <div id="slidingDiv<?php echo $count; ?>" class="toggleDiv row-fluid single-project">
                            <div class="span6">
								<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail();
								} ?>
                            </div>
                            <div class="span6">
                                <div class="project-description">
                                    <div class="project-title clearfix">
                                        <h3>Website for Some Client</h3>
                                        <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                                    </div>
                                    <div class="project-info">
                                        <div>
                                            <span>Client</span>Some Client Name
                                        </div>
                                        <div>
                                            <span>Date</span>July 2013
                                        </div>
                                        <div>
                                            <span>Skills</span>HTML5, CSS3, JavaScript
                                        </div>
                                        <div>
                                            <span>Link</span>http://examplecomp.com
                                        </div>
                                    </div>
                                    <p>Believe in yourself! Have faith in your abilities! Without a humble but
                                        reasonable
                                        confidence in your own powers you cannot be successful or happy.</p>
                                </div>
                            </div>
                        </div>
						<?php $count ++;
					endwhile;
				endif;
				wp_reset_postdata(); ?>
                <!-- End details for portfolio project 1 -->
				<?php
				$count     = 0;
				$args      = array(
					'post_type' => 'portfolio',
				);
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ): ?>
                    <ul id="portfolio-grid" class="thumbnails row">
						<?php while ( $the_query->have_posts() ):$the_query->the_post();
							$taxonomies = get_taxonomies( [ 'object_type' => [ 'portfolio' ] ] );
							?>
                            <li class="span4 mix <?php
							foreach ( $taxonomies as $taxonomy ) {
								if ( has_term( '', $taxonomy ) ) {
									echo $taxonomy;
								}
							}
							?>">
                                <div class="thumbnail">
									<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail();
									} ?>
                                    <a href="#single-project" class="more show_hide"
                                       rel="#slidingDiv<?php echo $count; ?>">
                                        <i class="icon-plus"></i>
                                    </a>
                                    <h3><?php the_content(); ?></h3>
                                    <p><?php get_the_excerpt(); ?></p>
                                    <div class="mask"></div>
                                </div>
                            </li>
							<?php
							$count ++;
						endwhile;
						?>
                    </ul>
				<?php endif;
				wp_reset_postdata();
				?>
            </div>
        </div>
    </div>
    <!-- Portfolio section end -->
    <!-- About us section start -->
    <div class="section primary-section" id="about">
        <div class="triangle"></div>
        <div class="container">
            <div class="title">
                <h1><?php echo get_theme_mod( 'plutonwp_title_text' ); ?></h1>
                <p><?php echo get_theme_mod( 'plutonwp_desc_text' ); ?>
                </p>
            </div>
			<?php
			$args      = array(
				'post_type' => 'team',
			);
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ):
				?>
                <div class="row-fluid team">
					<?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                        <div class="span4" id="first-person">
                            <div class="thumbnail">
								<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail();
								} ?>
                                <h3><?php the_title(); ?></h3>
                                <ul class="social">
                                    <li>
                                        <a href="">
                                            <span class="icon-facebook-circled"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-twitter-circled"></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <span class="icon-linkedin-circled"></span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="mask">
                                    <p>
										<?php the_content(); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
					<?php endwhile; ?>
                </div>
			<?php endif;
			wp_reset_postdata(); ?>
            <div class="about-text centered">
                <h3><?php echo get_theme_mod( 'plutonwp_about_heading' ); ?></h3>
                <p><?php echo get_theme_mod( 'plutonwp_about_desc' ); ?>
                </p>
            </div>
            <h3>Skills</h3>
            <div class="row-fluid">
                <div class="span6">
                    <ul class="skills">
                        <li>
                            <span class="bar" data-width="80%"></span>
                            <h3>Graphic Design</h3>
                        </li>
                        <li>
                            <span class="bar" data-width="95%"></span>
                            <h3>Html & Css</h3>
                        </li>
                        <li>
                            <span class="bar" data-width="68%"></span>
                            <h3>jQuery</h3>
                        </li>
                        <li>
                            <span class="bar" data-width="70%"></span>
                            <h3>Wordpress</h3>
                        </li>
                    </ul>
                </div>
                <div class="span6">
                    <div class="highlighted-box center">
                        <h1><?php echo get_theme_mod( 'hiring_heading' ); ?></h1>
                        <p>
							<?php echo get_theme_mod( 'hiring_description' ); ?>
                        </p>
                        <button class="button button-sp"><?php echo get_theme_mod( 'hiring_join_button' ); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About us section end -->
    <div class="section secondary-section">
        <div class="triangle"></div>
        <div class="container centered">
            <p class="large-text">
				<?php echo get_theme_mod( 'edit_quote' ); ?>
            </p>
            <a href="#" class="button"><?php echo get_theme_mod( 'edit_button' ); ?></a>
        </div>
    </div>
    <!-- Client section start -->
    <div id="clients">
        <div class="section primary-section">
            <div class="triangle"></div>
            <div class="container">
                <div class="title">
                    <h1><?php echo get_theme_mod( 'edit_client_title' ); ?></h1>
                    <p>
						<?php echo get_theme_mod( 'edit_client_desc' ); ?>
                    </p>
                </div>
				<?php
				$args      = array(
					'post_type' => 'client',
				);
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ):
					?>
                    <div class="row">
						<?php while ( $the_query->have_posts() ):$the_query->the_post(); ?>
                            <div class="span4">
                                <div class="testimonial">
									<?php the_content(); ?>
                                    <div class="whopic">
                                        <div class="arrow"></div>
										<?php if ( has_post_thumbnail() ) {
											the_post_thumbnail();
										} ?>
                                        <strong><?php the_title(); ?>
                                            <small>Client</small>
                                        </strong>
                                    </div>
                                </div>
                            </div>
						<?php endwhile; ?>
                    </div>
				<?php endif;
				wp_reset_postdata(); ?>
                <p class="testimonial-text">
					<?php echo get_theme_mod( 'edit_client_quote' ); ?></p>
            </div>
        </div>
    </div>
<?php
$args      = array(
	'post_type' => 'client-image',
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ):
	?>
    <div class="section third-section">
        <div class="container centered">
            <div class="sub-section">
                <div class="title clearfix">
                    <div class="pull-left">
                        <h3>Our Clients</h3>
                    </div>
                    <ul class="client-nav pull-right">
                        <li id="client-prev"></li>
                        <li id="client-next"></li>
                    </ul>
                </div>
                <ul class="row client-slider" id="clint-slider">
					<?php while ( $the_query->have_posts() ): $the_query->the_post(); ?>
                        <li>
                            <a href="">
								<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail();
								} ?>
                            </a>
                        </li>
					<?php endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
    <!-- Price section start -->
	<?php $args = array(
	'post_type' => 'subscription',
	'orderby'   => 'date',
	'order'     => 'ASC'
);
	$the_query  = new   WP_Query( $args );
	if ( $the_query->have_posts() ):
		?>
        <div id="price" class="section secondary-section">
            <div class="container">
                <div class="title">
                    <h1><?php echo get_theme_mod( 'edit_Price_title' ); ?></h1>
                    <p><?php echo get_theme_mod( 'edit_Price_desc' ); ?>
                    </p>
                </div>
                <div class="price-table row-fluid">
					<?php while ( $the_query->have_posts() ):$the_query->the_post(); ?>
                        <div class="span4 price-column">
                            <h3><?php the_title(); ?></h3>
                            <ul class="list">
                                <li class="price"><?php echo get_post_meta(get_the_ID(),'price',true); ?></li>
                                <li><strong><?php echo get_post_meta(get_the_ID(), 'setup', true); ?></strong> Setup</li>
                                <li><strong><?php echo get_post_meta(get_the_ID(), 'support', true); ?></strong> Support</li>
                                <li><strong><?php echo get_post_meta(get_the_ID(), 'storage', true); ?></strong> File Storage</li>
                            </ul>
                            <a href="#" class="button button-ps">BUY</a>
                        </div>
					<?php endwhile; ?>
                </div>
                <div class="centered">
                    <p class="price-text">
						<?php echo get_theme_mod( 'edit_Price_quote' ); ?>
                    </p>
                    <a href="#contact" class="button"><?php echo get_theme_mod( 'edit_price_button' ); ?></a>
                </div>
            </div>
        </div>
	<?php endif;
	wp_reset_postdata(); ?>
    <!-- Price section end -->
    <!-- Newsletter section start -->
    <div class="section third-section">
        <div class="container newsletter">
            <div class="sub-section">
                <div class="title clearfix">
                    <div class="pull-left">
                        <h3>Newsletter</h3>
                    </div>
                </div>
            </div>
            <div id="success-subscribe" class="alert alert-success invisible">
                <strong>Well done!</strong>You successfully subscribet to our
                newsletter.
            </div>
            <div class="row-fluid">
                <div class="span5">
                    <p>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                        nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                        erat volutpat.
                    </p>
                </div>
                <div class="span7">
                    <form class="inline-form">
						<?php echo do_shortcode('[contact-form-7 id="221" title="newsletter"]'); ?>
                    </form>
                    <div id="err-subscribe" class="error centered">
                        Please provide valid email address.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Newsletter section end -->
    <!-- Contact section start -->
    <div id="contact" class="contact">
        <div class="section secondary-section">
            <div class="container">
                <div class="title">
                    <h1><?php echo get_theme_mod( 'edit_contact_title' ); ?></h1>
                    <p>
						<?php echo get_theme_mod( 'edit_contact_desc' ); ?>
                    </p>
                </div>
            </div>
            <div class="map-wrapper">
                <div class="map-canvas" id="map-canvas"><?php echo get_theme_mod( 'edit_map' ); ?></div>
                <div class="container">
                    <div class="row-fluid">
                        <div class="span5 contact-form centered">
                            <h3>Say Hello</h3>
                            <div id="successSend" class="alert alert-success invisible">
                                <strong>Well done!</strong>Your message has been sent.
                            </div>
                            <div id="errorSend" class="alert alert-error invisible">
                                There was an error.
                            </div>
                            <form id="contact-form" action="php/mail.php">
								<?php echo do_shortcode('[contact-form-7 id="209" title="Contact form 1"]') ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="span9 center contact-info">
					<?php echo get_theme_mod( 'edit_contact_quote' ); ?>
                    <div class="title">
                        <h3><?php echo get_theme_mod( 'edit_contact_button' ); ?></h3>
                    </div>
                </div>
                <div class="row-fluid centered">
                    <ul class="social">
                        <li>
                            <a href="">
                                <span class="icon-facebook-circled"></span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="icon-twitter-circled"></span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="icon-linkedin-circled"></span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="icon-pinterest-circled"></span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="icon-dribbble-circled"></span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="icon-gplus-circled"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact section edn -->
<?php endif;
wp_reset_postdata(); ?>
<?php get_footer(); ?>