<?php
function responsive_image($image, $settings): bool|string
{
    if (empty($image)) {
        return '';
    }

    $image_id = '';

    if (is_numeric($image)) {
        // si c'est un nombre, on considère que cela s'agit d'un ID
        $image_id = $image;
    } elseif (is_array($image) && isset($image['ID'])) {
        // Si c'est un tableau associatif contenant la clé ID, on récupère cet ID
        $image_id = $image['ID'];
    } else {
        // Générer un tag img par défaut
    }

    // Récupération des informations de l'image depuis la base de données.
    $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true); // Attribut alt
    $image_post = get_post($image_id); // Object WP_Post de l'image
    $title = $image_post->post_title ?? '';
    $name = $image_post->post_name ?? '';

    // Récupération des URLS et attributs pour l'image en taille "full"
    // Wordpress génère automatiquement un srcset basé sur les tailles existantes
    $src = wp_get_attachment_image_url($image_id, 'full');
    $srcset = wp_get_attachment_image_srcset($image_id, 'full');
    $sizes = wp_get_attachment_image_sizes($image_id, 'full');

    // Gestion de l'attribut de chargement "lazy" ou "eager" selon les paramètres.
    $lazy = $settings['lazy'] ?? 'eager';

    // Gestion des classes (si des classes sont fournies dans $settings).
    $classes = '';
    if (!empty($settings['classes'])) {
        $classes = is_array($settings['classes']) ? implode(' ', $settings['classes']) : $settings['classes'];
    }

    ob_start();
    ?>
    <picture>
        <img
                src="<?= esc_url($src) ?>"
                alt="<?= esc_attr($alt) ?>"
                loading="<?= esc_attr($lazy) ?>"
                srcset="<?= esc_attr($srcset) ?>"
                sizes="<?= esc_attr($sizes) ?>"
                class="<?= esc_attr($classes) ?>">
    </picture>
    <?php
    return ob_get_clean();
}
