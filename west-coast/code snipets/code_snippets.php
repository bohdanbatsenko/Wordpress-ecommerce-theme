<?php
						$orderby = 'name';
						$order = 'asc';
						$hide_empty = false;
						$cat_args = array(
							'orderby' => $orderby,
							'order' => $order,
							'hide_empty' => $hide_empty,
						);
						$product_categories = get_terms( 'product_cat', $cat_args );
						$separator = ' ';
						$output = '';
						$index = 0;
						if ( !empty( $product_categories) ) {
							foreach( $product_categories as $key => $category) {
								$index++;
								if( $category->name === "Uncategorised"){
									break;
								}
								$output .= '<div class="col-sm-3"><a href="' esc_url( get_category_link(	$category->term_id) ) . '" class="wow fadeIn" data-wow-delay="0. '.$index * 0.5.'s">'.esc_html( $category->name ).'</a>
								</div>' . $separator;
							}
							echo trim($output, $separator );
						}
					
					
					?>