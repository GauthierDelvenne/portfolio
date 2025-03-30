</main>
<footer class="footer">
    <nav class="footer_nav">
        <h2 class="footer_title">Navigation</h2>
        <ul class="footer_nav_container">
            <?php foreach (dw_get_navigation_links('footer') as $link): ?>
                <li class="nav_item">
                    <a href="<?= $link->href; ?>" class="nav_link"><?= $link->label; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <section class="contact_details">
        <ul class="list">
            <li class="list_item">+32 497 54 69 43</li>
            <li class="list_item">gauthier.delvenne@student.hepl.be</li>
            <li class="list_item">Cours d’Omalius</li>
            <li class="list_item">4160 Anthisnes</li>
        </ul>
    </section>
    <section class="networks">
        <ul class="list">
            <li class="list_item">Github</li>
            <li class="list_item">Linkedin</li>
        </ul>
    </section>
    <?php wp_footer(); ?>
</footer>
</body>
</html>