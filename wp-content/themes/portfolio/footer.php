</main>
<footer>
    <?php wp_nav_menu([
        'theme_location' => 'footer',
        'container' => 'nav',
    ]); ?>
    <p>© <?= get_bloginfo('name'); ?></p>

    <?php wp_footer(); ?>
</footer>
</body>
</html>