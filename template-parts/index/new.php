<?php

	$recent_args = [
        'posts_per_page' => 8,
        'post_type' => 'restaurants',
        'post_status' => 'publish',
        'orderby'      => 'date',
        'order'        => 'DESC',
    ];

    $recent_query = new WP_Query( $recent_args );

if ( $recent_query->have_posts() ): ?>

<div class="rank_box">

<?php

	while ( $recent_query->have_posts() ) : $recent_query->the_post();
		get_template_part( 'template-parts/restaurant/content', 'restaurant' );
	endwhile; 
	wp_reset_postdata();

?>

</div>

<?php

else:
    get_template_part( 'template-parts/restaurant/content', 'none' );
endif;

