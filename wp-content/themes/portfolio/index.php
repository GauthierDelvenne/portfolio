<?php

if(have_posts()): while(have_posts()): the_post(); ?>

    <h2><?= get_the_title(); ?></h2>

    <div><?= get_the_content(); ?></div>

<?php
endwhile; else: ?>
    <p><?=__hepl('La page est vide')?>.</p>
<?php endif; ?>