<?php
/**
 * The template for displaying all single posts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="post-header-holder"
	<?php if ( has_post_thumbnail() ) { ?> style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>);" <?php } ?> >
	<div class="container">
		<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		</header><!-- .entry-header -->
	</div>
</div><!-- .page-header-holder -->

<div class="post-header-metadata">
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<i class="fa fa-calendar"></i>Post Date: <?php echo get_the_date( 'd.m.Y' ); ?>
			</div>
			<div class="col-lg-6">
			<i class="fa fa-bars"></i>Post Category: <?php echo get_the_category()[0]->cat_name; ?>
			</div>
		</div>
	
	</div>
</div><!-- .post-header-metadata -->


<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">


			<div class="col-lg-7">
			<main class="site-main" id="main">

				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'single' );

				}
				?>
			</main><!-- #main -->
			</div><!-- col-lg-7 -->


			<div class="offset-lg-1 col-lg-4">
				<div class="right-sidebar-blog-categories">
					<h3>Blog Categories</h3>
					<ul>
					<?php
						$categories = get_categories();
						foreach($categories as $category) {
							echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
						}
					?>
					</ul>
				</div><!-- right-sidebar-blog-categories -->
		</div> <!-- "offset-lg-1 col-lg-4 -->

		</div><!-- .row -->

		<div class="post-navigation-options">
			<?php understrap_post_nav(); ?>
		</div>

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
