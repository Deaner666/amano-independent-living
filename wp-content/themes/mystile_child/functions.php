<?php

	// Enqueue scripts and styles
	add_action( 'wp_enqueue_scripts', 'mtd_scripts_styles' );
	function mtd_scripts_styles() {

		// wp_enqueue_style( 'dashicons' );
		wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic', array() );
		wp_enqueue_style( 'animate', get_bloginfo( 'stylesheet_directory' ) . '/css/animate.css', array() );
		wp_enqueue_script( 'jquery-cookie', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.cookie.js', array('jquery'), '', true );
		wp_enqueue_script( 'jquery-text-resizer', get_bloginfo( 'stylesheet_directory' ) . '/js/jquery.textresizer.js', array('jquery-cookie'), '1.0', true );
		wp_enqueue_script( 'wow', get_bloginfo( 'stylesheet_directory' ) . '/js/wow.min.js' );
		wp_enqueue_script( 'site', get_bloginfo( 'stylesheet_directory' ) . '/js/site.js' );
		wp_dequeue_script( 'general' );

	}

	add_action( 'wp_print_scripts', 'mtd_dequeue_scripts', 100 );
	function mtd_dequeue_scripts() {
	   wp_dequeue_script( 'general' ); // Scripts copied to our own site.js
	}

	add_shortcode( 'best_selling_products_by_cat', 'best_selling_products_by_cat' );
	/**
	 * List best selling products from a given category slug
	 *
	 * @access public
	 * @param array $atts
	 * @return string
	 */
	function best_selling_products_by_cat( $atts ){
	    global $woocommerce_loop;

	    extract( shortcode_atts( array(
	        'per_page'      => '12',
	        'columns'       => '4',
	        'category'		=> ''
	        ), $atts ) );

	    if ( ! $category ) return;

	    $args = array(
	        'post_type' => 'product',
	        'post_status' => 'publish',
	        'ignore_sticky_posts'   => 1,
	        'posts_per_page' => $per_page,
	        'meta_key' 		 => 'total_sales',
	    	'orderby' 		 => 'meta_value_num',
	        'meta_query' => array(
	            array(
	                'key' => '_visibility',
	                'value' => array( 'catalog', 'visible' ),
	                'compare' => 'IN'
	            )
	        ),
	        'tax_query' 			=> array(
		    	array(
			    	'taxonomy' 		=> 'product_cat',
					'terms' 		=> array( esc_attr($category) ),
					'field' 		=> 'slug',
					'operator' 		=> 'IN'
				)
		    )
	    );

	  	ob_start();

		$products = new WP_Query( $args );

		$woocommerce_loop['columns'] = $columns;

		if ( $products->have_posts() ) : ?>

			<?php woocommerce_product_loop_start(); ?>

				<?php while ( $products->have_posts() ) : $products->the_post(); ?>

					<?php woocommerce_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

		<?php endif;

		wp_reset_postdata();

		return '<div class="woocommerce">' . ob_get_clean() . '</div>';
	}

	/*
	 * wc_remove_related_products
	 * 
	 * Clear the query arguments for related products so none show.
	 * Add this code to your theme functions.php file.  
	 */
	// add_filter('woocommerce_related_products_args','wc_remove_related_products', 10);

	// function wc_remove_related_products( $args ) {
	// 	return array();
	// }


	add_action( 'mtd_after_entry', 'mtd_post_signup_form' );
	function mtd_post_signup_form() {
		?>
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
		<?php
	}


	/*
	 *  
	 * Register a new widget area for a legal links menu at top of footer
	 * 
	 */

	add_action( 'widgets_init', 'mtd_footer_legal_links_area' );
	function mtd_footer_legal_links_area() {

		register_sidebar( array(
			'name' => 'Footer legal links',
			'id' => 'footer_legals_1',
			'before_widget' => '<ul class="footer-legal-links menu">',
			'after_widget' => '</ul>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		) );
	}

	add_filter( 'woocommerce_subscriptions_product_price_string', 'mtd_subscription_variation_price_format', 10, 2 );
	add_filter( 'woocommerce_subscription_price_string', 'mtd_subscription_variation_price_format', 10, 2 );
	function mtd_subscription_variation_price_format($subscription_string, $product) {
		// if ( $product->id == 162 ) {
			$updated_string = str_replace('sign-up fee', 'up front', $subscription_string);
			$updated_string = str_replace('and a', 'and', $updated_string);
		// }
		return $updated_string;
	}

	// add_filter( 'woocommerce_subscriptions_product_price_string_inclusions', 'mtd_subscription_variation_no_tax', 20, 3 );
	// function mtd_subscription_variation_no_tax($include, $product) {
	// 	$include['tax_calculation'] = true;
	// 	$include['subscription_price'] = true;
	// 	$include['subscription_period'] = true;
	// 	$include['subscription_length'] = true;
	// 	$include['sign_up_fee'] = true;
	// 	$include['trial_length'] = true;
	// 	return $include;
	// }

	// Move sharing buttons to the right place on the product page
	add_action( 'woocommerce_share', 'mtd_woocommerce_social_share_icons', 10 );
	function mtd_woocommerce_social_share_icons() {
	    if ( function_exists( 'sharing_display' ) ) {
	        remove_filter( 'the_content', 'sharing_display', 19 );
	        remove_filter( 'the_excerpt', 'sharing_display', 19 );
	        echo sharing_display();
	    }
	}