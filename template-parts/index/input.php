<div class="input_box">

	<form name="input_form"
		action="<?php echo esc_url( home_url( '/' ) ); ?>"
		method="get"
	>

		<input type="hidden" name="post_type" value="restaurants" />

		<div class="input_form_box">
			<div class="input_wrap">
				<input type="text" name="search">
			</div>
			<div class="btn_wrap">
				<input type="submit" value="検索">
			</div>			
		</div>

	</form>
</div>
