<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
          content="Site présentant le portfolio de Delvenne Gauthier, au travers de ses compétences et ses projets">
    <meta name="author" content="Delvenne Gauthier">
    <meta name="keywords" content="Portfolio, Delvenne Gauthier,portfolio gauthier delvenne, compétence, projets, travaux, HEPL, web, design">
    <meta name="robots" content="index, follow">
    <title><?= wp_title('·', false, 'right') . get_bloginfo('name') ?></title>
    <link rel="stylesheet" type="text/css" href="<?= portfolio_asset('css'); ?>">
    <link rel="icon"
          type="image/png"
          sizes="32x32"
          href="/wp-content/themes/portfolio/resources/img/mascotte.png">
    <script src="<?= portfolio_asset('js') ?>" defer></script>

    <?php wp_head(); ?>
    <link rel="preload" href="/wp-content/themes/portfolio/resources/fonts/Nextir Brush.otf" as="font" type="font/otf" crossorigin>
    <link rel="preload" href="/wp-content/themes/portfolio/resources/fonts/Jura-VariableFont_wght.ttf" as="font" type="font/ttf" crossorigin>


    <meta name="google-site-verification" content="HP1zfJTbU92EEcrBfxidMypZXkJBQa3QOIiaBUc_X5g" />
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
            <h2 aria-level="2" class="hidden"><?=__hepl('Navigation principal');?></h2>
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
        <a href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>">
            <span class="hidden"><?=__hepl('Retourner à la page d’accueil');?></span>
            <svg class="headerSvg">
                <use xlink:href="#headerSvg"></use>
            </svg>
        </a>
    </div>

    <div class="languages hoverCursor">
        <ul class="languages__container">
            <?php foreach (pll_the_languages(['raw' => true]) as $lang): ?>
                <?php if (!$lang['current_lang']):?>
                    <li class="languages__item">
                        <a href="<?= $lang['url'] ?>" lang="<?= $lang['locale'] ?>" hreflang="<?= $lang['locale'] ?>"
                           class="languages__link"><?= strtoupper(substr($lang['locale'], 0, 2))?></a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</header>
<main>

