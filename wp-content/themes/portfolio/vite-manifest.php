<?php

function enqueue_assets_from_vite_manifest(): void
{
    $manifestPath = get_theme_file_path('public/.vite/manifest.json');

    if (file_exists($manifestPath)) {
        $manifest = json_decode(file_get_contents($manifestPath), true);
        // Vérifier et ajouter le fichier JavaScript
        if (isset($manifest['wp-content/themes/portfolio/resources/js/main.js'])) {
            wp_enqueue_script('portfolio', get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/resources/js/main.js']['file']), [], null, true);
        }
        // Vérifier et ajouter le fichier CSS
        if (isset($manifest['wp-content/themes/portfolio/resources/css/styles.scss'])) {
            wp_enqueue_style('portfolio', get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/resources/css/styles.scss']['file']));
        }
    }
}

//enqueue_assets_from_vite_manifest();

// Function utilitaire permettant de charger le fichier contenant tous les imports de police hors du css.
function portfolio_fonts(): string
{
    return get_template_directory_uri() . '/resources/fonts/fonts.css';
}

// 1. Charger un fichier "public" (asset/image/css/script/...) pour le front-end sans que cela ne s'applique à l'admin.
function portfolio_asset(string $file): string
{
    $manifestPath = get_theme_file_path('public/.vite/manifest.json');
    if (file_exists($manifestPath)) {
        $manifest = json_decode(file_get_contents($manifestPath), true);

        if (isset($manifest['wp-content/themes/portfolio/resources/js/main.js']) && $file === 'js') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/resources/js/main.js']['file']);
        }

        if (isset($manifest['wp-content/themes/portfolio/resources/css/style.scss']) && $file === 'css') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/resources/css/style.scss']['file']);
        }
    }

    return get_template_directory_uri() . '/public/' . $file;
}
