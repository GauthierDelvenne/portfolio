<?php get_header(); ?>
<?php if (have_rows('presentation')): ?>
    <?php while (have_rows('presentation')) : the_row(); ?>
        <?php if (get_row_layout() == 'presentation_me'): ?>
            <section class="presentation" aria-labelledby="presentation-title">
                <svg class="bigCloud b1">
                    <use xlink:href="#bigCloud"></use>
                </svg>
                <svg class="rightCloud r1">
                    <use xlink:href="#rightCloud"></use>
                </svg>
                <svg class="bigCloud b2">
                    <use xlink:href="#bigCloud"></use>
                </svg>
                <svg class="rightCloud r2">
                    <use xlink:href="#rightCloud"></use>
                </svg>
                <h2 id="presentation-title" class="hidden">Présentation de ma personne</h2>
                <div class="presentation_me">
                    <div class="presentation_me_container">
                        <p class="presentation_me_hook" aria-label="Accroche personnelle"><?php the_sub_field('presentation_title'); ?></p>
                        <svg class="middleCloud m1">
                            <use xlink:href="#middleCloud"></use>
                        </svg>

                    </div>
                    <p class="presentation_me_profession" aria-label="Profession"><?php the_sub_field('presentation_profession'); ?></p>
                </div>
                <svg class="mountain">
                    <use xlink:href="#mountain"></use>
                </svg>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php if (have_rows('discover')): ?>
    <?php while (have_rows('discover')) : the_row(); ?>
        <?php if (get_row_layout() == 'discover_content'): ?>
            <section class="discover" aria-labelledby="discover-title">
            <div class="discover_content">
                <div class="discover_content_title">
                    <h2 id="discover-title"><?php the_sub_field('discover_title_h2'); ?></h2>
                    <svg class="underline">
                        <use xlink:href="#underline"></use>
                    </svg>
                </div>
                <p aria-label="Contenu de la section découverte"><?php the_sub_field('discover_content'); ?></p>
                <svg class="middleCloud">
                    <use xlink:href="#middleCloud"></use>
                </svg>
            </div>
            <div class="discover_projects" aria-label="Projets à découvrir">
        <?php elseif (get_row_layout() == 'discover_project'): ?>
            <article class="discover_project" aria-labelledby="project-title-<?php echo get_row_index(); ?>">
                <svg class="border">
                    <use xlink:href="#border"></use>
                </svg>
                <a href="<?= get_sub_field('discover_link'); ?>" aria-label="Voir le projet : <?php the_sub_field('discover_title_h3'); ?>"></a>
                <div class="discover_project_title">
                    <h3 id="project-title-<?php echo get_row_index(); ?>"><?php the_sub_field('discover_title_h3'); ?></h3>
                    <svg class="round">
                        <use xlink:href="#round"></use>
                    </svg>
                </div>
                <?= responsive_image(get_sub_field('discover_img'), ['lazy' => 'true', 'classes' => 'stage__image']) ?>
            </article>
        <?php elseif (get_row_layout() == 'discover_project_2'): ?>
            <article class="discover_project" aria-labelledby="project-title-<?php echo get_row_index(); ?>">
                <svg class="border">
                    <use xlink:href="#border"></use>
                </svg>
                <a href="<?= get_sub_field('discover_link'); ?>" aria-label="Voir le projet : <?php the_sub_field('discover_title_h3'); ?>"></a>
                <h3 id="project-title-<?php echo get_row_index(); ?>" lang="la"><?php the_sub_field('discover_title_h3'); ?></h3>
                <?= responsive_image(get_sub_field('discover_img'), ['lazy' => 'true', 'classes' => 'stage__image']) ?>
            </article>
            </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>