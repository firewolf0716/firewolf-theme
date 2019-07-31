<?php
    
    $chiiki_meta_query = [
        'key' => $chiiki_group_name,
        'value' => $chiiki,
        'compare' => '=',
    ];

    session_start();
    $_SESSION["chiiki_meta_query"] = $chiiki_meta_query;
    
    $args['meta_query'][] = $chiiki_meta_query;
    
    $todofuken_group_sub_fields = $todofuken_group['sub_fields'];
    $todofuken_index = 0;

    $sub_area_field = get_sub_area_field( $chiiki, $todofuken_group_sub_fields);
    $sub_meta_key = $todofuken_group_name . '_' . $sub_area_field['name'];
    $_SESSION["todofuken_meta_key"] = $sub_meta_key;
    $sub_areas = $sub_area_field['choices'];
    
?>

    <div class="title_box">
        <div class="title_area">
            <p class="title_contain"><?=$chiiki?> 詳細エリア</p>
        </div>
    </div> 

    <div class="sub_search_conditions chiiki">

        <?php foreach ($sub_areas as $sub_area) : ?>

        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="condition_item" 
            onclick="event.preventDefault();
                     document.getElementById('todofuken_<?=$sub_area?>').submit();">
            <span class="result_name">
                <?=$sub_area?>
            </span> 
            <span class="result_count">
                <?php
                    $tmp_meta_query = array();
                    $tmp_meta_query[] = $chiiki_meta_query;
                    $tmp_meta_query[] = [
                            'key' => $sub_meta_key,
                            'value' => $sub_area,
                            'compare' => '=',
                        ];
                    echo count(get_sub_area_restaurants( $tmp_meta_query ));
                ?>
            </span>
        </a>

        <form id="todofuken_<?=$sub_area?>" 
            action="<?php echo esc_url( home_url( '/' ) ); ?>" 
            method="GET" style="display: none;">
            <input type="hidden" name="post_type" value="restaurants" />
            <input type="hidden" name="meta_key" value="<?=$sub_meta_key?>" />
            <input type="hidden" name="<?=$todofuken_group_name?>" value="<?=$sub_area?>">
        </form>

        <?php endforeach; ?>

    </div>

    <p class="search_result_count">
        <span class="result_number">
            <?=count(get_sub_area_restaurants( array($chiiki_meta_query) ))?>
        </span> 件見つかりました
    </p>