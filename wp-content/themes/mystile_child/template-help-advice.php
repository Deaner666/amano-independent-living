<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Template Name: Help and Advice Home Page
 *
 * This overwrites the default MyStile template for the 
 * root page of the Help and Advice section.
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
                if (!is_front_page()) { ?>
                    <header>
                        <h1><?php the_title(); ?></h1>
                    </header>
                <?php }
            ?>

            <article class="full-width-feature dark" id="online-assessment-lede">
                <img src="<?php echo site_url(); ?>/wp-content/themes/mystile_child/images/mascot/online-assessment-checklist.png" alt="Our advisor holding an assessment checklist" />
                <h1>We understand telecare can be overwhelming</h1>
                <p>There is some unfriendly terminology and a potentially confusing range of products available.</p>
                <p>On top of that, your reasons for looking into independent living are unique. Everyone’s circumstances are a little different.</p>
                <p>We want to help cut through the confusion and guide you to the products and services that are suited to your needs.</p>
                <p>To that end, we’ve created an online assessment tool to provide you with detailed information about the technology that is available to support you.</p>
                <div class="feature-button"><a href="<?php echo site_url(); ?>/help-advice/independent-living-assessment/">Take The Online Assessment</a></div>
            </article>

            <article class="full-width-feature light" id="live-chat-lede">
                <img src="<?php echo site_url(); ?>/wp-content/themes/mystile_child/images/mascot/live-chat.png" alt="Our advisor chatting" />
                <h1>Speak to an advisor</h1>
                <p>You can speak directly to one of our advisors using the live chat functionality at the bottom of the website. The live chat is available during office hours, Monday to Friday, 9am to 4.30pm. Outside of those hours you can still leave a message.</p>
                <p>Alternatively, give us a call on <strong>01822 600060</strong>.</p>
            </article>

            <article class="full-width-feature dark">
                <h1>Already know what you're after?</h1>
                <p><a href="<?php echo site_url(); ?>/shop/">Then head straight to our online shop</a>, where you can buy from our carefully selected range of telecare and assisted living products and services.</p>
            </article>

            <article class="full-width-feature light">
                <h1>Assisted living in the home - a virtual tour</h1>
                <h3>Coming soon!</h3>
            </article>

            <article class="full-width-feature dark">
                <h1>FAQs</h1>
                <p>If you just need a quick answer to a common question, perhaps about a product you’ve already bought, check out our Frequently Asked Questions (<abbr title="Frequently Asked Questions">FAQs</abbr>).</p>
            </article>

            <?php

            	if ( have_posts() ) { $count = 0;
            		while ( have_posts() ) { the_post(); $count++;
            ?>                                                           
            <article <?php post_class(); ?>>

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