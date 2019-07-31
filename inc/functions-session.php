<?php

function boot_session() {
  session_start();
}
add_action('wp_loaded','boot_session');