<?php
function hepl_trad_load_textdomain(): void
{
load_theme_textdomain('hepl-trad', get_template_directory() . '/locales');
}

// Exécute la fonction lors de l'initialisation du thème.
add_action('after_setup_theme', 'hepl_trad_load_textdomain');

function __hepl(string $translation, array $replacements = []): array|string|null
{
// 1. Récupérer la traduction de la phrase présente dans $translation
$base = __($translation, 'hepl-trad');

// 2. Remplacer toutes les occurrences des variables par leur valeur
foreach ($replacements as $key => $value) {
$variable = ':' . $key;
$base = str_replace($variable, $value, $base);
}

// 3. Retourner la traduction complète.
return $base;
}