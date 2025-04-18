<?php /* Template Name: Template "projects list" */ ?>
<?php get_header(); ?>

<?php
$paged = get_query_var('paged') ?: 1;
$taxonomy = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';

$args = [
    'post_type' => 'project',
    'posts_per_page' => 8,
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
    <?php while (have_rows('project')) : the_row(); ?>
        <?php if (get_row_layout() == 'project_title'): ?>
            <p class="title"><?php the_sub_field('title'); ?></p>
            <div class="filters">
                <p class="title"><?php the_sub_field('title_filter'); ?></p>
                <div class="filters_choice">
                    <a href="<?= esc_url(get_permalink()); ?>"
                       class="<?= ($current_filter === '') ? 'active-project' : ''; ?>">
                        <?= __('Tout', 'hepl-trad'); ?>
                    </a>
                    <?php foreach ($terms as $term): ?>
                        <a href="<?= esc_url(get_permalink()) . '?filter=' . $term->slug; ?>"
                           class="<?= ($current_filter === $term->slug) ? 'active-project' : ''; ?>">
                            <?= esc_html($term->name); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php if ($query->have_posts()) : ?>
    <div class="project-list">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <article class="project">
                <?php $title = get_field('headline', get_the_ID()) ?>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div><?php the_excerpt(); ?></div>
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
    <p>Aucun projet trouvé.</p>
<?php endif; ?>

<?php if (have_rows('project')): ?>
    <?php while (have_rows('project')) : the_row(); ?>
        <?php if (get_row_layout() == 'presentation_redirect'): ?>
            <section class="presentation_redirect">
                <h2 class="presentation_redirect_title"><?php the_sub_field('presentation_redirect_title'); ?></h2>
                <?php
                $button = get_sub_field('presentation_redirect_link');
                if ($button): ?>
                    <a href="<?= esc_url($button['url']); ?>"
                       target="<?= esc_attr($button['target'] ?: '_self'); ?>"
                       class="presentation_redirect_button">
                        <?= esc_html($button['title']); ?>
                    </a>
                <?php endif; ?>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
