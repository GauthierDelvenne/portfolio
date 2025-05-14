<?php
function ajouter_schema_portfolio(): void
{
    if (is_front_page() || is_home()) {
        ?>
        <script type="application/ld+json">
            {
              "@context": "https://schema.org",
              "@type": "Person",
              "name": "Gauthier Delvenne",
              "url": "<?php echo esc_url(home_url()); ?>",
              "logo": "<?php echo get_template_directory_uri(); ?>/resources/img/black-mascotte.svg",
          "jobTitle": "Designer / Développeur Web",
          "image": "https://portfolio.gauthier-delvenne.be/wp-content/uploads/2025/04/picture-me.webp",
          "description": "Portfolio de Gauthier Delvenne, designer et développeur web basé en Belgique.",
          "sameAs": [
            "https://www.linkedin.com/in/gauthier-delvenne",
            "https://github.com/GauthierDelvenne"
          ],
          "worksFor": {
            "@type": "Organization",
            "name": "Haute École de la Province de Liège"
          }
        }
        </script>
        <?php
    }
}
add_action('wp_head', 'ajouter_schema_portfolio');
