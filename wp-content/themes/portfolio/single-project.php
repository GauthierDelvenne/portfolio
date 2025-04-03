<?php get_header(); ?>
<?php if (have_rows('projet')): ?>
    <?php while (have_rows('projet')) : the_row(); ?>
        <?php if (get_row_layout() == 'single_projet'): ?>
            <section class="single_projet">
                <h2 class="single_projet_title"><?php the_sub_field('single_projet_title'); ?></h2>
                <figure class="single_projet_img"></figure>
                <?php if (have_rows('single_projet_content')): ?>
                    <?php while (have_rows('single_projet_content')) : the_row(); ?>
                        <div class="single_projet_content">
                            <p class="single_projet_title"><?php the_sub_field('single_projet_title'); ?></p>
                            <?php if (get_sub_field('single_projet_texte')): ?>
                                <p class="single_projet_text"><?php the_sub_field('single_projet_texte'); ?></p>
                            <?php endif; ?>
                            <?php if (get_sub_field('single_projet_fig')): ?>
                                <figure class="single_projet_fig"><?php the_sub_field('single_projet_fig'); ?></figure>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </section>
        <?php endif; ?>

        <?php if (get_row_layout() == 'contact_redirect'): ?>
            <section class="contact_redirect">
                <h2 class="contact_redirect_title"><?php the_sub_field('contact_redirect_title'); ?></h2>
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