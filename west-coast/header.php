<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="site" id="page">

		<!-- ******************* The Navbar Area ******************* -->
		<div id="wrapper-navbar">

		<div class="top-header">
				<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-5 col-md-6">
						<div class="mobile-holder-logo">
							<a href="/">
								<img src="<?php echo get_template_directory_uri(); ?>/src/img/header/logo.png" alt="Logo">
							</a>
						</div>
					</div>
					<div class="col-lg-7 col-md-6">
						<div class="top-header-contact">
							<a href="tel:098 8888888" class="button-class"><i class="fa fa-phone"></i>098 8888888</a>
							<a href="mailto:info@gmail.com" class="top-header-contact-email button-class"><i class="fa fa-envelope-o"></i>info@gmail.com</a>
							<div class="mobile-menu-dropdown">
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
								<span>Menu<i class="fa fa-abrs navbar-toggler-icon"></i></span>
								<!-- <span class="navbar-toggler-icon"></span> -->
							</button>					
						</div>							
						</div> <!-- top-header-contact -->
					</div> <!-- col-lg-7 -->
				</div>	<!-- row -->				
				</div> <!-- container -->

			</div> <!-- top-header -->
			<nav id="main-nav" class="navbar navbar-expand-xl navbar-dark" aria-labelledby="main-nav-label">

				<div class="container">

				<div class="search-input-holder">
						<div class="title">Quote</div>
							<input type="text" id="header-product-autocomplete-input" onKeyUp="headerProductKeyup(this)" onChange="singleProductKeyup(this)" placeholder="Type your suburb here"/>
						<ul id="header-product-autocomplete-list">
					</ul>						
				</div> <!-- search-input-holder -->
				
				<div class="mobile-menu-dropdown">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
						<span>Menu<i class="fa fa-abrs navbar-toggler-icon"></i></span>
						<!-- <span class="navbar-toggler-icon"></span> -->
					</button>					
				</div>

					<!-- The WordPress Menu goes here -->
					<?php
					wp_nav_menu([
						'menu' 	=>	'Primary Menu',
						'theme_location'	=>	'Primary Menu',
						'container'	=>	'div',
						'container_id'	=> 'navbarNavDropdown',
						'container_class'	=> 'collapse navbar-collapse',
						'menu_id'	=> 'main-menu',
						'menu_class' => 'navbar-nav ml-auto',
						'depth'	=>	3,
						'fallback_cb'	=> 'bs4navwalker::fallback',
						'walker'	=> new bs4navwalker()
					]);
					?>

				</div><!-- .container -->


			</nav><!-- .site-navigation -->

		</div><!-- #wrapper-navbar end -->

		<div id="quick-select-bins">
		 <div class="container">
			 <div class="row align-items-center">
				 <div class="col-lg-7">

				 <div class="steps">
					<div class="step one active">
						<div class="title">
							<div class="title-icon">
							<i class="fa fa-arrow-circle-up"></i>
							</div>
						
							Step 1: <strong>Suburb Selected</strong>
						</div>			
						<div class="icon">
							<i class="fa fa-check-circle"></i>
						</div>
					</div> <!-- step one -->

					<div class="step two">
						<div class="title">
							<div class="title-icon">
								<i class="fa fa-arrow-circle-down"></i>
							</div>
							Step 2: <strong>Select the skip that suits your needs</strong>
						</div>			
						<div class="icon">
							<i class="fa fa-check-circle"></i>
						</div>
					</div> <!-- step two -->

				</div> <!-- steps -->

				</div> <!-- col-lg-7 -->

				 <div class="offset-lg-1 col-lg-4">
						<div class="price-info">
							All prices reflect the price you will pay to hire a skip-bin from West Coast Waste for 7 days, delivered to your door.
						</div>
				 </div><!-- col-lg-4 -->
			 </div> <!-- row -->

			<div class="quick-select-all-bins">
			<div class="row">
<!--Custom cart start-->
<?php global $woocommerce; ?>
                <a class="your-class-name" style="display:block;z-index:999;color: yellow;" href="<?php echo $woocommerce->cart->get_cart_url(); ?>"
                   title="<?php _e('Cart View', 'woothemes'); ?>">
                    <?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'),
                    $woocommerce->cart->cart_contents_count);?>  -
                    <?php echo $woocommerce->cart->get_cart_total(); ?>
                </a>
                <!--Custom cart end-->				
					<?php
						$args = array(
							'post_type' => 'product',
							'orderby' => 'title',
							'order' => 'ASC',
							'product_cat' => 'Bin',
							'posts_per_page' => 4
						);
						$index = 0;
						$loop = new WP_Query( $args );
						while ($loop->have_posts() ) : $loop->the_post(); 
						global $product;
						$index++;
						$variation_html = "";

						if ( $product->is_type( 'variable' ) ) {
								$available_variations = $product->get_available_variations();
								foreach ($available_variations as $variations) {
									$attribute_depo = $variations['attributes']['attribute_depo'];
									$attribute_distance = $variations['attributes']['attribute_distance'];
									$price_html = $variations['price_html'];
									$variation_html .= "<div
											class='depo-price'
											data-productid='$product->id' 
											data-depo='$attribute_depo'
											data-distance='$attribute_distance' >";
											$variation_html .= $price_html;
											$variation_html .= "</div>";
								}
						}
					?>

					<div class="col-lg-3">
						<a 
							href="" 
							class="quick-select-bin" 
							onClick="headerProductToCart(this);" 
							data-productid="<?php echo $product->id; ?>"
							data-distance=""
							data-depo=""
							>
							<div class="title">
								<?php the_title(); ?>
							</div>
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(
									$loop->post->ID), 'medium' ); ?>
							<img src="<?php echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>" alt="<?php the_field('full_title'); ?>">									
							<div class="price">
								<!--?php echo $product->get_price_html(); ?-->
								<?php echo $variation_html; ?>
							</div>
							<div class="hire">
								Up to 7 Day Hire inc. GST
							</div>
							<div class="meta-info">
								<div class="info">
									<div>
									<img src="<?php echo get_template_directory_uri(); ?>/src/img/front-page/home-trailer.svg" class="home-trailer" alt="" width="100%">										
									</div>
									x <?php the_field('approx_trailer'); ?>
								</div>
								<div class="spacer"></div>
								<div class="info">
									<div >
									<img src="<?php echo get_template_directory_uri(); ?>/src/img/front-page/home-bin.svg" class="home-trailer" alt="" width="66%">										
									</div>
									x <?php the_field('approx_bin'); ?>
								</div>								
							</div> <!-- meta-info -->
							<div class="quick-button">
								Order this skip bin
							</div><!-- quick-button -->
						</a> <!-- quick-select-bin -->
					</div> <!-- col-lg-3 -->

				<?php endwhile; ?>
				<?php wp_reset_query(); ?>

			</div> <!-- row -->
			</div> <!-- quick-select-all-bins -->

		 </div> <!-- container -->

		</div> <!-- quick-select-bin -->

