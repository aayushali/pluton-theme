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
                        <h1>We're Hiring</h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed
                            diam nonummy nibh euismod tincidunt ut laoreet dolore magna
                            aliquam erat volutpat. Ut wisi enim ad minim veniam, ullamcorper
                            suscipit lobortis nisl ut aliquip consequat. I learned that we
                            can do anything, but we can't do everything...
                        </p>
                        <button class="button button-sp">Join Us</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About us section end -->
<?php get_footer(); ?>