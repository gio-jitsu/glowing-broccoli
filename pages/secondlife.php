<?php
require_once __DIR__ . '/../includes/config.php';
$page_title = 'SecondLife — ' . $site['name'];
$base = $site['base_url'];

// Foto ambient (riusate per hero + marquee)
$sl_ambient = [
    'img/second_life/img_1 (1).jpeg',
    'img/second_life/img_1 (2).jpeg',
    'img/second_life/img_1 (3).jpeg',
    'img/second_life/img_1 (4).jpeg',
];
$sl_url = fn($p) => $base . '/' . str_replace(' ', '%20', $p);
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SecondLife — bottega del riuso de Il Pane e le Rose, Alessandria. Abiti, libri, oggetti e arredi recuperati a prezzi popolari.">
    <title><?= htmlspecialchars($page_title) ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,700;9..144,900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= $base ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= $base ?>/assets/css/secondlife.css">
</head>
<body>

<a class="skip-link" href="#main">Salta al contenuto</a>

<main id="main" class="sl-page">

    <!-- HERO -->
    <section class="sl-hero">
        <div class="sl-hero-img" style="background-image: url('<?= $sl_url($sl_ambient[0]) ?>');" aria-hidden="true"></div>
        <div class="sl-hero-grain" aria-hidden="true"></div>
        <div class="sl-hero-inner">
            <p class="sl-hero-eyebrow">Bottega del riuso · Alessandria</p>
            <h1>Second<span class="sl-accent">Life</span></h1>
            <p class="sl-hero-lead">
                Una vetrina di cose che tornano a vivere. Abiti, libri, oggetti
                e arredi recuperati, scelti uno per uno, in vendita a prezzi popolari.
            </p>
        </div>
        <p class="sl-hero-scroll" aria-hidden="true">↓ scorri</p>
    </section>

    <div class="sl-stripe" aria-hidden="true"></div>

    <!-- N°01 — LA BOTTEGA -->
    <section class="sl-section" id="bottega">
        <div class="sl-section-num" aria-hidden="true">N°01</div>
        <div class="sl-container">
            <header class="sl-section-head">
                <p class="sl-section-eyebrow">Il luogo</p>
                <h2>La Bottega</h2>
                <p>
                    Uno spazio post-industriale nel cuore di Alessandria: scaffali
                    gialli costruiti a mano, soffitti di cemento, segnali rossi che
                    accompagnano lo sguardo. Un magazzino vivo dove ogni cosa ha
                    già avuto una storia.
                </p>
            </header>
        </div>
        <div class="sl-marquee" aria-label="Galleria fotografica della bottega">
            <div class="sl-marquee-track">
                <?php
                for ($pass = 0; $pass < 2; $pass++):
                    foreach ($sl_ambient as $i => $img): ?>
                        <div class="sl-marquee-item">
                            <img src="<?= $sl_url($img) ?>" alt="<?= $pass === 0 ? 'Bottega SecondLife — scatto ' . ($i + 1) : '' ?>" <?= $pass === 0 ? '' : 'aria-hidden="true"' ?>>
                        </div>
                    <?php endforeach;
                endfor; ?>
            </div>
        </div>
    </section>

    <div class="sl-stripe sl-stripe--thin" aria-hidden="true"></div>

    <!-- N°02 — IN VETRINA -->
    <section class="sl-section" id="vetrina">
        <div class="sl-section-num" aria-hidden="true">N°02</div>
        <div class="sl-container">
            <header class="sl-section-head">
                <p class="sl-section-eyebrow">Catalogo del riuso</p>
                <h2>In Vetrina</h2>
                <p>
                    Una selezione di quello che troverai oggi nella bottega.
                    I pezzi cambiano spesso — vieni a vedere di persona, ogni
                    visita è diversa.
                </p>
            </header>

            <div class="sl-shelf">
                <?php foreach ($prodotti_secondlife as $p): ?>
                    <article class="sl-cell">
                        <?php if (!empty($p['foto'])): ?>
                            <div class="sl-cell-photo" style="background-image: url('<?= $base . '/' . str_replace(' ', '%20', $p['foto']) ?>');" aria-hidden="true"></div>
                            <div class="sl-cell-overlay" aria-hidden="true"></div>
                        <?php else: ?>
                            <div class="sl-cell-photo sl-cell-photo--empty" aria-hidden="true"></div>
                        <?php endif; ?>

                        <div class="sl-cell-info">
                            <div class="sl-cell-meta">
                                <span class="sl-cell-cat"><?= htmlspecialchars($p['categoria']) ?></span>
                                <p class="sl-cell-name"><?= htmlspecialchars($p['nome']) ?></p>
                            </div>
                            <div class="sl-tag" aria-label="Prezzo <?= (int)$p['prezzo'] ?> euro, lotto <?= htmlspecialchars($p['lotto']) ?>">
                                <span class="sl-tag-price"><?= (int)$p['prezzo'] ?>€</span>
                                <span class="sl-tag-lot">LOT · <?= htmlspecialchars($p['lotto']) ?></span>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <div class="sl-stripe" aria-hidden="true"></div>

    <!-- N°03 — VIENI A TROVARCI -->
    <section class="sl-section" id="vieni">
        <div class="sl-section-num" aria-hidden="true">N°03</div>
        <div class="sl-container">
            <header class="sl-section-head">
                <p class="sl-section-eyebrow">Contatti</p>
                <h2>Vieni a Trovarci</h2>
                <p>
                    La bottega è il posto giusto per scoprire i pezzi:
                    vieni, guarda, prova. Niente carrello online —
                    qui si fa di persona.
                </p>
            </header>

            <div class="sl-visit">
                <div class="sl-visit-info">
                    <ul class="sl-visit-meta">
                        <li>
                            <span class="sl-meta-label">Indirizzo</span>
                            <span class="sl-meta-val">Via — da definire,<br>Alessandria</span>
                        </li>
                        <li>
                            <span class="sl-meta-label">Orari</span>
                            <span class="sl-meta-val">Mar — Sab<br>15:30 – 19:30</span>
                        </li>
                        <li>
                            <span class="sl-meta-label">Telefono</span>
                            <span class="sl-meta-val">— da definire —</span>
                        </li>
                        <li>
                            <span class="sl-meta-label">Email</span>
                            <span class="sl-meta-val"><a href="mailto:<?= $site['email'] ?>" style="color:inherit"><?= $site['email'] ?></a></span>
                        </li>
                    </ul>
                </div>

                <aside class="sl-visit-side">
                    <h3>Porti tu qualcosa?</h3>
                    <p>
                        Accettiamo donazioni di abiti, libri, oggetti e piccoli
                        arredi in buone condizioni. Scrivici prima di passare,
                        così troviamo lo spazio giusto.
                    </p>
                    <a href="mailto:<?= $site['email'] ?>?subject=Donazione%20SecondLife" class="sl-btn">Scrivici</a>
                </aside>
            </div>

            <a href="<?= $base ?>/" class="sl-back">← Torna alla home</a>
        </div>
    </section>

</main>

</body>
</html>
