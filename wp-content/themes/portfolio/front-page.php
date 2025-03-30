<?php get_header(); ?>
<?php if (have_rows('presentation')): ?>
    <?php while (have_rows('presentation')) : the_row(); ?>
        <?php if (get_row_layout() == 'presentation_me'): ?>
            <section class="presentation">
            <h2 class="hidden">Présentation de ma personne</h2>
            <div class="presentation_me">
                <figure class="presentation_fig">

                </figure>
                <p class="presentation_firstname"><?php the_sub_field('firstname'); ?></p>
                <p class="presentation_lastname"><?php the_sub_field('lastname'); ?></p>
                <p class="presentation_profession"><?php the_sub_field('profession'); ?></p>
            </div>
        <?php elseif (get_row_layout() == 'presentation_about'): ?>
            <div class="presentation_about">
                <p class="presentation_about_description"><?php the_sub_field('description'); ?></p>
                <div class="presentation_about_illustration">
                    <p lang="en"><?php the_sub_field('context_message'); ?></p>
                </div>
            </div>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>