<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Page Template
 *
 * This template is the default page template. It is used to display content when someone is viewing a
 * singular view of a page ('page' post_type) unless another page template overrules this one.
 * @link http://codex.wordpress.org/Pages
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options;
?>
       
    <div id="content" class="page col-full">

        <?php woo_main_before(); ?>
    	
		<section id="main" class="col-left">

            <?php
                if ( is_front_page() ) { ?>

                <article class="full-width-feature light" id="independent-living">
                    <h1>Independent Living</h1>
                    <h2>Enable your loved-one to live independently in their own home. Safely and on their own terms.</h2>
                    <p>Our range of simple in-home sensors and detectors work without any intervention.</p>
                    <img src="wp-content/themes/mystile_child/images/icons/amano-connect-main-icon.png" alt="" />
                    
                </article>

                <div id="home-page-lede-buttons">
                    <div id="help-me-choose" class="feature-button">
                        <a href="#">Help Me Choose the Right Products</a>
                    </div>
                    <div id="ready-to-shop" class="feature-button">
                        <a href="#">I Know What I Want. <br />I'm Ready to Shop</a>
                    </div>
                </div>

                <article class="full-width-feature dark" id="your-peace-of-mind">
                    <h1>Your Peace of Mind</h1>
                    <h2>No more worrying about your loved-one’s wellbeing. No more panicky visits to check they’re OK.</h2>
                    <p>We provide the reassurance that your loved-one is safe and healthy so you can enjoy your visits in a better frame of mind.</p>
                </article>

                <article class="full-width-feature light" id="connections-diagram">
                    <img src="wp-content/themes/mystile_child/images/icons/connections-icon.png" alt="" />
                </article>

                <article class="full-width-feature dark" id="making-connections">
                    <h1>Making Connections</h1>
                    <h2>We keep you connected to your loved-one and your loved-one connected to the rest of the world.</h2>
                    <p>Our monitoring products alert you if something is up. Our simple to use computing devices help your loved-one connect online.</p>
                </article>

                <article class="full-width-feature light" id="preserving-dignity">
                    <h1>Preserving Dignity</h1>
                    <h2>Help maintain quality of life. Avoid expensive residential care costs.</h2>
                    <p>We’ll help you choose products that cater to your loved-one’s care requirements, keeping them in their own home and out of costly care homes.</p>
                </article>

                <div id="home-page-buttons">
                    <ul>
                        <li><a href="" id="choose-button">Help Me Choose the Right Products</a></li>
                        <li><a href="" id="buy-button">Buy Products</a></li>
                        <li><a href="" id="support-button">Our Support<br />Services</a></li>
                    </ul>
                </div>

            <?php }

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