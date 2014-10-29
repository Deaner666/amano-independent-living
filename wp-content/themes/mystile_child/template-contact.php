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

						    	<?php the_content(); ?>

						    	<div class="contact-social<?php if ( ( isset( $woo_options['woo_contact_panel'] ) && $woo_options['woo_contact_panel'] == 'true' ) && ( ( isset( $woo_options['woo_contact_twitter'] ) && $woo_options['woo_contact_twitter'] != '' ) || ( isset($woo_options['woo_contact_subscribe_and_connect']) && $woo_options['woo_contact_subscribe_and_connect'] == 'true' ) ) ) { ?> col-right<?php } ?>">
						    
						    		<?php if ( isset($woo_options['woo_contact_subscribe_and_connect']) && $woo_options['woo_contact_subscribe_and_connect'] == 'true' ) { woo_subscribe_connect(); } ?>
						    	
						    	</div>
						    	
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