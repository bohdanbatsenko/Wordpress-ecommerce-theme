<?php
/**
 * Template Name: Template Contact
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}
?>

<div class="page-header-holder">
	<div class="container">
		<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		</header><!-- .entry-header -->
	</div>
</div><!-- .page-header-holder -->


<div class="wrapper template-contact-us" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

		<div class="col-lg-6">
				<main class="site-main" id="main" role="main">

					<?php
					while ( have_posts() ) {
						the_post();
						get_template_part( 'loop-templates/content', 'page' );

					}
					?>

					</main><!-- #main -->

			</div><!-- col-lg-7 -->

			<div class="offset-lg-1 col-lg-5">
				<div class="iframe-holder">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d53324.47199202233!2d115.68980800000001!3d-33.35071!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc8e04c2e2e970369!2sWest%20Coast%20Waste!5e0!3m2!1sen!2sau!4v1594920941653!5m2!1sen!2sau" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
				<div class="iframe-holder">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d53324.47199202233!2d115.68980800000001!3d-33.35071!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc8e04c2e2e970369!2sWest%20Coast%20Waste!5e0!3m2!1sen!2sau!4v1594920941653!5m2!1sen!2sau" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
				<div class="iframe-holder">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d53324.47199202233!2d115.68980800000001!3d-33.35071!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc8e04c2e2e970369!2sWest%20Coast%20Waste!5e0!3m2!1sen!2sau!4v1594920941653!5m2!1sen!2sau" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div> <!-- "offset-lg-1 col-lg-4 -->


		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
