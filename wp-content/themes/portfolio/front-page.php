<?php get_header(); ?>
<?php if (have_rows('presentation')): ?>
    <?php while (have_rows('presentation')) : the_row(); ?>
        <?php if (get_row_layout() == 'presentation_me'): ?>
            <section class="presentation">
            <h2 class="hidden">Présentation de ma personne</h2>
            <div class="presentation_me">
                <figure class="presentation_fig">
                    <!--ajouter l'image-->
                </figure>
                <p class="presentation_firstname"><?php the_sub_field('presentation_firstname'); ?></p>
                <p class="presentation_lastname"><?php the_sub_field('presentation_lastname'); ?></p>
                <p class="presentation_profession"><?php the_sub_field('presentation_profession'); ?></p>
            </div>
        <?php elseif (get_row_layout() == 'presentation_about'): ?>
            <div class="presentation_about">
                <p class="presentation_about_description"><?php the_sub_field('presentation_description'); ?></p>
                <div class="presentation_about_illustration">
                    <p lang="en"><?php the_sub_field('presentation_context_message'); ?></p>
                </div>
            </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php if (have_rows('discover')): ?>
    <?php while (have_rows('discover')) : the_row(); ?>
        <?php if (get_row_layout() == 'discover_content'): ?>
    <section class="discover">
        <div class="discover_content">
            <h2><?php the_sub_field('discover_title_h2'); ?></h2>
            <p><?php the_sub_field('discover_content'); ?></p>
        </div>

        <div class="discover_projects">
        <?php elseif (get_row_layout() == 'discover_project'): ?>
            <article class="discover_project">
                <h3><?php the_sub_field('discover_title_h3'); ?></h3>
                <figure class="discover_fig">
                    <!--ajouter l'image-->
                </figure>
            </article>
        <?php elseif (get_row_layout() == 'discover_project_2'): ?>
            <article class="discover_project">
                <h3 lang="la"><?php the_sub_field('discover_title_h3'); ?></h3>
                <figure class="discover_fig">
                    <!--ajouter l'image-->
                </figure>

            </article>
        </div>
    </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>