<?php

	require get_template_directory() . '/inc/area-const.php'; 
	$chiikis = $chiiki_group['choices'];

?>

<div class="area_box">

	<?php foreach ($chiikis as $chiiki) : ?>

    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="area_list_item" 
        onclick="event.preventDefault();
                 document.getElementById('chiiki_<?=$chiiki?>').submit();">
        <p class="area_item_name">
            <?=$chiiki?>で探す                  
        </p> 
    </a>

    <form id="chiiki_<?=$chiiki?>" 
        action="<?php echo esc_url( home_url( '/' ) ); ?>" 
        method="GET" style="display: none;">
        <input type="hidden" name="post_type" value="restaurants" />
        <input type="hidden" name="<?=$chiiki_group_name?>" value="<?=$chiiki?>">
    </form>

    <?php endforeach; ?>

</div>
