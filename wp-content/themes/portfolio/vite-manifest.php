<?php

$manifestPath = get_theme_file_path('public/.vite/manifest.json');

if (file_exists($manifestPath)) {
    $manifest = json_decode(file_get_contents($manifestPath), true);

    if (isset($manifest['wp-content/themes/portfolio/resources/js/main.js'])) {
        wp_enqueue_script('portfolio', get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/resources/js/main.js']['file']), [], null, true);
    }

    if (isset($manifest['wp-content/themes/portfolio/resources/css/style.scss'])) {
        wp_enqueue_style('portfolio', get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/resources/css/style.scss']['file']));
    }
}