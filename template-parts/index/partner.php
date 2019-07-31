<?php

	$partner_args = [
        'posts_per_page' => 6,
        'paged'          => 1,
        'post_type' => 'restaurants',
        'post_status' => 'publish',
        'orderby'      => 'date',
        'order'        => 'DESC',
        'meta_query' => [ 
            [
                'key' => 'partner',
                'value' => '1' 
            ],
        ],      
    ];

    $partner_query = new WP_Query( $partner_args );

if ( $partner_query->have_posts() ): ?>

<div class="rank_box">

<?php

	while ( $partner_query->have_posts() ) : $partner_query->the_post();
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

