<?php

//Disable Gutenberg
add_filter('use_block_editor_for_post', '__return_false', 10);

function the_post_summary($length = 128, $string = ""){
	if($string){
		$content = $string;
	} else {
		$content = wp_strip_all_tags( get_the_content() );
	}
	if (strlen($content) > $length) {
		$content = substr($content, 0, $length) . '...';
	}
	echo $content;
}

