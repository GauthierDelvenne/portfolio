<?php /* Template Name: Template "Qui suis-je" */ ?>
<?php get_header(); ?>
<?php if (have_rows('about')): ?>
    <?php while (have_rows('about')) : the_row(); ?>
        <?php if (get_row_layout() == 'about_me'): ?>
            <section class="about_me">
                <h2 class="hidden">À propos de moi</h2>
                <?= responsive_image(get_sub_field('about_me_img'), ['lazy' => 'true', 'classes' => 'stage__image']) ?>
                <div class="about_me_content">
                    <p><?php the_sub_field('about_me_lastname'); ?></p>
                    <p><?php the_sub_field('about_me_job'); ?></p>
                    <p><?php the_sub_field('about_me_presentation'); ?></p>
                </div>
            </section>
        <?php endif; ?>
        <?php if (get_row_layout() == 'about_skill'): ?>
            <section class="about_skill">
                <h2><?php the_sub_field('about_skill_titre'); ?></h2>
                <?php if (have_rows('skills')): ?>
                    <ul class="skills">
                        <?php while (have_rows('skills')) : the_row(); ?>
                            <li class="skill_name">
                                <?php the_sub_field('skill_name'); ?>
                                <div class="skill_rating" data-score="<?php echo get_sub_field('skill_level'); ?>"
                                >
                                    <p class="hidden"></p>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </section>
        <?php endif; ?>
        <?php if (get_row_layout() == 'about_asset'): ?>
            <section class="about_asset">
                <h2 class="about_asset_title"><?php the_sub_field('about_asset_title'); ?></h2>
                <?php if (have_rows('assets')): ?>
                    <?php while (have_rows('assets')) : the_row(); ?>
                        <article>
                            <h3 class="hidden"><?php the_sub_field('about_asset_article_title'); ?></h3>
                            <?= responsive_image(get_sub_field('about_asset_img'), ['lazy' => 'true', 'classes' => 'stage__image']) ?>
                            <p class="about_asset_content"><?php the_sub_field('about_asset_content'); ?></p>
                        </article>
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
                       target="<?php echo esc_attr($button['target'] ?: '_self'); ?>" class="contact_redirect_button">
                        <?php echo esc_html($button['title']); ?>
                    </a>
                <?php endif; ?>
            </section>
        <?php endif; ?>
        <?php if (get_row_layout() == 'project_redirect'): ?>
            <section class="project_redirect">
                <h2 class="project_redirect_title"><?php the_sub_field('project_redirect_title'); ?></h2>
                <?php
                $button = get_sub_field('project_redirect_button');
                if ($button): ?>
                    <a href="<?php echo esc_url($button['url']); ?>"
                       target="<?php echo esc_attr($button['target'] ?: '_self'); ?>" class="project_redirect_button">
                        <?php echo esc_html($button['title']); ?>
                    </a>
                <?php endif; ?>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>