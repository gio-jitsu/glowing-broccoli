<?php
require_once __DIR__ . '/../../includes/config.php';
$page_title = 'Recuperando: un anno di mensa diffusa — ' . $site['name'];
include __DIR__ . '/../../includes/header.php';
?>

<main id="main">

    <!-- ARTICLE HERO -->
    <section class="section section-alt">
        <div class="container">
            <div class="reveal article-body">
                <p class="section-eyebrow">
                    <a href="<?= $site['base_url'] ?>/#blog" style="color:inherit">← Blog &amp; Articoli</a>
                </p>
                <p class="blog-meta">
                    <span class="blog-tag">Progetti</span>
                    <time datetime="2026-03-15">15 marzo 2026</time>
                </p>
                <h1>Recuperando: un anno di mensa diffusa</h1>
                <p class="lead">
                    Il bilancio del primo anno del patto di collaborazione con Comune,
                    Caritas e Coompany&amp; per il recupero alimentare ad Alessandria.
                </p>
            </div>
        </div>
    </section>

    <!-- ARTICLE BODY -->
    <section class="section">
        <div class="container">
            <div class="reveal article-body">
                <p>
                    A marzo 2025 abbiamo firmato — insieme al Comune di Alessandria, alla
                    Caritas Diocesana e alla Cooperativa Coompany&amp; — un <strong>patto di
                    collaborazione</strong> per dare struttura stabile a quello che fino ad
                    allora era stato un mosaico di iniziative spontanee: il recupero di
                    eccedenze alimentari e la loro <em>redistribuzione gratuita</em> alle
                    famiglie in difficoltà del territorio.
                </p>
                <p>
                    Lo abbiamo chiamato <strong>RECUPERANDO</strong>. Dodici mesi dopo,
                    proviamo a tirare le somme.
                </p>

                <h2>I numeri di un anno</h2>
                <p>
                    Tra marzo 2025 e febbraio 2026, RECUPERANDO ha intercettato circa
                    <strong>42 tonnellate</strong> di prodotti alimentari ancora buoni —
                    in larghissima parte ortofrutta, pane, latticini in scadenza breve —
                    provenienti da una rete di <strong>23 esercizi commerciali</strong>
                    della città: supermercati, panetterie, mercati rionali.
                </p>
                <p>
                    Quei prodotti hanno raggiunto <strong>oltre 380 nuclei familiari</strong>
                    attraverso la mensa diffusa e i punti di distribuzione gestiti dalla
                    Caritas. Non un magazzino centrale, ma una rete capillare: pochi
                    chilometri tra chi dona, chi smista e chi riceve.
                </p>

                <h2>Cosa intendiamo per "mensa diffusa"</h2>
                <p>
                    L'idea è semplice e non è nostra: invece di costruire una grande mensa
                    dei poveri, attrezziamo <em>più luoghi di prossimità</em> — la Casa di
                    Quartiere, le parrocchie aderenti, due botteghe della rete — perché
                    ciascuno possa ritirare il proprio pacco settimanale a piedi, senza
                    spostarsi in autobus, senza esibire documenti, senza file in strada.
                </p>
                <p>
                    È un modello che riduce lo stigma e che — soprattutto — mette in
                    contatto persone che altrimenti non si incontrerebbero. Chi distribuisce
                    è spesso un volontario del quartiere stesso.
                </p>

                <blockquote class="big-quote" style="border-left:3px solid var(--gold); padding-left:1.2rem; margin: 2rem 0; font-style: italic;">
                    «Non è carità. È un modo di abitare lo stesso pezzo di città riconoscendo
                    che il cibo che avanza, da qualche parte, manca.»
                </blockquote>

                <h2>Le criticità che restano</h2>
                <p>
                    Non tutto ha funzionato come speravamo. La logistica del fresco, in
                    particolare d'estate, è ancora fragile: serviranno mezzi refrigerati
                    dedicati. Manca una piattaforma digitale leggera per coordinare
                    donatori e punti di ritiro in tempo reale — oggi tutto passa via
                    telefono e fogli di calcolo.
                </p>
                <p>
                    E poi c'è il tema più scomodo: il numero di famiglie che chiedono
                    accesso al servizio è cresciuto del 28% rispetto alle previsioni
                    iniziali. È un dato che parla del territorio, non del progetto.
                </p>

                <h2>Il prossimo anno</h2>
                <p>
                    Per il 2026/27 abbiamo tre obiettivi concreti: estendere la rete a
                    Valenza e Tortona, formare dieci nuovi volontari sulla logistica del
                    fresco, e aprire un confronto con AMAG sui consumi energetici dei
                    punti di stoccaggio.
                </p>
                <p>
                    Se vuoi sostenere RECUPERANDO — come donatore, volontario, o partner
                    tecnico — <a href="<?= $site['base_url'] ?>/#contatti">scrivici</a>:
                    il modello regge solo se la rete continua ad allargarsi.
                </p>

                <p class="signature">Alessandria, 15.03.2026</p>

                <p style="margin-top: 2rem;">
                    <a href="<?= $site['base_url'] ?>/#blog" class="btn btn-gold">← Tutti gli articoli</a>
                </p>
            </div>
        </div>
    </section>

</main>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
