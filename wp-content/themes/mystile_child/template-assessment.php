<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Template Name: Online Assessment Pages
 *
 * This overwrites the default MyStile template for the 
 * online assessment pages (change nav etc.).
 *
 * @package WooFramework
 * @subpackage Template
 */
 
global $woo_options;
get_header();
?>

    <div id="content" class="page col-full">

        <?php woo_main_before(); ?>
    	
		<section id="main" class="col-left">

            <?php
            	if ( have_posts() ) { $count = 0;
            		while ( have_posts() ) { the_post(); $count++;
            ?>                                                           
            <article <?php post_class(); ?>>
				
				<?php
                    if (!is_front_page()) { ?>
                        <header>
        			    	<h1><?php the_title(); ?></h1>
        				</header>
                    <?php }
                ?>

                <section class="entry">
                	<?php the_content(); ?>

					<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'woothemes' ), 'after' => '</div>' ) ); ?>
               	</section><!-- /.entry -->
                
            </article><!-- /.post -->
            
            <?php
            	// Determine wether or not to display comments here, based on "Theme Options".
            	if ( isset( $woo_options['woo_comments'] ) && in_array( $woo_options['woo_comments'], array( 'page', 'both' ) ) ) {
            		comments_template();
            	}

				} // End WHILE Loop
			} else {
		?>
			<article <?php post_class(); ?>>
            	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
            </article><!-- /.post -->
        <?php } // End IF Statement ?>  
        
		</section><!-- /#main -->
		
		<?php woo_main_after(); ?>

        <?php get_sidebar(); ?>

    </div><!-- /#content -->
		
<?php get_footer(); ?>