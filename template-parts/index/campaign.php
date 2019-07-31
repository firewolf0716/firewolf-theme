<?php

	$campaign_args = [
        'posts_per_page' => 6,
        'paged'          => 1,
        'post_type' => 'restaurants',
        'post_status' => 'publish',
        'orderby'      => 'date',
        'order'        => 'DESC',
        'meta_query' => [ 
            [
                'key' => 'campaign',
                'value' => '1' 
            ],
        ],  

    ];

    $campaign_query = new WP_Query( $campaign_args );

if ( $campaign_query->have_posts() ): ?>

<div class="rank_box">

<?php

	while ( $campaign_query->have_posts() ) : $campaign_query->the_post();
		get_template_part( 'template-parts/restaurant/content', 'restaurant' );
	endwhile; 
	wp_reset_postdata();

?>

</div>

<?php

else:
    get_template_part( 'template-parts/restaurant/content', 'none' );
endif;
?>

