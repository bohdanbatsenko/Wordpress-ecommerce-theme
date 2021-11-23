<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'understrap' ) ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="row" id="customer_details">
			<div class="col-12 col-md-6">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>

			<div class="col-12 col-md-6">
				<h3 id="order_review_heading"><?php esc_html_e( 'Cart summary', 'understrap' ); ?></h3>

				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

				<div id="order_review" class="woocommerce-checkout-review-order">
				<?php do_action( 'woocommerce_checkout_order_review' ); ?>
			</div>	
			
			<div class="woocommerce-checkout-acceptable-waste">
				<h3>Acceptable waste</h3>
				<p>Owing to environmental obligations, we can only accept certain waste products in our skip bins. The following is what can and cannot be accepted. Please call 1800 927 831 for further assistance or enquires.</p>
				<ul>
					<li><i class="fa fa-check-circle"></i>Sand</li>
					<li><i class="fa fa-check-circle"></i>Rubble</li>
					<li><i class="fa fa-check-circle"></i>Timber</li>
					<li><i class="fa fa-check-circle"></i>Plastics</li>
					<li><i class="fa fa-check-circle"></i>Bricks</li>
				</ul>
				<ul>
					<li><i class="fa fa-check-circle"></i>Cardboard</li>
					<li><i class="fa fa-check-circle"></i>Paper</li>
					<li><i class="fa fa-check-circle"></i>Steel</li>
					<li><i class="fa fa-check-circle"></i>Furniture</li>
					<li><i class="fa fa-check-circle"></i>Green Waste</li>
				</ul>				
				<ul class="not-allowed">
					<li><i class="fa fa-check-circle"></i>Batteries</li>
					<li><i class="fa fa-check-circle"></i>Motor Vehicle Tyres</li>
					<li><i class="fa fa-check-circle"></i>Liquid Waste</li>
					<li><i class="fa fa-check-circle"></i>Food Waste</li>
					<li><i class="fa fa-check-circle"></i>Asbestos</li>
					<li><i class="fa fa-check-circle"></i>Handle Products</li>
				</ul>				
			</div><!-- woocommerce-checkout-acceptable-waste -->						
			</div>

		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>



	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<?php
do_action( 'woocommerce_after_checkout_form', $checkout );
