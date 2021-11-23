<?php
/**
 * Template Name: Template Home
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>



<div class="home-hero-banner-top">
	<div class="container">





		<div class="row align-items-end">
			<div class="col-lg-8 col-xl-7">
				<div class="skip-bin-info-holder">
					<div class="overlay-image-arrow">
						<img src="<?php echo get_template_directory_uri(); ?>/src/img/header/arrow.svg" alt="">
					</div>
					<div class="title">
						<i class="fa fa-arrow-circle-o-up"></i>Skip Bin instant quote
					</div>
					<div class="desc">
						Simply type your suburb and you will be provided with an instant
					</div>
				</div>
			</div>
			<div class="col-lg-4 offset-xl-1">
				<div class="seven-days-skip-info">
					<img src="<?php echo get_template_directory_uri(); ?>/src/img/header/home-hero-right.svg" class="img-fluid" width="100%" alt="">					
					<div class="title">7-Day skip bin hire direct to your home covering Perth to Albany</div>
				</div>
			</div>
		</div><!-- row -->

		<div class="home-hero-slider">
			<div class="slider">
				<div class="slider-wrapper">
					<div class="slide">
						<div class="image">

						</div>
						<div class="entry-content">
							<div class="icon">
								<img src="<?php echo get_template_directory_uri(); ?>/src/img/front-page/home-slider-truck.svg" class="img-fluid" alt="">
							</div>
							<div class="info">
								We deliver the right skip bin for your residential and commercial projects.
							</div>
							<div class="slider-nav">
								<a href=""><i class="fa fa-arrow-circle-o-left"></i></a>
								<a href=""><i class="fa fa-arrow-circle-o-right"></i></a>
							</div>
						</div>
					</div><!-- slide -->
				</div><!-- slider-wrapper -->
			</div><!-- slider -->
		</div><!-- home-hero-slider -->
	</div><!-- container -->

	</div><!-- home-hero-banner-top -->



<div class="home-product-info">
	<div class="home-special-offer-background-overlay">
		<div class="container">
			<div class="home-special-offer">
				<div class="discount-circle">
					<div class="abs-holder">
						<div class="save">Save</div>
						<div class="percent">20%</div>						
					</div>
				</div><!-- discount-circle -->
				<div class="entry-content">
					<div class="title">15 Day Storm Special on 9m3 Slip Bins</div>
					<div class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae cupiditate, illum repudiandae maxime tempora reiciendis itaque at, hic placeat necessitatibus ab </div>
					<a href="" class="button button-class">Find out more</a>
				</div><!-- entry-content -->
			</div><!-- home-special-offer -->		
		</div><!-- container -->		
	</div><!-- background-overlay -->



	<div class="home-products-holder">
		<div class="container">
			<h2><i class="fa fa-arrow-circle-o-down"></i>Select the right skip bin for your project</h2>
			<div class="home-products">

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
				while ($loop->have_posts() ) : $loop->the_post(); global $product;
				$index++;
			?>

				<div class="home-product">
					<div class="row">
						<div class="col-xl-4 col-md-6">

					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(
						$loop->post->ID), 'medium' ); ?>
							<a href="<?php the_permalink(); ?>">
						<img src="<?php echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>" alt="<?php the_field('full_title'); ?>">
						</a>
							<!-- <img src="<?php echo get_template_directory_uri(); ?>/src/img/front-page/product-placeholder.jpg" width="100%" alt=""> -->
						</div>
						<div class="col-xl-4 col-md-6">
						<a href="<?php the_permalink(); ?>" class="title black"><?php the_field('full_title'); ?></a>
							<?php the_excerpt(); ?>
							<!-- <ul>
								<li>Item 1 Lorem ipsum dolor sit.</li>
								<li>Item 2 Lorem ipsum dolor sit.</li>
								<li>Item 3 Lorem ipsum dolor sit.</li>
								<li>Item 4 Lorem ipsum dolor sit.</li>
							</ul> -->
						</div>
						<div class="col-xl-4 col-lg-12">
							<div class="home-product-circles">
								<div class="row">
									<div class="offset-lg-3 offset-xl-0 offset-md-2 col-xl-6 col-lg-3 col-md-4 col-sm-6 col-6">
										<div class="circle">
											<div class="abs-circle-holder">
												<div class="content-holder">
													Approx x <?php the_field('approx_trailer'); ?> trailers
												</div>
												<div class="icon">

														<img src="<?php echo get_template_directory_uri(); ?>/src/img/front-page/home-trailer.svg" class="home-trailer" alt="">														

												</div>												
											</div><!-- abs-circle-holder -->	
										</div><!-- circle -->											
									</div><!-- col-lg-6 -->	
									<div class="col-xl-6 col-lg-3 col-md-4 col-sm-6 col-6 ">
										<div class="circle">
											<div class="abs-circle-holder">
												<div class="content-holder">
													Approx x <?php the_field('approx_bin'); ?> wheelie bins
												</div>
												<div class="icon">
													<img src="<?php echo get_template_directory_uri(); ?>/src/img/front-page/home-bin.svg" class="home-bin" alt="">
												</div>												
											</div><!-- abs-circle-holder -->	
										</div><!-- circle -->											
									</div><!-- col-lg-6 -->	
								</div><!-- row -->	
							</div><!-- home-product-circles -->
						</div>
					</div><!-- row -->
					
					<a href="<?php the_permalink(); ?>" class="abs-holder-button">Get a quote for this skip bin</a>
				</div><!-- home-product -->

			
			
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>

			<div class="home-product hidden d-none">
					<div class="row">
						<div class="col-xl-4 col-md-6">
							<img src="<?php echo get_template_directory_uri(); ?>/src/img/front-page/product-placeholder.jpg" width="100%" alt="">
						</div>
						<div class="col-xl-4 col-md-6">
							<div class="title">4 Cubic Metre Skip</div>
							<ul>
								<li>Item 1 Lorem ipsum dolor sit.</li>
								<li>Item 2 Lorem ipsum dolor sit.</li>
								<li>Item 3 Lorem ipsum dolor sit.</li>
								<li>Item 4 Lorem ipsum dolor sit.</li>
							</ul>
						</div>
						<div class="col-xl-4 col-lg-12">
							<div class="home-product-circles">
								<div class="row">
									<div class="offset-lg-3 offset-xl-0 offset-md-2 col-xl-6 col-lg-3 col-md-4 col-sm-6 col-6">
										<div class="circle">
											<div class="abs-circle-holder">
												<div class="content-holder">
													Approx x 4 trailers
												</div>
												<div class="icon">
														<img src="<?php echo get_template_directory_uri(); ?>/src/img/front-page/home-trailer.svg" class="home-trailer" alt="">
												</div>												
											</div><!-- abs-circle-holder -->	
										</div><!-- circle -->											
									</div><!-- col-lg-6 -->	
									<div class="col-xl-6 col-lg-3 col-md-4 col-sm-6 col-6 ">
										<div class="circle">
											<div class="abs-circle-holder">
												<div class="content-holder">
													Approx x 16 wheelie bins
												</div>
												<div class="icon">
													<img src="<?php echo get_template_directory_uri(); ?>/src/img/front-page/home-bin.svg" class="home-bin" alt="">
												</div>												
											</div><!-- abs-circle-holder -->	
										</div><!-- circle -->											
									</div><!-- col-lg-6 -->	
								</div><!-- row -->	
							</div><!-- home-product-circles -->
						</div>
					</div><!-- row -->
					<div class="abs-holder-button">Get a quote for this skip bin</div>
				</div><!-- home-product -->

	

			</div><!-- home-products -->
		</div><!-- container -->
	</div> <!-- home-products-holder -->




</div><!-- home-product-info -->







<?php
get_footer();
