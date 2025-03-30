<?php

register_post_type('project', [
    'label' => 'Projet',
    'description' => 'Mes projets réalisés',
    'public' => true,
    'menu_position' => 6,
    'menu_icon' => 'dashicons-portfolio',
    'rewrite' => [
        'slug' => 'projet',
    ],
    'supports' => ['title', 'editor', 'excerpt', 'thumbnail'],
]);