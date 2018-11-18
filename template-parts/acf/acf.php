<?php
add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
        // Code Block
		acf_register_block(array(
			'name'				=> 'codeblock',
			'title'				=> __('Code Block'),
			'description'		=> __('Custom code block.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'codeblock', 'quote' ),
		));
	}
}

function my_acf_block_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/block" folder
	if( file_exists(STYLESHEETPATH . "/template-parts/acf/blocks/block-{$slug}.php") ) {
		include( STYLESHEETPATH . "/template-parts/acf/blocks/block-{$slug}.php" );
	}
}
?>