<?php

function get_sub_area_restaurants($meta_querys) {	

	$post_type = 'restaurants';
	$args = [
	    'posts_per_page' => -1,
	    'post_type' => $post_type,
	    'post_status' => 'publish',
	    'meta_query' => [ 
	    	'relation' => 'AND' ,
	    ] , 
	];

	foreach ($meta_querys as $$meta_query) {
		$args['meta_query'][] = $$meta_query;
	}	

    $res_query = new WP_Query( $args );
    $restaurants = $res_query->posts;

    return $restaurants;
}


function get_sub_area_field($value, $sub_fields) {
	
	foreach ($sub_fields as $field_i => $field) {

		if( $field['conditional_logic'] ) {

			// Loop over groups
			foreach( $field['conditional_logic'] as $group_i => $group ) {
				
				// Loop over rules
				foreach( $group as $rule_i => $rule ) {

					if ($value == $rule['value']) {
						$restaurants_field = $field;
					}
				}
			}
		}
	}
	$restaurants_field = $restaurants_field?:false;
	
    return $restaurants_field;
}

function add_acf_columns ( $columns ) {
   return array_merge ( $columns, array ( 
     'chiiki' => __ ( '地域' ),
     'todofuken'   => __ ( '都道府県' ) ,
     'eria'   => __ ( 'エリア' ) ,
     'genre'   => __ ( 'ジャンル' ) 
   ) );
}
add_filter ( 'manage_restaurants_posts_columns', 'add_acf_columns' );

function restaurants_custom_column ( $column, $post_id ) {
	$area = get_every_area_value($post_id);
	switch ( $column ) {
		case 'chiiki':
			echo $area['chiiki'];
			break;
		case 'todofuken':
			echo $area['todofuken'];
			break;
		case 'eria':
			echo $area['eria'];
			break;
		case 'genre':
			echo get_post_meta ( $post_id, 'genre', true );
			break;
	}
}
add_action ( 'manage_restaurants_posts_custom_column', 'restaurants_custom_column', 10, 2 );
