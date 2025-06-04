</main>
<div class="separator">
</div>
<footer class="footer">
    <nav class="footer_nav" aria-label="Navigation secondaire">
        <h2 aria-level="2" class="footer_nav_title"><?=__hepl('Navigation');?></h2>
        <ul class="footer_nav_container">
            <?php foreach (dw_get_navigation_links('footer') as $link): ?>
                <li class="nav_item">
                    <a href="<?= $link->href; ?>" class="nav_link hoverCursor"><?= $link->label; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <section class="networks" aria-labelledby="footer-networks-title">
        <h2 aria-level="2" id="footer-networks-title" class="footer_title"><?=__hepl('Réseaux');?></h2>

        <ul class="list">
            <li class="list_item"><a class="hoverCursor" rel="noopener noreferrer" target="_blank" href="https://github.com/GauthierDelvenne">Github</a></li>
            <li class="list_item"><a class="hoverCursor" rel="noopener noreferrer" target="_blank" href="https://linkedin.com/in/gauthier-delvenne">Linkedin</a></li>
        </ul>
    </section>
    <section class="contact_details" aria-labelledby="footer-contact-title">
        <h2 aria-level="2" id="footer-contact-title" class="footer_title"><?=__hepl('Coordonnées');?></h2>

        <ul class="list" itemscope itemtype="http://schema.org/Person">
            <li class="list_item" itemprop="telephone"><a class="hoverCursor" href="tel:32497546943">+32 497 54 69 43</a></li>
            <li class="list_item" itemprop="email"><a class="hoverCursor" href="mailto:gauthier.delvenne@student.hepl.be">gauthier.delvenne@student.hepl.be</a></li>
            <li class="list_item" itemprop="address">Cours d’Omalius</li>
            <li class="list_item">
        <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
            <span itemprop="streetAddress">4160 Anthisnes</span>
        </span>
            </li>
        </ul>
    </section>

    <?php wp_footer(); ?>
</footer>
</body>
</html>