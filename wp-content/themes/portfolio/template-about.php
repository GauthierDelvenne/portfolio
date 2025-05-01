<?php /* Template Name: Template "Qui suis-je" */ ?>
<?php get_header(); ?>
<?php if (have_rows('about')): ?>
    <?php while (have_rows('about')) : the_row(); ?>
        <?php if (get_row_layout() == 'about_me'): ?>
            <section class="about_me" aria-labelledby="about-me-title" itemscope itemtype="http://schema.org/Person">
                <svg class="bigCloud">
                    <use xlink:href="#bigCloud"></use>
                </svg>
                <svg class="rightCloud">
                    <use xlink:href="#rightCloud"></use>
                </svg>
                <h2 aria-level="2" class="hidden" id="about-me-title">À propos de moi</h2>
                <div class="border_img">
                    <?= responsive_image(get_sub_field('about_me_img'), ['lazy' => 'lazy', 'classes' => 'stage__image']) ?>
                    <svg class="border">
                        <use xlink:href="#border"></use>
                    </svg>
                </div>
                <div class="about_me_content">
                    <p>
                        <svg class="icon">
                            <use xlink:href="#icon"></use>
                        </svg>
                        <span itemprop="familyName"><?php the_sub_field('about_me_lastname'); ?> </span>
                        <span itemprop="givenName"> <?php the_sub_field('about_me_firstname'); ?></span>
                    </p>
                    <p itemprop="jobTitle"><?php the_sub_field('about_me_job'); ?></p>
                    <p itemprop="description"><?php the_sub_field('about_me_presentation'); ?></p>
                </div>
            </section>
        <?php endif; ?>
        <?php if (get_row_layout() == 'about_skill'): ?>
            <section class="about_skill" aria-labelledby="skills-title">
                <div class="about_skill_title">
                    <h2 aria-level="2" id="skills-title"><?php the_sub_field('about_skill_titre'); ?></h2>
                    <svg class="underline">
                        <use xlink:href="#underline"></use>
                    </svg>
                    <svg class="bigCloud">
                        <use xlink:href="#bigCloud"></use>
                    </svg>
                </div>
                <?php if (have_rows('skills')): ?>
                    <div class="skills-container">
                        <svg class="border2">
                            <use xlink:href="#border2"></use>
                        </svg>
                        <ul class="skills" aria-label="Liste de mes compétences">
                            <?php while (have_rows('skills')) : the_row(); ?>
                                <li class="skill_name">
                                    <svg class="round">
                                        <use xlink:href="#round"></use>
                                    </svg>
                                    <?php the_sub_field('skill_name'); ?>
                                    <div class="skill_rating" data-score="<?php echo get_sub_field('skill_level'); ?>">
                                        <p class="hidden"></p>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </section>
        <?php endif; ?>
        <?php if (get_row_layout() == 'about_asset'): ?>
            <section class="about_asset" aria-labelledby="asset-title">
                <div class="about_asset_title">
                    <h2 aria-level="2" id="asset-title"><?php the_sub_field('about_asset_title'); ?></h2>
                    <svg class="underline">
                        <use xlink:href="#underline"></use>
                    </svg>
                    <svg class="middleCloud">
                        <use xlink:href="#middleCloud"></use>
                    </svg>
                    <svg class="bubbles">
                        <use xlink:href="#bubbles"></use>
                    </svg>
                </div>
                <div class="about_asset_articles">
                    <?php if (have_rows('assets')): ?>
                        <?php while (have_rows('assets')) : the_row(); ?>
                            <article>
                                <svg class="border3">
                                    <use xlink:href="#border3"></use>
                                </svg>
                                <h3 aria-level="3"
                                    class="hidden"><?php the_sub_field('about_asset_article_title'); ?></h3>
                                <div class="asset_container">
                                    <?= responsive_image(get_sub_field('about_asset_img'), ['lazy' => 'lazy', 'classes' => 'stage__image']) ?>
                                    <svg class="backgroundAtout">
                                        <use xlink:href="#backgroundAtout"></use>
                                    </svg>
                                </div>
                                <p class="about_asset_content"><?php the_sub_field('about_asset_content'); ?></p>
                            </article>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>
        <?php if (get_row_layout() == 'contact_redirect'): ?>
            <section class="contact_redirect" aria-labelledby="contact-title">
                <div class="contact_redirect_container">
                    <h2 aria-level="2" class="contact_redirect_title"
                        id="contact-title"><?php the_sub_field('contact_redirect_title'); ?></h2>
                    <svg class="arrow">
                        <use xlink:href="#arrow"></use>
                    </svg>
                </div>
                <?php
                $button = get_sub_field('contact_redirect_button');
                if ($button): ?>
                    <a href="<?php echo esc_url($button['url']); ?>"
                       target="<?php echo esc_attr($button['target'] ?: '_self'); ?>" class="contact_redirect_button"
                       aria-label="Aller vers la page : <?= esc_html($button['title']); ?>">
                        <?php echo esc_html($button['title']); ?>
                    </a>
                <?php endif; ?>
            </section>
        <?php endif; ?>
        <?php if (get_row_layout() == 'project_redirect'): ?>
            <section class="project_redirect" aria-labelledby="project-redirect-title">
                <h2 aria-level="2" class="project_redirect_title"
                    id="project-redirect-title"><?php the_sub_field('project_redirect_title'); ?></h2>
                <?php
                $button = get_sub_field('project_redirect_button');
                if ($button): ?>
                    <a href="<?php echo esc_url($button['url']); ?>"
                       target="<?php echo esc_attr($button['target'] ?: '_self'); ?>" class="project_redirect_button"
                       aria-label="Voir mes projets : <?= esc_html($button['title']); ?>">
                        <?php echo esc_html($button['title']); ?>
                    </a>
                <?php endif; ?>
            </section>
        <?php endif; ?>
    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>