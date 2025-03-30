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
    <?php wp_head(); ?>

</head>
<body>
<header>
    <h1 class="hidden"><?= get_bloginfo('name') ?></h1>
    <nav class="nav">
        <h2 class="hidden">Navigation principal</h2>
        <ul class="nav__container">
            <?php foreach (dw_get_navigation_links('header') as $link): ?>
                <li class="nav__item">
                    <a href="<?= $link->href; ?>" class="nav__link"><?= $link->label; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>
<main>

