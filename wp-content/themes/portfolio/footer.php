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
        <ul></ul>
    </section>
    <section class="networks">
        <ul></ul>
    </section>
    <?php wp_footer(); ?>
</footer>
</body>
</html>