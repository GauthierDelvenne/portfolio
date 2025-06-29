<!doctype html>
<html lang="<?= __hepl('fr') ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
          content="<?= __hepl('Site présentant le portfolio de Delvenne Gauthier, au travers de ses compétences et ses projets') ?>">
    <meta name="author" content="Delvenne Gauthier">
    <meta name="keywords"
          content="Delvenne Gauthier Portfolio, Portfolio, Delvenne Gauthier, Gauthier, Delvenne, <?= __hepl('compétence') ?>, <?= __hepl('projets') ?>, <?= __hepl('travaux') ?>, HEPL, web, design">
    <meta name="robots" content="index, follow">
    <title><?= wp_title('·', false, 'right') . get_bloginfo('name') ?></title>
    <meta property="og:title" content="Portfolio de Gauthier Delvenne"/>
    <meta property="og:description" content="Découvrez mes projets et compétences en design et développement web."/>
    <meta property="og:image"
          content="https://portfolio.gauthier-delvenne.be/wp-content/uploads/2025/04/picture-me.webp"/>
    <meta property="og:url" content="https://portfolio.gauthier-delvenne.be/"/>
    <link rel="stylesheet" type="text/css" href="<?= portfolio_asset('css'); ?>">
    <link rel="icon" type="image/png" href="/wp-content/themes/portfolio/resources/svg/favicon/favicon-96x96.png"
          sizes="96x96"/>
    <link rel="icon" type="image/svg+xml" href="/wp-content/themes/portfolio/resources/svg/favicon/favicon.svg"/>
    <link rel="shortcut icon" href="/wp-content/themes/portfolio/resources/svg/favicon/favicon.ico"/>
    <link rel="apple-touch-icon" sizes="180x180"
          href="/wp-content/themes/portfolio/resources/svg/favicon/apple-touch-icon.png"/>
    <meta name="apple-mobile-web-app-title" content="Portfolio"/>
    <link rel="manifest" href="/wp-content/themes/portfolio/resources/svg/favicon/site.webmanifest"/>
    <?php wp_head(); ?>


    <meta name="google-site-verification" content="HP1zfJTbU92EEcrBfxidMypZXkJBQa3QOIiaBUc_X5g"/>
</head>
<body>
<?php
require __DIR__ . '/resources/svg/spriteSVG.php'
?>
<header class="header">
    <h1 aria-level="1" class="hidden"><?= get_bloginfo('name') ?></h1>
    <div class="header_button_menu">
        <input class="menu" type="checkbox" id="menu" aria-controls="navigation">
        <label class="hoverCursor" for="menu"><span></span></label>
        <nav id="navigation" class="header_nav" aria-label="Menu principal">
            <h2 aria-level="2" class="hidden"><?= __hepl('Navigation principal'); ?></h2>
            <ul class="nav_container">
                <?php foreach (dw_get_navigation_links('header') as $link): ?>
                    <li class="nav_item">
                        <a class="hoverCursor" href="<?= $link->href; ?>" class="nav__link"><?= $link->label; ?> </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
    <div class="header_svg_content hoverCursor">
        <a href="<?= __hepl('https://portfolio.gauthier-delvenne.be') ?>">
            <span class="hidden"><?= __hepl('Retourner à la page d’accueil'); ?></span>
            <svg class="headerSvg">
                <use xlink:href="#headerSvg"></use>
            </svg>
        </a>
    </div>

    <div class="languages hoverCursor">
        <ul class="languages__container">
            <?php foreach (pll_the_languages(['raw' => true]) as $lang): ?>
                <?php if (!$lang['current_lang']): ?>
                    <li class="languages__item">
                        <a href="<?= $lang['url'] ?>" lang="<?= $lang['locale'] ?>" hreflang="<?= $lang['locale'] ?>"
                           class="languages__link"><?= strtoupper(substr($lang['locale'], 0, 2)) ?></a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</header>
<main>

