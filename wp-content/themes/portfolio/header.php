<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
          content="Site présentant le portfolio de Delvenne Gauthier, au travers de ses compétences et ses projets">
    <meta name="author" content="Delvenne Gauthier">
    <meta name="keywords" content="Portfolio, Delvenne Gauthier, compétence, projets, travaux, HEPL, web, design">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <title><?= wp_title('·', false, 'right') . get_bloginfo('name') ?></title>
    <link rel="stylesheet" type="text/css" href="<?= portfolio_asset('css'); ?>">
    <link rel="icon"
          type="image/png"
          sizes="32x32"
          href="/wp-content/themes/portfolio/resources/img/mascotte.png">
    <script src="<?= portfolio_asset('js') ?>" defer></script>
    <?php wp_head(); ?>

</head>
<body>
<?php
require __DIR__ . '/resources/svg/spriteSVG.php'
?>
<header class="header">
    <h1 class="hidden"><?= get_bloginfo('name') ?></h1>
    <div class="header_button_menu">
        <input class="menu" type="checkbox" id="menu" aria-controls="navigation">
        <label for="menu" aria-label="Ouvrir le menu"><span></span></label>
        <nav id="navigation" class="header_nav" role="navigation" aria-label="Menu principal">
            <h2 class="hidden">Navigation principal</h2>
            <ul class="nav_container">
                <?php foreach (dw_get_navigation_links('header') as $link): ?>
                    <li class="nav_item">
                        <a href="<?= $link->href; ?>" class="nav__link"><?= $link->label; ?> </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
    <div class="header_svg_content">
        <a href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>">
            <span class="hidden">Retourner à la page d’accueil</span>
            <svg class="headerSvg">
                <use xlink:href="#headerSvg"></use>
            </svg>
        </a>
    </div>

    <p class="header_lang"><abbr title="English">EN</abbr></p>
</header>
<main>

