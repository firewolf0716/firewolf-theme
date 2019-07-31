<?php get_header(); ?>

<div class="container">

	<div class="slide_box">
		<div class="slider">
			<?php echo do_shortcode('[wonderplugin_slider id=1]'); ?>
		</div>
	</div>

	<div class="title_box">
		<div class="title_area">
			<p class="title_contain">希望のエリアで探す</p>
		</div>
	</div>

	<?php get_template_part( 'template-parts/index/area', 'part' ); ?>

	<div class="title_box">
		<div class="title_area">
			<p class="title_contain">キーワードで探す</p>
		</div>
	</div>

	<?php get_template_part( 'template-parts/index/input'); ?>

	<div class="title_box">
		<div class="title_area">
			<p class="title_contain">パートナーの店舗</p>
		</div>
	</div>

	<?php get_template_part( 'template-parts/index/partner'); ?>

	<div class="title_box">
		<div class="title_area">
			<p class="title_contain">キャンペーン中の店舗</p>
		</div>
	</div>

	<?php get_template_part( 'template-parts/index/campaign'); ?>

	<div class="title_box">
		<div class="title_area">
			<p class="title_contain">新着の店舗</p>
		</div>
	</div>

	<?php get_template_part( 'template-parts/index/new'); ?>


</div>


<?php get_footer();
