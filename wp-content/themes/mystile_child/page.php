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
                    <h1>Connected Technology for Independent Living</h1>
                    <h2>Enable your loved-one to live independently in their own home. Safely and on their own terms.</h2>
                    <p>Our range of simple in-home sensors and detectors work without any intervention.</p>
                    <div id="home-page-lede-buttons">
                        <div id="help-me-choose" class="feature-button">
                            <a href="/help-advice">Help Me Choose the Right Products</a>
                        </div>
                        <div id="ready-to-shop" class="feature-button">
                            <a href="/shop">I Know What I Want. <br />I'm Ready to Shop</a>
                        </div>
                    </div>
                </article>

                <article class="full-width-feature light" id="connect-animation">
                    <div class="anim-smoke-detector wow fadeInLeftBig" data-wow-offset="250"><img src="wp-content/themes/mystile_child/images/animations/home-page-connect/smoke-detector.png" alt="" /></div>
                    <div class="anim-relative wow fadeInLeftBig" data-wow-offset="150" data-wow-delay="1.5s"><img src="wp-content/themes/mystile_child/images/animations/home-page-connect/relative.png" alt="" /></div>
                    <div class="anim-motion-sensor wow fadeInLeftBig" data-wow-offset="120" data-wow-delay=".5s"><img src="wp-content/themes/mystile_child/images/animations/home-page-connect/motion-sensor.png" alt="" /></div>
                    <div class="anim-personal-alarm wow fadeInRightBig" data-wow-offset="200" data-wow-delay="0.3s"><img src="wp-content/themes/mystile_child/images/animations/home-page-connect/personal-alarm.png" alt="" /></div>
                    <div class="anim-healthcare-professional wow fadeInRightBig" data-wow-offset="150" data-wow-delay="1.3s"><img src="wp-content/themes/mystile_child/images/animations/home-page-connect/healthcare-professional.png" alt="" /></div>
                    <div class="anim-communication wow fadeInRightBig" data-wow-offset="120" data-wow-delay="0.9s"><img src="wp-content/themes/mystile_child/images/animations/home-page-connect/communication.png" alt="" /></div>
                    <div class="anim-home wow fadeIn" ><img src="wp-content/themes/mystile_child/images/animations/home-page-connect/home.png" alt="" /></div>
                </article>

                <article class="full-width-feature light" id="extra-help">
                    <div class="anim-mascot wow fadeIn" data-wow-offset="100" data-wow-delay=".2s"><img src="wp-content/themes/mystile_child/images/mascot/let-me-guide-you.png" alt="" /></div>
                    <div class="buttons wow fadeIn" data-wow-offset="100" data-wow-delay=".8s">
                        <div class="feature-button"><a href="/help-advice/independent-living-assessment/">Take the Independent Living Assesment</a></div>
                        <div class="feature-button"><a href="/help-advice/faqs/">Frequently Asked <br />Questions</a></div>
                    </div>
                </article>

                <article class="full-width-feature dark" id="making-connections">
                    <h1>Making Connections</h1>
                    <h2>We keep you connected to your loved-one and your loved-one connected to the rest of the world.</h2>
                    <p>Our telecare and telehealth products alert you if something is up. Our simple to use computing devices help your loved-one connect online.</p>
                    <table>
                        <tr>
                            <td class="wow fadeIn" data-wow-offset="100"><img src="wp-content/themes/mystile_child/images/icons/features-benefits/safety-monitors.png" alt="" /></td>
                            <td><p>Environmental detectors will alert relatives or emergency responders in the event of a fire, flood or other hazardous situation.</p></td>
                            <td class="wow fadeIn" data-wow-offset="100" data-wow-delay="0.4s"><img src="wp-content/themes/mystile_child/images/icons/features-benefits/personal-alarms.png" alt="" /></td>
                            <td><p>Alarms can be worn about the person and activated by the wearer in case of emergency. They can even trigger automatically if the wearer is incapacitated.</p></td>
                        </tr>
                        <tr>
                            <td class="wow fadeIn" data-wow-offset="100" data-wow-delay="0.2s"><img src="wp-content/themes/mystile_child/images/icons/features-benefits/activity-monitors.png" alt="" /></td>
                            <td><p>Detectors can be used to monitor activity, alerting family or emergency responders in case of inactivity. They can help pinpoint a person's location to aid emergency services.</p></td>
                            <td class="wow fadeIn" data-wow-offset="100" data-wow-delay="0.6s"><img src="wp-content/themes/mystile_child/images/icons/features-benefits/communication.png" alt="" /></td>
                            <td><p>Easy-to-use phones and computing devices keep families connected and help those living independently stay in touch with the wider world.</p></td>
                        </tr>
                        <tr>
                            <td class="wow fadeIn" data-wow-offset="100" data-wow-delay="0.2s"><img src="wp-content/themes/mystile_child/images/icons/features-benefits/telehealth.png" alt="" /></td>
                            <td><p>Telehealth devices monitor a person's medical condition and can alert family or carers if a problem is detected.</p></td>
                        </tr>
                    </table>
                    <p>These are just some examples of the independent living technology products available.</p>
                    <div class="center">
                    <div class="feature-button advice"><a href="/help-advice/">Help me Choose the Right Products</a></div>
                    <div class="feature-button shop"><a href="/shop/">I Know What I Want. <br />I'm Ready to Shop</a></div>
                    </div>
                </article>

                <article class="full-width-feature light">
                    <?php echo do_shortcode( '[wooslider slider_type="products" size="medium" link_title_to_product="true" display_only_featured="true"]' ) ?>
                </article>

                <article class="full-width-feature light" id="your-peace-of-mind">
                    <h1>Your Peace of Mind</h1>
                    <h2>No more worrying about your loved-one’s wellbeing. No more panicky visits to check they’re OK.</h2>
                    <p>We provide the reassurance that your loved-one is safe and healthy so you can enjoy your visits in a better frame of mind.</p>
                    <img class="wow fadeIn" data-wow-offset="200" data-wow-duration="2s" src="/wp-content/themes/mystile_child/images/icons/amano-connect-main-icon.png" alt="Icon representing independent living and connecting with family and healthcare professionals"/>
                </article>

                <article class="full-width-feature dark" id="preserving-dignity">
                    <h1>Preserving Dignity</h1>
                    <h2>Help maintain quality of life. Avoid expensive residential care costs.</h2>
                    <p>We’ll help you choose products that cater to your loved-one’s care requirements, keeping them in their own home and out of costly care homes.</p>
                </article>

                <div id="home-page-buttons">
                    <ul>
                        <li><a href="/help-advice/" id="choose-button">Help Me Choose the Right Products</a></li>
                        <li><a href="/shop/" id="buy-button">Buy Products</a></li>
                        <li><a href="/our-support-services" id="support-button">Our Support<br />Services</a></li>
                    </ul>
                </div>

                <article class="full-width-feature-light" id="still-got-questions">
                    <h1>Still got questions?</h1>
                    <h2>Or maybe you just prefer a bit of human interaction?</h2>
                    <p>If you need any information not covered by the website, or if you prefer to talk to a real person, you can use our online chat facility by clicking on the orange box in the bottom right corner of the site.</p>
                    <p>Alternatively, give us a call on <strong>01822 600060</strong>. We're always happy to talk!</p>
                    <img class="wow fadeInRightBig" data-wow-offset="150" src="wp-content/themes/mystile_child/images/mascot/pointing-down-and-right.png" alt="" />
                </article>

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