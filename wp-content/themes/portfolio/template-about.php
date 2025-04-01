<?php /* Template Name: Template "Qui suis-je" */ ?>
<?php get_header(); ?>
<?php if (have_rows('about')): ?>
    <?php while (have_rows('about')) : the_row(); ?>
        <?php if (get_row_layout() == 'about_me'): ?>
            <section class="about_me">
                <h2 class="about_me_title"></h2>
                <figure class="about_me_fig"><?php the_sub_field('about_me_img'); ?></figure>
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
                                <div class="skill_rating" data-score="<?php the_sub_field('skill_level'); ?>">
                                    <p class="hidden"></p>
                                </div>
                            </li>
                        <?php endwhile; ?>

                    </ul>
                <?php endif; ?>
            </section>
        <?php endif; ?>

        <!--    continuer avec les assets-->
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>