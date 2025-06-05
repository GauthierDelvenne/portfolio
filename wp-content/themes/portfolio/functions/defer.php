<?php
function defer_js_scripts($tag, $handle, $src) {
    if (is_admin()) return $tag;

    // Liste des scripts à exclure
    $exclude = ['jquery'];

    if (!in_array($handle, $exclude)) {
        return '<script src="' . $src . '" defer></script>';
    }

    return $tag;
}
add_filter('script_loader_tag', 'defer_js_scripts', 10, 3);
