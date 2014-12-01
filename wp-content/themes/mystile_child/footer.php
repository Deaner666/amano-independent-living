<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Footer Template
 *
 * Here we setup all logic and XHTML that is required for the footer section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
	global $woo_options;
	
	echo '<div class="footer-wrap">';

	$total = 4;
	if ( isset( $woo_options['woo_footer_sidebars'] ) && ( $woo_options['woo_footer_sidebars'] != '' ) ) {
		$total = $woo_options['woo_footer_sidebars'];
	}

	if ( ( woo_active_sidebar( 'footer-1' ) ||
		   woo_active_sidebar( 'footer-2' ) ||
		   woo_active_sidebar( 'footer-3' ) ||
		   woo_active_sidebar( 'footer-4' ) ) && $total > 0 ) {

?>
	<?php woo_footer_before(); ?>
	
		<!-- Extra row for legal links -->
		<section id="footer-legal-links" class="col-full">
			<?php if ( is_active_sidebar( 'footer_legals_1' ) ) { dynamic_sidebar( 'footer_legals_1' ); } ?>
		</section>
		<section id="footer-widgets" class="col-full col-<?php echo $total; ?> fix">
			
			<div id="social-icons">
				<ul class="social-buttons">
					<li class="twitter"><a href="https://twitter.com/amanoconnect">Twitter</a></li>
					<li class="facebook"><a href="https://www.facebook.com/amanoconnect">Facebook</a></li>
					<li class="google-plus"><a href="https://plus.google.com/+Amanoconnect">Google+</a></li>
					<li class="youtube"><a href="https://www.youtube.com/channel/UCfN9j_--o8IMDI4dIbAvkQg">Youtube</a></li>
					<li class="pinterest"><a href="http://www.pinterest.com/amanoconnect/">Pinterest</a></li>
					<li class="linkedin"><a href="https://www.linkedin.com/company/amano-connect">LinkedIn</a></li>
				</ul>
			</div>

			<?php $i = 0; while ( $i < $total ) { $i++; ?>
				<?php if ( woo_active_sidebar( 'footer-' . $i ) ) { ?>
	
			<div class="block footer-widget-<?php echo $i; ?>">
	        	<?php woo_sidebar( 'footer-' . $i ); ?>
			</div>
	
		        <?php } ?>
			<?php } // End WHILE Loop ?>
	
		</section><!-- /#footer-widgets  -->
	<?php } // End IF Statement ?>
		<footer id="footer" class="col-full">
	
			<div id="copyright" class="col-left">
			<?php if( isset( $woo_options['woo_footer_left'] ) && $woo_options['woo_footer_left'] == 'true' ) {
	
					echo stripslashes( $woo_options['woo_footer_left_text'] );
	
			} else { ?>
				<p><?php bloginfo(); ?> &copy; <?php echo date( 'Y' ); ?>. <?php _e( 'All Rights Reserved.', 'woothemes' ); ?></p>
			<?php } ?>
			</div>
	
			<div id="credit" class="col-right">
	        <?php if( isset( $woo_options['woo_footer_right'] ) && $woo_options['woo_footer_right'] == 'true' ) {
	
	        	echo stripslashes( $woo_options['woo_footer_right_text'] );
	
			} else { ?>
				<div class="footer-logo">
					Local authority approved - <a href="http://www.supportwithconfidence.gov.uk">Support with Confidence</a>
					<a href="http://www.supportwithconfidence.gov.uk">
						<img src="/wp-content/themes/mystile_child/images/layout/support-with-confidence.jpg" alt="The Support with Confidence Logo" width="149" />
					</a>
				</div>
				<div class="footer-logo">
					A member of the <a href="http://www.telecare.org.uk">Telecare Services Association</a>
					<a href="http://www.telecare.org.uk">
						<img src="/wp-content/themes/mystile_child/images/layout/TSA.jpg" alt="The Telecare Services Association Logo" width="85" />
					</a>
				</div>
			<?php } ?>
			</div>
	
		</footer><!-- /#footer  -->
	
	</div><!-- / footer-wrap -->

</div><!-- /#wrapper -->
<?php wp_footer(); ?>
<?php woo_foot(); ?>
</body>
</html>