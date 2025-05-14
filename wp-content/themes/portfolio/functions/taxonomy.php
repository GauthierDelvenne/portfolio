<?php
register_taxonomy( 'project_type', 'project',[
    'labels' => [
        'name' => 'Types de projet',
        'singular_name' => 'Type de projet',
        'menu_name' => 'Types de projet',
        'all_items' => 'Tous les types',
        'edit_item' => 'Modifier le type',
        'view_item' => 'Voir le type',
        'update_item' => 'Mettre à jour le type',
        'add_new_item' => 'Ajouter un nouveau type',
        'new_item_name' => 'Nom du nouveau type',
        'search_items' => 'Rechercher un type',
        'not_found' => 'Aucun type trouvé',
    ],
    'description' => 'Types de projet',
    'public' => true,
    'hierarchical' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'show_tagcloud' => false,
    'rewrite' => ['slug' => 'type-projet'],
]);