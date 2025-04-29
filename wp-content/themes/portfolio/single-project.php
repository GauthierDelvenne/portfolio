<?php get_header(); ?>
<?php if (have_rows('projet')): ?>
    <?php while (have_rows('projet')) : the_row(); ?>
        <?php if (get_row_layout() == 'single_projet'): ?>
            <section class="single_projet">
                <div class="single_projet_head">
                    <h2 class="single_projet_title"><?php the_sub_field('single_projet_title'); ?></h2>
                    <?= responsive_image(get_sub_field('single_projet_img'), ['lazy' => 'true', 'classes' => 'stage__image']) ?>
                    <svg class="border">
                        <use xlink:href="#border"></use>
                    </svg>
                </div>
                <?php if (have_rows('single_projet_content')): ?>
                    <?php while (have_rows('single_projet_content')) : the_row(); ?>
                        <div class="single_projet_content">
                            <p class="single_projet_title"><?php the_sub_field('single_projet_title'); ?></p>
                            <?php if (get_sub_field('single_projet_texte')): ?>
                                <p class="single_projet_text"><?php the_sub_field('single_projet_texte'); ?></p>
                            <?php endif; ?>
                            <?php if (get_sub_field('single_project_choice') === true): ?>
                                <?= responsive_image(get_sub_field('single_project_img'), ['lazy' => 'true', 'classes' => 'stage__image']) ?>
                            <?php elseif (get_sub_field('single_project_fig')) : $galeries = get_sub_field('single_project_fig') ?>
                                <div class="single_projet_galerie">
                                    <?php foreach ($galeries as $galerie): ?>
                                        <?= responsive_image($galerie, ['lazy' => 'true', 'classes' => 'stage__image']) ?>
                                    <?php endforeach ?>
                                </div>
                            <?php else : ?>

                            <?php endif ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </section>
        <?php endif; ?>

        <?php if (get_row_layout() == 'contact_redirect'): ?>
            <section class="contact_redirect">
                <div class="contact_redirect_container">
                    <h2 class="contact_redirect_title"><?php the_sub_field('contact_redirect_title'); ?></h2>
                    <svg class="arrow">
                        <use xlink:href="#arrow"></use>
                    </svg>
                </div>
                <?php
                $button = get_sub_field('contact_redirect_button');
                if ($button): ?>
                    <a href="<?php echo esc_url($button['url']); ?>"
                       target="<?php echo esc_attr($button['target'] ?: '_self'); ?>"
                       class="contact_redirect_button">
                        <?php echo esc_html($button['title']); ?>
                    </a>
                <?php endif; ?>
            </section>
        <?php endif; ?>
    <?php endwhile; else: ?>
    <p>Ce projet n’existe pas encore&hellip;</p>
<?php endif; ?>
<?php get_footer(); ?>