<?php /* Template Name: Template "Liste des projets" */ ?>
<?php get_header(); ?>
<?php if (have_rows('project')): ?>
    <?php while (have_rows('project')) : the_row(); ?>
        <?php if (get_row_layout() == 'project_list'): ?>
            <section class="project_list">
                <h2 class="project_list_title"><?php the_sub_field('project_list_title'); ?></h2>
                <div class="project_list_filtre_container">
                    <p class="project_list_filtre_title"><?php the_sub_field('project_list_filtre_title'); ?></p>
                    <?php if (have_rows('project_list_filtre_choices')): ?>
                        <ul class="project_list_filtre_choices">
                            <?php while (have_rows('project_list_filtre_choices')) : the_row(); ?>
                                <li><?php the_sub_field('project_list_filtre_choice'); ?></li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="projects_container">
                    <?php if (have_rows('projects')): ?>
                        <?php while (have_rows('projects')) : the_row(); ?>
                            <article class="project">
                                <h3 class="project_title"><?php the_sub_field('projects_title'); ?></h3>
                                <figure class="project_img"><?php the_sub_field('projects_img'); ?></figure>
                            </article>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="project_page_container">
                    <?php if (have_rows('project_pages')): ?>
                        <ul class="project_pages">
                            <?php while (have_rows('project_pages')) : the_row(); ?>
                                <li><?php the_sub_field('project_page'); ?></li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>
        <?php if (get_row_layout() == 'presentation_redirect'): ?>
            <section class="presentation_redirect">
                <h2 class="presentation_redirect_title"><?php the_sub_field('presentation_redirect_title'); ?></h2>
                <?php
                $button = get_sub_field('presentation_redirect_link');
                if ($button): ?>
                    <a href="<?php echo esc_url($button['url']); ?>"
                       target="<?php echo esc_attr($button['target'] ?: '_self'); ?>"
                       class="presentation_redirect_link">
                        <?php echo esc_html($button['title']); ?>
                    </a>
                <?php endif; ?>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>

