<?php
/**
 * Created by PhpStorm.
 * User: tom
 * Date: 5/11/16
 * Time: 4:40 PM
 */

/**
 * HTML 5 caption for pictures
 *
 * @param	string	$empty
 * @param	array	$attr
 * @param	string	$content
 *
 * @return	string
 */
function the_ppau_img_caption_shortcode( $empty, $attr, $content ) {

	$attachment_meta = wp_prepare_attachment_for_js(intval(str_replace('attachment_', '', $attr["id"])));
    $description_is_url = filter_var($attachment_meta["description"], FILTER_VALIDATE_URL);

	extract( shortcode_atts( array(
		'id'		=>	'',
		'align'		=>	'alignnone',
		'width'		=>	'',
		'caption'	=>	''
	), $attr ) );

	if ( 1 > (int) $width OR empty( $caption ) ) {
		return $content;
	}

	if ( $id ) {
		$id = 'id="' . $id . '" ';
	}

	if (!empty($caption) && !empty($description_is_url) && strpos($caption, "CC-BY")){
		$link = '<a href="' . $attachment_meta["description"] . '">' . substr($caption, strpos($caption, "CC-BY"), strlen($caption)) . '</a>';
		$caption = substr_replace($caption, $link, strpos($caption, "CC-BY"));
	}

	return '<figure ' . $id . 'class="pir-card-image mdl-card mdl-shadow--2dp thumbnail ' . $align . '" style="width: ' . $width . 'px;">'
				. do_shortcode( str_replace( 'class="thumbnail', 'class="', $content ) )
				. '<figcaption class="mdl-card__actions pir-card-image__filename">' . $caption . '</figcaption>'
			. '</figure>';
}
add_filter( 'img_caption_shortcode', 'the_ppau_img_caption_shortcode', 10, 3 );