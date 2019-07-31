<?php
    
    $eria_meta_key = $_GET['meta_key'] ?:$_SESSION["eria_meta_key"]?:'';

    $eria_meta_query = [
        'key' => $eria_meta_key,
        'value' => $eria,
        'compare' => '=',
    ];

    $args['meta_query'][] = $eria_meta_query;

    $s_genre = $_GET['s_genre'] ?: '';
    if ($s_genre) :
        $genre_meta_query = [
            'key' => 'genre',
            'value' => $s_genre,
            'compare' => '=',
        ];
    	$args['meta_query'][] = $genre_meta_query;

    	$total_eria_args = $args;
    	$total_eria_args['posts_per_page'] = -1;

    	$total_eria_query = new WP_Query( $total_eria_args );
    	$total_eria = count( $total_eria_query->posts );
    endif;

    $genres = $genre_group['choices'];

?>

	<div class="title_box">
        <div class="title_area">
            <p class="title_contain"><?=$eria?> 詳細エリア</p>
        </div>
    </div> 

    <div class="sub_search_conditions eria">

        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="condition_item" 
            onclick="event.preventDefault();
                     document.getElementById('form_all').submit();">
            <span class="result_name">
                全て                   
            </span> 
        </a>

        <form id="form_all" 
            action="<?php echo esc_url( home_url( '/' ) ); ?>" 
            method="GET" style="display: none;">
            <input type="hidden" name="post_type" value="restaurants" />
            <input type="hidden" name="meta_key" value="<?=$eria_meta_key?>" />
            <input type="hidden" name="<?=$eria_group_name?>" value="<?=$eria?>" />
            <input type="hidden" name="s_genre" value="">
        </form>

        <?php $genre_index = 0; foreach ($genres as $genre) : ?>

        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="condition_item" 
            onclick="event.preventDefault();
                     document.getElementById('<?=$genre_group_name.'_'.$genre_index?>?>').submit();">
            <span class="result_name">
                <?=$genre?>                    
            </span> 
        </a>

        <form id="<?=$genre_group_name.'_'.$genre_index?>?>" 
            action="<?php echo esc_url( home_url( '/' ) ); ?>" 
            method="GET" style="display: none;">
            <input type="hidden" name="post_type" value="restaurants" />
            <input type="hidden" name="meta_key" value="<?=$eria_meta_key?>" />
            <input type="hidden" name="<?=$eria_group_name?>" value="<?=$eria?>" />
            <input type="hidden" name="s_genre" value="<?=$genre?>">
        </form>

        <?php $genre_index++; endforeach; ?>

    </div>

    <p class="search_result_count">
        <span class="result_number">
            <?php
                $tmp_meta_query = array();
                $tmp_meta_query[] = $_SESSION["chiiki_meta_query"];
                $tmp_meta_query[] = $_SESSION["todofuken_meta_query"];
                $tmp_meta_query[] = $eria_meta_query;
                $tmp_meta_query[] = $genre_meta_query;
                echo count(get_sub_area_restaurants( $tmp_meta_query ));
            ?>
        </span> 件見つかりました
    </p>