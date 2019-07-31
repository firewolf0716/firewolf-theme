<?php

$figure_url = get_the_post_thumbnail_url() ?:get_stylesheet_directory_uri().'/assets/img/empty.jpg';

$the_genre = get_post_meta( get_the_ID(), 'genre', true) ?:'&nbsp;';

if ($_GET['eria']) {
	$the_area = $_GET['eria']; 
}elseif ($_GET['todofuken']) {
	$the_area = get_post_meta( get_the_ID(), $_SESSION["eria_meta_key"], true) ?:'&nbsp;';
	$area_form_id = 'eria_'.$the_area;
}elseif ($_GET['chiiki']) {
	$the_area = get_post_meta( get_the_ID(), $_SESSION["todofuken_meta_key"], true) ?:'&nbsp;';
	$area_form_id = 'todofuken_'.$the_area;
}elseif (!$_GET) {
	$the_area = get_post_meta( get_the_ID(), 'chiiki', true) ?:'&nbsp;';
	$area_form_id = 'chiiki_'.$the_area;
}

 ?>

<div class="rank_item_box">
	<div class="date_box">
		<p><?=get_the_date( 'Y/m/d' )?> 更新</p>
	</div>
	<a href="<?=esc_url( get_permalink() )?>">
		<div class="title_box">
			<p><?=the_title()?></p>
		</div>
	</a>
	<a href="<?=esc_url( get_permalink() )?>">
		<div class="figure_box">
			<img src="<?=$figure_url?>">
		</div>
	</a>
	<div class="action_box">
		<a href="#" class="area_btn"
			onclick="event.preventDefault();
                 document.getElementById('<?=$area_form_id?>').submit();"><?=$the_area?></a>
		<a href="#" class="genre_btn"><?=$the_genre?></a>
	</div>
	<div class="sp_figact_box">		
		<div class="sp_figure_box">
			<a href="<?=esc_url( get_permalink() )?>">
			<img src="<?=$figure_url?>"></a>
		</div>		
		<div class="sp_action_box">
			<p class="area_btn" 
			onclick="event.preventDefault();
                 document.getElementById('<?=$area_form_id?>').submit();"
            ><?=$the_area?></p>
			<p class="genre_btn"><?=$the_genre?></p>
		</div>
	</div>
	<a href="<?=esc_url( get_permalink() )?>">
		<div class="foot_box">
			<p class="foot_btn">この店舗の求人を見る</p>
		</div>
	</a>
</div>
