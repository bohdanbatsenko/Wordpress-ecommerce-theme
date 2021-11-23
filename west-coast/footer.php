<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="home-we-accept">
		<div class="container">
			<div class="title-holder">
				<h2>We accept the following waste</h2>
				<div class="button-holder top">
					<a href="" class="button button-class outline">wewee</a>
				</div>
			</div><!-- title-holder -->
			<div class="row">

				<div class="col-lg-3 col-sm-6">
					<div class="circle">
							<img src="<?php echo get_template_directory_uri(); ?>/src/img/front-page/home-we-accept-1.svg" alt="" width="100%">
						<div class="title">Commercial Waste</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="circle">
							<img src="<?php echo get_template_directory_uri(); ?>/src/img/front-page/home-we-accept-2.svg" alt="" width="100%">
						<div class="title">Commercial Waste</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="circle">
							<img src="<?php echo get_template_directory_uri(); ?>/src/img/front-page/home-we-accept-3.svg" alt="" width="100%">
						<div class="title">Commercial Waste</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="circle">
							<img src="<?php echo get_template_directory_uri(); ?>/src/img/front-page/home-we-accept-4.svg" alt="" width="100%">
						<div class="title">Commercial Waste</div>
					</div>
				</div>


			</div><!-- row -->

			<div class="button-holder bottom">
					<a href="" class="button button-class outline">wewee</a>
				</div>			
		</div> <!-- container -->
	</div><!-- home-we-accept -->


<div class="wrapper" id="wrapper-footer">

	<div class="footer-testimonial">
		<div class="container">
			<div class="testimonial">
				<div class="stars">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</div>
				<div class="quote">
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere corporis deserunt doloremque, sint commodi magnam inventore expedita atque quos illo ipsum recusandae quisquam et amet numquam! Ut id, voluptatem velit quas molestiae exercitationem modi! Tempora ex excepturi ratione laudantium				
				</div>
				<div class="author">Lorem, ipsum dolor.</div>
			</div><!-- testimonial -->
		</div><!-- container -->
	</div><!-- footer-testimonial -->

	<div class="container">
		<div class="footer-contact-info">
			<div class="row">
				<div class="col-lg-6">
					<div class="title">Want to know more?</div>
					<div class="desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus facere cum voluptate. Magnam eum rem reiciendis iure amet atque ut.</div>
					<div class="contact-info">
						<div class="phone"><i class="fa fa-phone"></i>345345234535</div>
						<div class="email"><i class="fa fa-envelope-o"></i>dsfsdf@gmail.com</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="contact-form-holder">
						<?php echo do_shortcode('[contact-form-7 id="21" title="Footer Contact Form"]') ?>
					</div>
				</div>
			</div><!-- row -->
		</div><!-- footer-contact-info -->
	</div><!-- container -->

	<div class="copyright">
		<div class="container">
			Copyright West Coast Waste 2020 <span>//</span>  <a href="">Terms & Conditions</a> <span>//</span>  <a href="">Website by</a>
		</div>
	</div>


</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

