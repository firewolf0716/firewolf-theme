<?php

$args['s'] =  $search;

$total_args = $args;
$total_args['posts_per_page'] = -1;

$total_query = new WP_Query( $total_args );

?>

<div class="title_box">
    <div class="title_area">
        <p class="title_contain">"<?=$search?>" 詳細エリア</p>
    </div>
</div> 

<p class="search_result_count">
    <span class="result_number">
        <?=count($total_query->posts)?>
    </span> 件見つかりました
</p>