<?php
    
    $todofuken_meta_key = $_GET['meta_key'] ?: '';

    $todofuken_meta_query = [
        'key' => $todofuken_meta_key,
        'value' => $todofuken,
        'compare' => '=',
    ];

    session_start();
    $_SESSION["todofuken_meta_query"] = $todofuken_meta_query;

    $args['meta_query'][] = $_SESSION["chiiki_meta_query"];
    $args['meta_query'][] = $todofuken_meta_query;

    $eria_group_sub_fields = $eria_group['sub_fields'];
    $eria_index = 0;

    $sub_area_field = get_sub_area_field( $todofuken, $eria_group_sub_fields);

    $sub_meta_key = $eria_group_name . '_' . $sub_area_field['name'];
    $_SESSION["eria_meta_key"] = $sub_meta_key;
    $sub_areas = $sub_area_field['choices'];

?>

	<div class="title_box">
        <div class="title_area">
            <p class="title_contain"><?=$todofuken?> 詳細エリア</p>
        </div>
    </div> 

    <div class="sub_search_conditions todofuken">

    <?php 
    if ($sub_area_field) : 
        foreach ($sub_areas as $sub_area) : ?>

        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="condition_item" 
            onclick="event.preventDefault();
                     document.getElementById('eria_<?=$sub_area?>').submit();">
            <span class="result_name">
                <?=$sub_area?>                    
            </span> 
            <span class="result_count">
                <?php
                    $tmp_meta_query = array();
                    $tmp_meta_query[] = $_SESSION["chiiki_meta_query"];
                    $tmp_meta_query[] = $todofuken_meta_query;
                    $tmp_meta_query[] = [
                            'key' => $sub_meta_key,
                            'value' => $sub_area,
                            'compare' => '=',
                        ];
                    echo count(get_sub_area_restaurants( $tmp_meta_query ));
                ?>
            </span>
        </a>

        <form id="eria_<?=$sub_area?>" 
            action="<?php echo esc_url( home_url( '/' ) ); ?>" 
            method="GET" style="display: none;">
            <input type="hidden" name="post_type" value="restaurants" />
            <input type="hidden" name="meta_key" value="<?=$sub_meta_key?>" />
            <input type="hidden" name="<?=$eria_group_name?>" value="<?=$sub_area?>">
        </form>

        <?php endforeach; ?>

    <?php endif; ?>

    </div>

    <div class="sp_more_box">
        <button id="more" class="list_view_btn">エリアを更に表示</button>
        <button id="less" class="list_view_btn">エリアを隠し</button>
    </div>

    <p class="search_result_count">
        <span class="result_number">
            <?php
                $tmp_meta_query = array();
                $tmp_meta_query[] = $_SESSION["chiiki_meta_query"];
                $tmp_meta_query[] = $todofuken_meta_query;
                echo count(get_sub_area_restaurants( $tmp_meta_query ));
            ?>
        </span> 件見つかりました
    </p>