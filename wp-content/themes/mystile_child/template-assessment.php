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

                <header>
			    	<h1><?php the_title(); ?></h1>
				</header>

                <?php

                if ( is_page('independent-living-assessment') ) {
                    ?>
                    <article class="full-width-feature dark" id="assessment-buttons">
                        <div class="narrower">
                            <div><img class="personal-icon" src="<?php echo site_url(); ?>/wp-content/themes/mystile_child/images/icons/personal-icon.png" alt="An icon representing a personal assessment" /></div>
                            <div class="feature-button"><a title="Independent Living – I Need Help With…" href="<?php echo site_url(); ?>/help-advice/independent-living-assessment/personal-assessment/">I'm interested in independent living technology for myself, a family member or a friend</a></div>
                            <div class="feature-button"><a title="Independent Living – Help for Professionals" href="<?php echo site_url(); ?>/help-advice/independent-living-assessment/information-for-professionals/">I'm a health / social care professional looking on behalf of a patient or for work</a></div>
                            <div><img class="healthcare-icon" src="<?php echo site_url(); ?>/wp-content/themes/mystile_child/images/icons/healthcare-professional-icon.png" alt="An icon representing an assessment for a healthcare professional" /></div>
                        </div>
                    </article>

                    <article class="full-width-feature light" id="live-chat-remind">
                        <img src="<?php echo site_url(); ?>/wp-content/themes/mystile_child/images/mascot/live-chat.png" alt="Our advisor chatting" />
                        <h1>Need help? Speak to an Advisor</h1>
                        <p>If at any point you would like to speak to an advisor, you can use the live chat facility at the bottom of the website. Advisors are available during office hours (Mon. to Fri. 9am to 4.30pm). Outside of office hours you can leave a message and an advisor will get back to you.</p>
                        <p>Alternatively, give us a call on <strong>01822 600060</strong>.</p>
                    </article>
                    <?php
                }

                if ( is_page('personal-assessment') ) {
                    ?>
                    <p>Click the areas below that concern you or your loved-one. In each section you'll learn more about how assistive technology can help resolve related issues and enable people to remain in their own home, living an independent life.</p>
                    <ul class="symptoms">
                        <li>
                            <a title="Poor Memory or Confusion" href="<?php echo site_url(); ?>/help-advice/independent-living-assessment/personal-assessment/poor-memory-confusion/">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/mystile_child/images/icons/symptoms/confusion.png" alt="An icon representing confusion" />
                                Poor memory or confusion
                            </a>
                        </li>
                        <li>
                            <a title="Security at Home" href="<?php echo site_url(); ?>/help-advice/independent-living-assessment/personal-assessment/security-home/">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/mystile_child/images/icons/symptoms/security.png" alt="An icon representing security" />
                                Security at home
                            </a>
                        </li>
                        <li>
                            <a title="Safety at Home" href="<?php echo site_url(); ?>/help-advice/independent-living-assessment/personal-assessment/safety-home/">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/mystile_child/images/icons/symptoms/safety.png" alt="An icon representing safety" />
                                Safety at home
                            </a>
                        </li>
                        <li>
                            <a title="Monitoring Health and Medical Conditions" href="<?php echo site_url(); ?>/help-advice/independent-living-assessment/personal-assessment/monitoring-health-medical-conditions/">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/mystile_child/images/icons/symptoms/health.png" alt="An icon representing health" />
                                Monitoring health &amp; medical conditions
                            </a>
                        </li>
                        <li>
                            <a title="Visual Impairment" href="<?php echo site_url(); ?>/help-advice/independent-living-assessment/personal-assessment/visual-impairment/">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/mystile_child/images/icons/symptoms/visual-impairment.png" alt="An icon representing visual impairment" />
                                Visual impairment
                            </a>
                        </li>
                        <li>
                            <a title="Speech Impairment" href="<?php echo site_url(); ?>/help-advice/independent-living-assessment/personal-assessment/speech-impairment/">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/mystile_child/images/icons/symptoms/speech-impairment.png" alt="An icon representing speech impairment" />
                                Speech impairment
                            </a>
                        </li>
                        <li>
                            <a title="Hearing Impairment" href="<?php echo site_url(); ?>/help-advice/independent-living-assessment/personal-assessment/hearing-impairment/">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/mystile_child/images/icons/symptoms/hearing-impairment.png" alt="An icon representing hearing impairment" />
                                Hearing impairment
                            </a>
                        </li>
                        <li>
                            <a title="Communicating and Staying in Contact" href="<?php echo site_url(); ?>/help-advice/independent-living-assessment/personal-assessment/communicating-staying-contact/">
                                <img src="<?php echo site_url(); ?>/wp-content/themes/mystile_child/images/icons/symptoms/communication.png" alt="An icon representing communication" />
                                Communicating and staying in contact
                            </a>
                        </li>
                    </ul>
                    <?php
                }

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