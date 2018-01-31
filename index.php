<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package dynamic
 */

get_header(); ?>

<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            
            <?php
            $images = get_field('slider', 'option');
            
            if( $images ): ?>
                <div id="slider" class="owl-carousel">
                        <?php foreach( $images as $image ): ?>
                            <div class="item fl fl-ai-e fl-jc-c" style="background:url(<?php echo $image['url']; ?>) center center no-repeat; background-size:cover;">
                                
                                <div class="txt center">
                                   <?php 
                                    echo '<h2>'.$image['alt'].'</h2>';
                                    echo '<div class="desc">'.$image['description'].'</div>';
                                    ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <div class="container">    
            <?php if ( have_posts() ) : ?>

                <?php if ( is_home() && ! is_front_page() ) : ?>
                    <header>
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                    </header>
                <?php endif; ?>

                <?php
                // Start the loop.
                while ( have_posts() ) : the_post();

                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                    get_template_part( 'content', get_post_format() );

                // End the loop.
                endwhile;

                // Previous/next page navigation.
                the_posts_pagination( array(
                    'prev_text'          => __( 'Previous page', 'dynamic' ),
                    'next_text'          => __( 'Next page', 'dynamic' ),
                    'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'dynamic' ) . ' </span>',
                ) );

            // If no content, include the "No posts found" template.
            else :
                get_template_part( 'content', 'none' );

            endif;
            ?>
            </div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->
<?php get_footer(); ?>
