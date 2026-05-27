<?php
require_once __DIR__ . '/config.php';
$page_title = $page_title ?? $site['name'] . ' — ' . $site['tagline'];
$base = $site['base_url'];
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Il Pane e le Rose: cooperativa sociale di tipo B e di inserimento lavorativo. Agricoltura, ristorazione, commercio etico. Dal 1987.">
    <title><?= htmlspecialchars($page_title) ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,700;9..144,900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
    <?php if (!empty($extra_css)): foreach ((array)$extra_css as $css): ?>
    <link rel="stylesheet" href="<?= $base ?>/assets/css/<?= htmlspecialchars($css) ?>">
    <?php endforeach; endif; ?>
</head>
<body>
<a class="skip-link" href="#main">Salta al contenuto</a>

<header class="site-header" id="siteHeader">
    <div class="container header-inner">
        <a href="<?= $base ?>/" class="brand" aria-label="Home — Il Pane e le Rose">
            <span class="brand-mark" aria-hidden="true">
                <svg viewBox="0 0 48 48" width="44" height="44">
                    <circle cx="24" cy="24" r="22" fill="#FAF6F0" stroke="#C8923D" stroke-width="2"/>
                    <path d="M16 32 Q24 14 32 32" stroke="#C8923D" stroke-width="2.2" fill="none" stroke-linecap="round"/>
                    <path d="M20 28 L20 22 M24 30 L24 18 M28 28 L28 22" stroke="#C8923D" stroke-width="1.6" stroke-linecap="round"/>
                    <circle cx="34" cy="16" r="3.5" fill="#B83A4B"/>
                    <circle cx="34" cy="16" r="1.6" fill="#FAF6F0"/>
                </svg>
            </span>
            <span class="brand-text">
                <strong>Il Pane e le Rose</strong>
                <em>Cooperativa Sociale Onlus</em>
            </span>
        </a>

        <button class="nav-toggle" id="navToggle" aria-expanded="false" aria-controls="primaryNav" aria-label="Apri menù">
            <span></span><span></span><span></span>
        </button>

        <nav class="primary-nav" id="primaryNav" aria-label="Navigazione principale">
            <ul>
                <?php foreach ($nav as $id => $label): ?>
                    <li><a href="#<?= $id ?>"><?= htmlspecialchars($label) ?></a></li>
                <?php endforeach; ?>
            </ul>

            <div class="a11y-controls" role="group" aria-label="Strumenti di accessibilità">
                <button type="button" class="a11y-btn" data-action="font-down" aria-label="Riduci testo">A−</button>
                <button type="button" class="a11y-btn" data-action="font-up" aria-label="Ingrandisci testo">A+</button>
                <button type="button" class="a11y-btn" data-action="contrast" aria-label="Contrasto elevato">◐</button>
            </div>
        </nav>
    </div>
</header>
