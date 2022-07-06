<?php
/**
 * All block fields are editable when this plugin is active
 */
add_filter( 'tangible_template_editor_tab_editable', function( $is_editable, $tab, $post ) {
  if ( $post->post_type !== 'tangible_block' ) return $is_editable;
  return true;
}, 10, 3 );
