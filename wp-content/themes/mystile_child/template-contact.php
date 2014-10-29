<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Template Name: Contact Form
 *
 * This overwrites the default MyStile template so we can 
 * use a gravity form and position it where we like.
 *
 * @package WooFramework
 * @subpackage Template
 */
 
global $woo_options;
get_header();
?>

    <div id="content" class="col-full">
    	
    	<?php woo_main_before(); ?>
    
		<section id="main" class="col-left">

            <article id="contact-page" class="page">

            <?php if( isset( $emailSent ) && $emailSent == true ) { ?>

                <p class="info"><?php _e( 'Your email was successfully sent.', 'woothemes' ); ?></p>

            <?php } else { ?>

                <?php if ( have_posts() ) { ?>

                <?php while ( have_posts() ) { the_post(); ?>
                
                		<header>
                			<h1><?php the_title(); ?></h1>
                		</header>

                        <section class="entry">
                			
                			<div class="location-twitter fix">
    							<?php if ( isset( $woo_options['woo_contact_panel'] ) && $woo_options['woo_contact_panel'] == 'true' ) { ?>
						    	<section id="office-location">
									<?php if (isset($woo_options['woo_contact_title'])) { ?><h3><?php echo esc_html( $woo_options['woo_contact_title'] ); ?></h3><?php } ?>
									<ul>
										<?php if (isset($woo_options['woo_contact_title']) && $woo_options['woo_contact_title'] != '' ) { ?><li><?php echo nl2br( esc_html( $woo_options['woo_contact_address'] ) ); ?></li><?php } ?>
										<?php if (isset($woo_options['woo_contact_number']) && $woo_options['woo_contact_number'] != '' ) { ?><li><?php _e('Tel:','woothemes'); ?> <?php echo esc_html( $woo_options['woo_contact_number'] ); ?></li><?php } ?>
										<?php if (isset($woo_options['woo_contact_fax']) && $woo_options['woo_contact_fax'] != '' ) { ?><li><?php _e('Fax:','woothemes'); ?> <?php echo esc_html( $woo_options['woo_contact_fax'] ); ?></li><?php } ?>
										<?php if (isset($woo_options['woo_contactform_email']) && $woo_options['woo_contactform_email'] != '' ) { ?><li><?php _e('Email:','woothemes'); ?> <a href="mailto:<?php echo $woo_options['woo_contactform_email']; ?>"><?php echo esc_html( $woo_options['woo_contactform_email'] ); ?></a></li><?php } ?>
									</ul>
						    	</section>
						    	<?php } ?>

						    	<div class="contact-social<?php if ( ( isset( $woo_options['woo_contact_panel'] ) && $woo_options['woo_contact_panel'] == 'true' ) && ( ( isset( $woo_options['woo_contact_twitter'] ) && $woo_options['woo_contact_twitter'] != '' ) || ( isset($woo_options['woo_contact_subscribe_and_connect']) && $woo_options['woo_contact_subscribe_and_connect'] == 'true' ) ) ) { ?> col-right<?php } ?>">
						    		
						    		<!-- Begin MailChimp Signup Form -->
									<div id="mc_embed_signup">
										<h3>Join us</h3>
										<p class="subscribe-intro">Join our email newsletter for exclusive deals and the latest telecare news from Amano Connect</p>
										<form action="//amanotech.us4.list-manage.com/subscribe/post?u=2717d4782e67bd897fbe8cf26&amp;id=c2d5ad4e35" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
											<div class="mc-field-group">
												<label for="mce-EMAIL">Email Address *</label>
												<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
											</div>
											<div class="mc-field-group">
												<label for="mce-FNAME">First Name</label>
												<input type="text" value="" name="FNAME" class="required" id="mce-FNAME">
											</div>
											<div class="mc-field-group">
												<label for="mce-LNAME">Last Name</label>
												<input type="text" value="" name="LNAME" class="required" id="mce-LNAME">
											</div>
											<div id="mce-responses" class="clear">
												<div class="response" id="mce-error-response" style="display:none"></div>
												<div class="response" id="mce-success-response" style="display:none"></div>
											</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
										    <div style="position: absolute; left: -5000px;"><input type="text" name="b_2717d4782e67bd897fbe8cf26_c2d5ad4e35" value=""></div>
											<div class="clear"><input type="submit" value="Join" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
										</form>
									</div><!--End mc_embed_signup-->

						    		<?php if ( isset($woo_options['woo_contact_subscribe_and_connect']) && $woo_options['woo_contact_subscribe_and_connect'] == 'true' ) { woo_subscribe_connect(); } ?>
						    	
						    	</div>

						    	<hr class="contact-separator" />

						    	<?php the_content(); ?>
						    	
						    </div><!-- /.location-twitter -->
	                        
                        </section>
                        
                        <?php if ( isset($woo_options['woo_contactform_map_coords']) && $woo_options['woo_contactform_map_coords'] != '' ) { $geocoords = $woo_options['woo_contactform_map_coords']; }  else { $geocoords = ''; } ?>
                		<?php if ($geocoords != '') { ?>
                		<?php woo_maps_contact_output("geocoords=$geocoords"); ?>
                		<?php echo do_shortcode( '[hr]' ); ?>
                		<?php } ?>

                    <?php
                    		} // End WHILE Loop
                    	}
                    }
                    ?>

            </article><!-- /#contact-page -->
		</section><!-- /#main -->
		
		<?php woo_main_after(); ?>

        <?php get_sidebar(); ?>

    </div><!-- /#content -->

<?php get_footer(); ?>