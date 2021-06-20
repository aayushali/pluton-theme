<?php
get_header();
?>
    <!-- Start home section -->
    <div id="home">
        <!-- Start cSlider -->
        <div id="da-slider" class="da-slider">
            <div class="triangle"></div>
            <!-- mask element use for masking background image -->
            <div class="mask"></div>
            <!-- All slides centred in container element -->
            <div class="container">
				<?php
				$args      = array(
					'post_type' => 'slider',
				);
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ):
					while ( $the_query->have_posts() ):$the_query->the_post();
						?>
                        <div class="da-slide">
                            <h2 class="fittext2"><?php the_title(); ?></h2>
                            <h4><?php echo get_the_excerpt() ?></h4>
							<?php the_content(); ?>
                            <a href="#" class="da-link button">Read more</a>
                            <div class="da-img">
                                <img src="<?php the_post_thumbnail_url(); ?>" alt="image01" width="320">
                            </div>
                        </div>
					<?php
					endwhile;
				endif;
				wp_reset_postdata();
				?>
                <!-- Start cSlide navigation arrows -->
                <div class="da-arrows">
                    <span class="da-arrows-prev"></span>
                    <span class="da-arrows-next"></span>
                </div>
                <!-- End cSlide navigation arrows -->
            </div>
        </div>
    </div>
    <!-- End home section -->
    <!-- Service section start -->
    <div class="section primary-section" id="service">
        <div class="container">
            <!-- Start title section -->
            <div class="title">
                <h1>What We Do?
                </h1>
                <!-- Section's title goes here -->
                <p>Duis mollis placerat quam, eget laoreet tellus tempor eu. Quisque dapibus in purus in dignissim.</p>
                <!--Simple description for section goes here. -->
            </div>
            <div class="row-fluid">
				<?php
				$args      = array(
					'post_type' => 'service'
				);
				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ):
					while ( $the_query->have_posts() ):
						$the_query->the_post();
						?>
                        <div class="span4">
                            <div class="centered service">
                                <div class="circle-border zoom-in">
                                    <img class="img-circle" src="<?php the_post_thumbnail_url(); ?>" alt="service 1">
                                </div>
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo get_the_excerpt(); ?></p>
                            </div>
                        </div>
					<?php endwhile;
				endif;
				wp_reset_postdata();
				?>
            </div>
        </div>
    </div>
    <!-- Service section end -->
    <!-- Portfolio section start -->
    <div class="section secondary-section " id="portfolio">
        <div class="triangle"></div>
        <div class="container">
            <div class=" title">
                <h1>Have You Seen our Works?</h1>
                <p>Duis mollis placerat quam, eget laoreet tellus tempor eu. Quisque dapibus in purus in dignissim.</p>
            </div>
            <ul class="nav nav-pills">
                <li class="filter" data-filter="all">
                    <a href="#noAction">All</a>
                </li>
                <li class="filter" data-filter="web">
                    <a href="#noAction">Web</a>
                </li>
                <li class="filter" data-filter="photo">
                    <a href="#noAction">Photo</a>
                </li>
                <li class="filter" data-filter="identity">
                    <a href="#noAction">Identity</a>
                </li>
            </ul>
            <!-- Start details for portfolio project 1 -->
            <div id="single-project">
                <div id="slidingDiv" class="toggleDiv row-fluid single-project">
                    <div class="span6">
                        <img src="images/Portfolio01.png" alt="project 1"/>
                    </div>
                    <div class="span6">
                        <div class="project-description">
                            <div class="project-title clearfix">
                                <h3>Webste for Some Client</h3>
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
                            <p>Believe in yourself! Have faith in your abilities! Without a humble but reasonable
                                confidence in your own powers you cannot be successful or happy.</p>
                        </div>
                    </div>
                </div>
                <!-- End details for portfolio project 1 -->
                <ul id="portfolio-grid" class="thumbnails row">
					<?php
					$args      = array(
						'post_type' => 'portfolio',
					);
					$the_query = new WP_Query( $args );
					if ( $the_query->have_posts() ):
						while ( $the_query->have_posts() ):$the_query->the_post();
							?>
                            <li class="span4 mix web">
                                <div class="thumbnail">
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="project 1">
                                    <a href="#single-project" class="more show_hide" rel="#slidingDiv">
                                        <i class="icon-plus"></i>
                                    </a>
                                    <h3><?php the_content(); ?></h3>
                                    <p><?php get_the_excerpt(); ?></p>
                                    <div class="mask"></div>
                                </div>
                            </li>
						<?php
						endwhile;
					endif;
					wp_reset_postdata();
					?>
                </ul>
            </div>
        </div>
    </div>
    <!-- Portfolio section end -->
<?php get_footer(); ?>