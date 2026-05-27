<?php
require_once __DIR__ . '/includes/config.php';
$page_title = $site['name'] . ' — ' . $site['tagline'];
include __DIR__ . '/includes/header.php';
?>

<main id="main">

    <!-- HERO -->
    <section class="hero">
        <div class="hero-bg" aria-hidden="true"></div>
        <div class="container hero-inner">
            <div class="hero-content reveal">
                <p class="eyebrow">Cooperativa Sociale Onlus · dal 1987</p>
                <h1>Il <span class="accent-gold">Pane</span> e le <span class="accent-rose">Rose</span></h1>
                <p class="lead">
                    Lavoro equo e dignità per le persone più fragili. Una piccola cooperativa
                    agricola di Tipo B che da oltre trent'anni costruisce comunità tra
                    Alessandria e Genova.
                </p>
                <div class="hero-actions">
                    <a href="#cosa-facciamo" class="btn btn-gold">Scopri cosa facciamo</a>
                    <a href="#contatti" class="btn btn-ghost">Sostienici</a>
                </div>
                <ul class="hero-stats">
                    <li><strong>1987</strong><span>fondazione</span></li>
                    <li><strong>6</strong><span>sedi operative</span></li>
                    <li><strong>~12</strong><span>soci lavoratori</span></li>
                    <li><strong>15+</strong><span>anni di reti urbane</span></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- CHI SIAMO -->
    <section class="section" id="chi-siamo">
        <div class="container two-col">
            <div class="col-text reveal">
                <p class="section-eyebrow">Chi siamo</p>
                <h2>Una cooperativa nata per il bene comune</h2>
                <p>
                    La Cooperativa Sociale <strong>"Il Pane e le Rose"</strong> nasce in seno
                    all'Associazione Comunità di San Benedetto al Porto con il duplice obiettivo
                    di consentire attività agricole e commerciali e di proporre
                    <strong>percorsi di lavoro protetti</strong> per le persone più fragili e svantaggiate.
                </p>
                <p>
                    Costituita nel 1987 come cooperativa agricola di Tipo B, opera in diverse sedi
                    in provincia di Alessandria (Bergamasco, Ponzone, Visone, Frascaro) e in
                    provincia di Genova (Mignanego e Via Buozzi). Il 21/12/2004 ha adottato un
                    nuovo statuto, diventando più autonoma con il nome attuale.
                </p>
                <p>
                    Lo scopo mutualistico è perseguito tramite attività agricole, industriali,
                    commerciali o di servizi e attraverso il coinvolgimento di soci volontari
                    che partecipano alla vita sociale di quartieri e sobborghi, nel rispetto
                    della legge 381/91.
                </p>
            </div>
            <aside class="col-aside reveal">
                <div class="quote-card">
                    <p>«Il nostro scopo più ampio è il benessere della comunità locale dove le sedi sono inserite. Il bene comune.»</p>
                </div>
                <!-- <ul class="key-facts">
                    <li><span>Forma giuridica</span><strong>Coop. Sociale di Tipo B</strong></li>
                    <li><span>Soci</span><strong>Lavoratori da fasce deboli + volontari</strong></li>
                    <li><span>Socio fondatore</span><strong>Comunità San Benedetto al Porto</strong></li>
                    <li><span>Sede ad Alessandria</span><strong>Casa di Quartiere</strong></li>
                </ul> -->
            </aside>
        </div>
    </section>

    <!-- COSA FACCIAMO -->
    <section class="section section-alt" id="cosa-facciamo">
        <div class="container">
            <header class="section-head reveal">
                <p class="section-eyebrow">Cosa facciamo</p>
                <h2>Sei aree di attività, un'unica visione</h2>
                <p class="section-intro">
                    Impieghiamo persone in percorsi sostenuti da borse lavoro promosse dai
                    Dipartimenti dell'ASL AL e dai Servizi Sociali, in attività diverse e
                    complementari.
                </p>
            </header>

            <div class="cards-grid">

                <?php foreach($attivita as $i => $a)
                    {
                        $desc = isset($a['desc_html']) ? $a['desc_html'] : htmlspecialchars($a['desc']);
                        echo '<article class="activity-card reveal" style="--i:'.$i.'">
                        <span class="card-icon" data-icon="'.$a['icon'].'" aria-hidden="true"></span>
                        <h3>'.htmlspecialchars($a['titolo']).'</h3>
                        <p>'.$desc.'</p></article>';
                    }
                ?>


            </div>
        </div>
    </section>

    <!-- TEMATICHE -->
    <section class="section" id="tematiche">
        <div class="container">
            <header class="section-head reveal">
                <p class="section-eyebrow">Tematiche</p>
                <h2>I valori che ci attraversano</h2>
                <p class="section-intro">
                    Attraverso la rete di soggetti con cui collaboriamo, siamo particolarmente
                    sensibili a tre direzioni di lavoro.
                </p>
            </header>

            <div class="theme-grid">
                <?php foreach ($tematiche as $t): ?>
                    <article class="theme-card theme-<?= $t['color'] ?> reveal">
                        <p class="theme-sotto"><?= htmlspecialchars($t['sotto']) ?></p>
                        <h3><?= htmlspecialchars($t['titolo']) ?></h3>
                        <p><?= htmlspecialchars($t['desc']) ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- RETI -->
    <section class="section section-alt" id="reti">
        <div class="container">
            <header class="section-head reveal">
                <p class="section-eyebrow">Reti & Progetti</p>
                <h2>Insieme ad altre realtà del territorio</h2>
                <p class="section-intro">
                    Dal 2010 siamo stabilmente parte di un network di associazioni ed enti di
                    Comunità ad Alessandria, impegnati in azioni di rigenerazione urbana.
                </p>
            </header>

            <ul class="reti-list">
                <?php foreach ($reti as $r): ?>
                    <li class="rete-item reveal">
                        <h3><?= htmlspecialchars($r['nome']) ?></h3>
                        <p><?= htmlspecialchars($r['desc']) ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="callout reveal">
                <div>
                    <h3>Da 10 anni nel Programma Emergenza Freddo</h3>
                    <p>Collaboriamo con il Comune di Alessandria sostenendo le persone senza dimora durante l'inverno. Da 15 anni interveniamo in azioni di rigenerazione urbana con la nostra esperienza nell'edilizia e nell'urbanistica pubblica.</p>
                </div>
                <a href="#contatti" class="btn btn-rose">Vuoi collaborare?</a>
            </div>
        </div>
    </section>

    <!-- STORIA DEL NOME -->
    <section class="section section-dark" id="storia-nome">
        <div class="container narrative">
            <div class="reveal">
                <p class="section-eyebrow light">Curiosità</p>
                <h2>Perché "Il Pane e le Rose"?</h2>
                <p class="big-quote">
                    Nel 1912, a <strong>Lawrence, Massachusetts</strong>, si svolse lo sciopero del
                    pane e delle rose: una protesta guidata da operaie tessili immigrate.
                </p>
                <p>
                    L'appellativo deriva dallo slogan che le manifestanti adottarono: il diritto
                    a un <em>salario equo</em> — il pane — e a <em>migliori condizioni di vita,
                    dignità e riconoscimento</em> — le rose. Migliaia di lavoratori di diverse
                    nazionalità si unirono contro i bassi salari e le dure condizioni lavorative.
                </p>
                <p class="signature">Alessandria, 30.10.2025</p>
            </div>
        </div>
    </section>

    <!-- BLOG & ARTICOLI -->
    <section class="section section-alt" id="blog">
        <div class="container">
            <header class="section-head reveal">
                <p class="section-eyebrow">Blog & Articoli</p>
                <h2>Storie, notizie e riflessioni</h2>
                <p class="section-intro">
                    Racconti dal territorio, aggiornamenti dai progetti e approfondimenti
                    sui temi che ci stanno a cuore.
                </p>
            </header>

            <div class="cards-grid">
                <?php foreach ($articoli as $i => $art): ?>
                    <article class="blog-card reveal" style="--i:<?= $i ?>">
                        <p class="blog-meta">
                            <span class="blog-tag"><?= htmlspecialchars($art['tag']) ?></span>
                            <time datetime="<?= htmlspecialchars($art['data_iso']) ?>"><?= htmlspecialchars($art['data']) ?></time>
                        </p>
                        <h3><a href="<?= htmlspecialchars($art['link']) ?>"><?= htmlspecialchars($art['titolo']) ?></a></h3>
                        <p><?= htmlspecialchars($art['excerpt']) ?></p>
                        <a class="blog-link" href="<?= htmlspecialchars($art['link']) ?>">Leggi l'articolo →</a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

</main>

<?php include __DIR__ . '/includes/footer.php'; ?>
