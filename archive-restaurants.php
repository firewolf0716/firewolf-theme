<?php get_header(); 

$post_type = $_GET['post_type'] ?: 'restaurants';
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$args = [
    'posts_per_page' => 8,
    'paged'          => $paged,
    'post_type' => $post_type,
    'post_status' => 'publish',
    'meta_query' => [ 
        'relation' => 'AND' ,
    ] , 
]; ?>

<div class="container" id="archieve">

<?php   
    
    require get_template_directory() . '/inc/area-const.php'; 
    
    $search = $_GET['search'] ?: '';
    $chiiki = $_GET[$chiiki_group_name] ?: '';
    $todofuken = $_GET[$todofuken_group_name] ?: '';
    $eria = $_GET[$eria_group_name] ?: '';

if ( $search ) : 
    require get_template_directory() . '/template-parts/restaurant/list-search.php'; 

elseif ( $chiiki ) :
    require get_template_directory() . '/template-parts/restaurant/list-chiiki.php'; 

elseif ( $todofuken ) :
    require get_template_directory() . '/template-parts/restaurant/list-todofuken.php'; 

elseif ( $eria ) :   
    require get_template_directory() . '/template-parts/restaurant/list-eria.php'; 

endif;

$search_query = new WP_Query( $args );

if ( $search_query->have_posts() ): ?>

    <div class="rank_box">
<?php
    while ( $search_query->have_posts() ) : $search_query->the_post();
        get_template_part( 'template-parts/restaurant/content', 'restaurant' );
    endwhile; 
?>

    </div>

<?php wp_reset_postdata(); ?>

    <div class="paging">
        <?php job_one_pagination($search_query->max_num_pages); ?>  
    </div>
<?php

else:
    get_template_part( 'template-parts/restaurant/content', 'none' );
endif;

?>

</div>

<?php get_footer();
