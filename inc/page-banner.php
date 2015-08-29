<?php

/**
 * Prints the page banner
 */
function get_page_banner(array $options = array())
{
	$options += array('height' => '300px;'); // TODO: Create setting for height
    // If there is a featured image attached to the page display along with banner
    if (has_post_thumbnail()) {
        printf('<div class="customwebsite-page-banner" style="%1$s">&nbsp;</div>',
			$options['height'] ? 'height:' . $options['height'] . ';' : ''
		);
        add_banner_image_styles();
    }
}

/**
 * Adds the images attached to the page and limits their display to the screen size
 **/
function add_banner_image_styles() {
    // Create a css background style for each of the attached images
	$postId = get_the_ID();
    $images = get_attached_media('image', $postId);
    if (!is_array($images)) {
		return;
	}
	$isDefault = true;
	// The ordering of the style blocks determines if the smaller screen size will be used
	$imagesSorted = array();
	$largestWidth = 0;
	foreach ($images as $idx => $image) {
		if (!($image instanceof WP_Post)) {
			continue;
		}   
		$imageProperties = wp_get_attachment_image_src($image->ID, 'full');
		if (is_array($imageProperties) && (count($imageProperties) == 4)) {
			$image->properties = $imageProperties;
			$imageWidth = $imageProperties[1];
			$imagesSorted[$imageWidth] = $image;
			// Compare this images width with the largest width found
			if ($imageWidth > $largestWidth) {
				$largestWidth = $imageWidth + 1;
			}   
		}   
	}   
	// Hide the image banner if the screen size is too large
	printf('<style text="text/css" media="screen and (min-width:%1$spx)">%2$s</style>',
		$largestWidth,
		'.customwebsite-page-banner {display:none;}'
	);
	krsort($imagesSorted);
	foreach ($imagesSorted as $key => $image) {
		$url = $image->properties[0];
		$width = $image->properties[1];
		printf('<style text="text/css" media="screen and (max-width:%1$spx)">%2$s</style>',
			$width,
			' .customwebsite-page-banner {background: url( "' . $url . '" ) no-repeat center center;}'
		);
	}
}
