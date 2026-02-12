<?php
	// Sont appelé ici tous les composants ACF

	require get_template_directory() . '/templates/blocks/contact/block.php';
	require get_template_directory() . '/templates/blocks/picture/block.php';
	require get_template_directory() . '/templates/blocks/picturefull/block.php';
	require get_template_directory() . '/templates/blocks/text/block.php';
	require get_template_directory() . '/templates/blocks/textpicture/block.php';

	function allow_only_custom_blocks( $allowed_blocks, $editor_context ) {
		return array(
			'acf/contact',
			'acf/picture',
			'acf/picturefull',
			'acf/text',
			'acf/textpicture',
		);
	}
	add_filter( 'allowed_block_types_all', 'allow_only_custom_blocks', 10, 2 );


	/* ************************* */
	/* ADD NEW CATEGORIES INTO ACF BLOCK REGISTER */
	/* ************************* */
	function add_custom_block_categories($categories) {
		return array_merge(
			$categories,
			array(
				array(
					'slug'  => 'text',
					'title' => __('Texte'),
					'icon'  => null,
				),
			)
		);
	}
	add_filter('block_categories_all', 'add_custom_block_categories');
?>