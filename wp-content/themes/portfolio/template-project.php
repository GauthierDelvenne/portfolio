<?php /* Template Name: Template "projects list" */ ?>
<?php get_header(); ?>

<?php
$paged = get_query_var('paged') ?: 1;
$taxonomy = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';

$args = [
    'post_type' => 'project',
    'posts_per_page' => 6,
    'paged' => $paged,
];

if ($taxonomy !== '') {
    $args['tax_query'] = [
        [
            'taxonomy' => 'project_type',
            'field' => 'slug',
            'terms' => $taxonomy,
        ]
    ];
}

$query = new WP_Query($args);

$terms = get_terms([
    'taxonomy' => 'project_type',
    'hide_empty' => false,
]);
$current_filter = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';
?>

<?php if (have_rows('project')): ?>
<?php while (have_rows('project')) :
the_row(); ?>
<?php if (get_row_layout() == 'project_title'): ?>
<section class="projects">
    <div class="container_title">
        <h2 class="title" aria-level="2"><?php the_sub_field('title'); ?></h2>
        <svg class="underline">
            <use xlink:href="#underline"></use>
        </svg>
        <svg class="rightCloud">
            <use xlink:href="#rightCloud"></use>
        </svg>
    </div>
    <div class="filters">
        <p class="title"><?php the_sub_field('title_filter'); ?></p>
        <div class="filters_choice">
            <a href="<?= esc_url(get_permalink()); ?>"
               class="<?= ($current_filter === '') ? 'active-project' : ''; ?> hoverCursor"
               aria-label="Filtrer par : tout">
                <?= __hepl('Tout'); ?>
            </a>
            <?php foreach ($terms as $term): ?>
                <a href="<?= esc_url(get_permalink()) . '?filter=' . $term->slug; ?>"
                   class="<?= ($current_filter === $term->slug) ? 'active-project' : ''; ?> hoverCursor"
                   aria-label="Filtrer par : <?= esc_html($term->name); ?>">
                    <?= esc_html(__($term->name, 'hepl-trad')); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
    <?php endwhile; ?>
    <?php endif; ?>

    <?php if ($query->have_posts()) : ?>
        <div class="project-list">
            <svg class="bigCloud">
                <use xlink:href="#bigCloud"></use>
            </svg>
            <svg class="middleCloud">
                <use xlink:href="#middleCloud"></use>
            </svg>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <article class="project" aria-labelledby="project-title-<?php the_ID(); ?>">
                    <a class="hoverCursor" href="<?php the_permalink(); ?>" aria-label="Voir le projet : <?php the_title(); ?>"></a>
                    <h3 aria-level="3" id="project-title-<?php the_ID(); ?>"><?php the_title(); ?></h3>
                    <?php if (have_rows('projet')) : ?>
                        <?php while (have_rows('projet')) :
                            the_row(); ?>
                            <?php if (get_row_layout() == 'single_projet') : ?>
                            <?= responsive_image(get_sub_field('single_projet_img'), ['lazy' => 'lazy', 'classes' => 'stage__image']) ?>
                            <svg class="border">
                                <use xlink:href="#border"></use>
                            </svg>
                        <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </article>
            <?php endwhile; ?>
        </div>
        <div class="pagination">
            <?php
            echo paginate_links([
                'total' => $query->max_num_pages,
                'current' => $paged,
                'prev_text' => __hepl('&laquo; Précédent'),
                'next_text' => __hepl('Suivant &raquo;'),
            ]);
            ?>
        </div>

        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p class="not_found">Aucun projet trouvé.</p>
    <?php endif; ?>
</section>
<?php if (have_rows('project')): ?>
    <?php while (have_rows('project')) : the_row(); ?>
        <?php if (get_row_layout() == 'presentation_redirect'): ?>
            <section class="presentation_redirect" aria-label="Redirection vers la page de présentation">
                <div class="presentation_redirect_container">
                    <h2 aria-level="2"
                        class="presentation_redirect_title"><?php the_sub_field('presentation_redirect_title'); ?></h2>
                    <svg class="icon">
                        <use xlink:href="#icon"></use>
                    </svg>
                </div>
                <?php
                $button = get_sub_field('presentation_redirect_link');
                if ($button): ?>
                    <a href="<?= esc_url($button['url']); ?>"
                       target="<?= esc_attr($button['target'] ?: '_self'); ?>"
                       class="presentation_redirect_button hoverCursor"
                       aria-label="Lien vers la page : <?= esc_html($button['title']); ?>">
                        <?= esc_html($button['title']); ?>
                    </a>
                <?php endif; ?>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
