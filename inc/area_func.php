<?php

function get_every_area_value($post_id)
{
	$chiiki_group_key = 'field_5d389d45ffa88';
    $chiiki_group = acf_get_field( $chiiki_group_key ); 
    $chiiki_group_name = $chiiki_group['name'];

	$chiiki = get_post_meta ( $post_id, $chiiki_group_name, true );

	$todofuken_group_key = 'field_5d389d71ffa89';
    $todofuken_group = acf_get_field( $todofuken_group_key );  
    $todofuken_group_name = $todofuken_group['name']; 

    $todofuken_group_sub_fields = $todofuken_group['sub_fields'];

    $todofuken_sub_area_field = get_sub_area_field( $chiiki, $todofuken_group_sub_fields);

    $todofuken_sub_meta_key = $todofuken_group_name . '_' . $todofuken_sub_area_field['name'];

    $todofuken = get_post_meta ( $post_id, $todofuken_sub_meta_key, true );

    $eria_group_key = 'field_5d390edea5c40';
    $eria_group = acf_get_field( $eria_group_key );  
    $eria_group_name = $eria_group['name']; 

    $eria_group_sub_fields = $eria_group['sub_fields'];

    $eria_sub_area_field = get_sub_area_field( $todofuken, $eria_group_sub_fields);

    $eria_sub_meta_key = $eria_group_name . '_' . $eria_sub_area_field['name'];

    $eria = get_post_meta ( $post_id, $eria_sub_meta_key, true );

    return array(
    	'chiiki' => $chiiki,
    	'todofuken' => $todofuken,
    	'eria' => $eria
    );
}