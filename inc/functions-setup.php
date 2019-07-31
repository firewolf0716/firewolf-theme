<?php

function firewolf_setup() {	

	load_theme_textdomain( 'firewolf' );

	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'firewolf_setup' );