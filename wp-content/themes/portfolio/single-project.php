<?php get_header(); ?>
<?php if (have_rows('projet')): ?>
    <?php while (have_rows('projet')) : the_row(); ?>
        <?php if (get_row_layout() == 'single_projet'): ?>
            <section class="single_projet" aria-labelledby="projet-title" itemscope
                     itemtype="http://schema.org/Project">
                <div class="single_projet_head">
                    <h2 aria-level="2" class="single_projet_title"
                        id="projet-title" itemprop="name"><?php the_sub_field('single_projet_title'); ?></h2>
                    <?= responsive_image(get_sub_field('single_projet_img'), ['lazy' => 'lazy', 'classes' => 'stage__image']) ?>
                    <svg class="border">
                        <use xlink:href="#border"></use>
                    </svg>
                </div>
                <?php if (have_rows('single_projet_content')): ?>
                    <?php while (have_rows('single_projet_content')) : the_row(); ?>
                        <div class="single_projet_content">
                            <div class="single_project_text">
                                <p class="single_projet_title"
                                   itemprop="headline"><?php the_sub_field('single_projet_title'); ?></p>
                                <?php if (get_sub_field('single_projet_texte')): ?>
                                    <p class="single_projet_text"
                                       itemprop="description"><?php the_sub_field('single_projet_texte'); ?></p>
                                <?php endif; ?>
                            </div>
                            <?php if (get_sub_field('single_project_choice') === true): ?>
                                <?= responsive_image(get_sub_field('single_project_img'), ['lazy' => 'lazy', 'classes' => 'single_project_img']) ?>
                            <?php elseif (get_sub_field('single_project_fig')) : $galeries = get_sub_field('single_project_fig') ?>
                                <div class="splide js-only" aria-label="Splide Basic HTML Example">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            <?php foreach ($galeries as $galerie): ?>
                                                <li class="splide__slide">
                                                    <?= responsive_image($galerie, ['lazy' => 'lazy', 'classes' => 'stage__image']) ?>
                                                </li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                </div>
                                <noscript>
                                    <div class="noscript-gallery">
                                        <?php foreach ($galeries as $galerie): ?>
                                            <div class="noscript-slide">
                                                <?= responsive_image($galerie, ['classes' => 'stage__image']) ?>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </noscript>
                            <?php else : ?>

                            <?php endif ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </section>
        <?php endif; ?>


        <?php if (get_row_layout() == 'contact_redirect'): ?>
            <section class="contact_redirect" aria-labelledby="contact-title">
                <div class="contact_redirect_container">
                    <h2 aria-level="2" id="contact-title"
                        class="contact_redirect_title"><?php the_sub_field('contact_redirect_title'); ?></h2>
                    <svg class="arrow">
                        <use xlink:href="#arrow"></use>
                    </svg>
                </div>
                <?php
                $button = get_sub_field('contact_redirect_button');
                if ($button): ?>
                    <a href="<?php echo esc_url($button['url']); ?>"
                       target="<?php echo esc_attr($button['target'] ?: '_self'); ?>"
                       class="contact_redirect_button hoverCursor"
                       aria-label="Aller vers la page : <?php echo esc_html($button['title']); ?>">
                        <?php echo esc_html($button['title']); ?>
                    </a>
                <?php endif; ?>
            </section>
        <?php endif; ?>
    <?php endwhile; else: ?>
    <p><?= __hepl('Ce projet n’existe pas encore'); ?>&hellip;</p>
<?php endif; ?>
<?php
$current_id = get_the_ID(); // ID du projet actuel

$args = [
    'post_type' => 'project',           // Slug de ton CPT
    'posts_per_page' => 3,                   // Nombre de projets à afficher
    'post__not_in' => [$current_id],       // Exclure le projet en cours
    'orderby' => 'rand',              // Optionnel : affichage aléatoire
];

$related_projects = new WP_Query($args);

if ($related_projects->have_posts()): ?>
    <section class="other_projects" aria-labelledby="autres-projets-title">
        <div class="container">
            <h2 id="autres-projets-title" class="section-title">Autres projets</h2>
            <div class="other_projects_grid">
                <?php while ($related_projects->have_posts()): $related_projects->the_post(); ?>
                    <article class="project_item">
                        <a href="<?php the_permalink(); ?>" class="hoverCursor"
                           aria-label="Voir le projet : <?php the_title(); ?>"></a>
                        <div>
                            <?php if (have_rows('projet')): ?>
                                <?php while (have_rows('projet')) : the_row(); ?>
                                    <?php if (get_row_layout() == 'single_projet'): ?>
                                        <?php
                                        $image = get_sub_field('single_projet_img');
                                        if ($image):
                                            echo responsive_image($image, ['lazy' => 'lazy', 'classes' => 'project_item_img']);
                                        endif;
                                        ?>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                            <svg class="border">
                                <use xlink:href="#border"></use>
                            </svg>
                        </div>
                        <h3 class="project_item_title"><?php the_title(); ?></h3>

                    </article>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>


<?php get_footer(); ?>