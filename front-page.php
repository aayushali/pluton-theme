<?php

get_header();


?>


    <!-- Start home section -->
    <div id="home">
        <!-- Start cSlider -->
        <div id="da-slider" class="da-slider">
            <div class="triangle"></div>
            <!-- mask elemet use for masking background image -->
            <div class="mask"></div>
            <!-- All slides centred in container element -->
            <div class="container">
                <!-- Start first slide -->
                <?php
                    $args = array(
                            'post_type' => 'slider',
                    );
                    $the_query = new WP_Query($args);
                    if($the_query->have_posts()):
                        while($the_query->have_posts()):$the_query->the_post();
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
                <!-- Start third slide -->
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




<?php get_footer(); ?>