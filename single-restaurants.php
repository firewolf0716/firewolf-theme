<?php get_header(); 

$detail 	= 'detail_';
$concept 	= get_post_meta( get_the_ID(), $detail.'concept', true) ?:'&nbsp;';
$ages    	= get_post_meta( get_the_ID(), $detail.'ages', true) ?:'&nbsp;';
$job     	= get_post_meta( get_the_ID(), $detail.'job', true) ?:'&nbsp;';
$duty_hours = get_post_meta( get_the_ID(), $detail.'duty_hours', true) ?:'&nbsp;';
$address  	= get_post_meta( get_the_ID(), $detail.'address', true) ?:'&nbsp;';
$near_station = get_post_meta( get_the_ID(), $detail.'near_station', true) ?:'&nbsp;';
$salary		= get_post_meta( get_the_ID(), $detail.'salary', true) ?:'&nbsp;';
$transportation		= get_post_meta( get_the_ID(), $detail.'transportation', true) ?:'&nbsp;';
$rest 		= get_post_meta( get_the_ID(), $detail.'rest', true) ?:'&nbsp;';
$ident 		= get_post_meta( get_the_ID(), $detail.'ident', true) ?:'&nbsp;';
$dormitory  = get_post_meta( get_the_ID(), $detail.'dormitory', true) ?:'&nbsp;';
$bikou 		= get_post_meta( get_the_ID(), $detail.'bikou', true) ?:'&nbsp;';
$pr 		= get_post_meta( get_the_ID(), $detail.'pr', true) ?:'&nbsp;';
$official_site = get_post_meta( get_the_ID(), $detail.'official_site', true) ?:'&nbsp;';

$area = get_every_area_value(get_the_ID());
$area = $area['chiiki'] .'&nbsp;'. $area['todofuken'] .'&nbsp;'. $area['eria'];

?>

<div class="detail_main_wrap">
	<p class="detail_header">
		<?php echo get_the_title();?>
	</p>

	<div class="detail_image" style="background-image: url(<?php the_post_thumbnail_url()?>)"></div>
	<div class="detail_descript">
		<div class="detail_item">
			<div class="detail_item_title">
				<p>コンセプト</p>
			</div>
			<div class="detail_item_text">
				<p><?=$concept?></p>
			</div>
		</div>

		<div class="detail_item">
			<div class="detail_item_title">
				<p>採用年齢</p>
			</div>
			<div class="detail_item_text">
				<p><?=$ages?></p>
			</div>
		</div>

		<div class="detail_item">
			<div class="detail_item_title">
				<p>業種</p>
			</div>
			<div class="detail_item_text">
				<p><?=$job?></p>
			</div>
		</div>

		<div class="detail_item">
			<div class="detail_item_title">
				<p>営業時間</p>
			</div>
			<div class="detail_item_text">
				<p><?=$duty_hours?></p>
			</div>
		</div>

		<div class="detail_item">
			<div class="detail_item_title">
				<p>エリア</p>
			</div>
			<div class="detail_item_text">
				<p><?=$area?></p>
			</div>
		</div>

		<div class="detail_item">
			<div class="detail_item_title">
				<p>住所</p>
			</div>
			<div class="detail_item_text">
				<p><?=$address?></p>
			</div>
		</div>

		<div class="detail_item">
			<div class="detail_item_title">
				<p>最寄駅</p>
			</div>
			<div class="detail_item_text">
				<p><?=$near_station?></p>
			</div>
		</div>

		<div class="detail_item">
			<div class="detail_item_title">
				<p>給与</p>
			</div>
			<div class="detail_item_text">
				<p><?=$salary?></p>
			</div>
		</div>

		<div class="detail_item">
			<div class="detail_item_title">
				<p>交通費</p>
			</div>
			<div class="detail_item_text">
				<p><?=$transportation?></p>
			</div>
		</div>

		<div class="detail_item">
			<div class="detail_item_title">
				<p>休憩</p>
			</div>
			<div class="detail_item_text">
				<p><?=$rest?></p>
			</div>
		</div>

		<div class="detail_item">
			<div class="detail_item_title">
				<p>身分証</p>
			</div>
			<div class="detail_item_text">
				<p><?=$ident?></p>
			</div>
		</div>

		<div class="detail_item">
			<div class="detail_item_title">
				<p>寮費</p>
			</div>
			<div class="detail_item_text">
				<p><?=$dormitory?></p>
			</div>
		</div>

		<div class="detail_item">
			<div class="detail_item_title">
				<p>備考</p>
			</div>
			<div class="detail_item_text">
				<p><?=$bikou?></p>
			</div>
		</div>

		<div class="detail_item">
			<div class="detail_item_title">
				<p>店舗からのPR</p>
			</div>
			<div class="detail_item_text">
				<p><?=$pr?></p>
			</div>
		</div>

		<div class="detail_item">
			<div class="detail_item_title">
				<p>オフィシャルサイト</p>
			</div>
			<div class="detail_item_text">
				<p><?=$official_site?></p>
			</div>
		</div>

	</div>

	<div class="detail_pagination">

		<?php 
			$prev_post = get_previous_post();
			$next_post = get_next_post();
 
			if(empty($prev_post)){		
		?>
		<button class="detail_prev_btn detail_btn_disabled">＜　前の店舗を見る</button>
		<?php 
			}
			else {
		?>
		<button class="detail_prev_btn" onclick="window.location.href = '<?= $prev_post->guid?>';">
			＜　前の店舗を見る
		</button>
		<?php }?>

		<?php 
			if(empty($next_post)){		
		?>
		<button class="detail_next_btn detail_btn_disabled">次の店舗を見る　＞</button>
		<?php 
			}
			else {
		?>
		<button class="detail_next_btn" onclick="window.location.href = '<?= esc_url(get_permalink( $next_post->ID))?>';">
			次の店舗を見る　＞
		</button>
		<?php }?>
	</div>
</div>

<?php get_footer();
