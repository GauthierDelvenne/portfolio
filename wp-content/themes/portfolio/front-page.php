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
                <h2 aria-level="2" id="presentation-title" class="hidden"><?=__hepl('Présentation de ma personne');?></h2>
                <div class="presentation_me" itemscope itemtype="http://schema.org/Person">
                    <div class="presentation_me_container">
                        <p class="presentation_me_hook"><?php the_sub_field('presentation_title'); ?></p>
                        <svg class="middleCloud m1">
                            <use xlink:href="#middleCloud"></use>
                        </svg>

                    </div>
                    <p class="presentation_me_profession"
                       itemprop="jobTitle"><?php the_sub_field('presentation_profession'); ?></p>
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
                    <h2 aria-level="2" id="discover-title"><?php the_sub_field('discover_title_h2'); ?></h2>
                    <svg class="underline">
                        <use xlink:href="#underline"></use>
                    </svg>
                </div>
                <div class="discover_content_text">
                    <?php the_sub_field('discover_text'); ?>
                </div>
                <?php
                $button = get_sub_field('discover_content');
                if ($button): ?>
                    <a href="<?php echo esc_url($button['url']); ?>"
                       target="<?php echo esc_attr($button['target'] ?: '_self'); ?>" class="discover_content_button hoverCursor"
                       aria-label="Aller vers la page : <?= esc_html($button['title']); ?>">
                        <?php echo esc_html($button['title']); ?>
                    </a>
                <?php endif; ?>
                <svg class="middleCloud">
                    <use xlink:href="#middleCloud"></use>
                </svg>
            </div>
            <div class="discover_projects"  >
        <?php elseif (get_row_layout() == 'discover_project'): ?>
            <article class="discover_project" aria-labelledby="project-title-<?php echo get_row_index(); ?>" itemscope
                     itemtype="http://schema.org/Project">
                <svg class="border">
                    <use xlink:href="#border"></use>
                </svg>
                <a class="hoverCursor" href="<?= get_sub_field('discover_link'); ?>"
                   aria-label="Voir le projet : <?php the_sub_field('discover_title_h3'); ?>" itemprop="url"><span
                            class="hidden"> Voir le projet : <?php the_sub_field('discover_title_h3'); ?></span></a>
                <div class="discover_project_title">
                    <h3 aria-level="3" id="project-title-<?php echo get_row_index(); ?>" itemprop="name"><?php the_sub_field('discover_title_h3'); ?></h3>
                    <svg class="round">
                        <use xlink:href="#round"></use>
                    </svg>
                </div>
                <?= responsive_image(get_sub_field('discover_img'), ['lazy' => 'lazy', 'classes' => 'stage__image']) ?>
            </article>
        <?php elseif (get_row_layout() == 'discover_project_2'): ?>
            <article class="discover_project" aria-labelledby="project-title-<?php echo get_row_index(); ?>" itemscope
                     itemtype="http://schema.org/Project">
                <svg class="border">
                    <use xlink:href="#border"></use>
                </svg>
                <a class="hoverCursor" href="<?= get_sub_field('discover_link'); ?>"
                   aria-label="Voir le projet : <?php the_sub_field('discover_title_h3'); ?>" itemprop="url"><span
                            class="hidden"> Voir le projet : <?php the_sub_field('discover_title_h3'); ?></span></a>
                <h3 aria-level="3" id="project-title-<?php echo get_row_index(); ?>" itemprop="name"
                    lang="la"><?php the_sub_field('discover_title_h3'); ?></h3>
                <?= responsive_image(get_sub_field('discover_img'), ['lazy' => 'lazy', 'classes' => 'stage__image']) ?>
            </article>
        <?php elseif (get_row_layout() == 'discover_project_3'): ?>
            <article class="discover_project" aria-labelledby="project-title-<?php echo get_row_index(); ?>" itemscope
                     itemtype="http://schema.org/Project">
                <svg class="border">
                    <use xlink:href="#border"></use>
                </svg>
                <a class="hoverCursor" href="<?= get_sub_field('discover_link'); ?>"
                   aria-label="Voir le projet : <?php the_sub_field('discover_title_h3'); ?>" itemprop="url"><span
                            class="hidden"> Voir le projet : <?php the_sub_field('discover_title_h3'); ?></span></a>
                <h3 aria-level="3" id="project-title-<?php echo get_row_index(); ?>" itemprop="name"
                    lang="la"><?php the_sub_field('discover_title_h3'); ?></h3>
                <?= responsive_image(get_sub_field('discover_img'), ['lazy' => 'lazy', 'classes' => 'stage__image']) ?>
            </article>
            </div>
            </section>
        <?php endif; ?>

    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>