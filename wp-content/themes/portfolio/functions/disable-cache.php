<?php
function disable_cache_for_contact_page($cache_enabled) {
if (is_page('contact')) {
return false;
}
return $cache_enabled;
}
add_filter('wpsupercache_buffer', 'disable_cache_for_contact_page');