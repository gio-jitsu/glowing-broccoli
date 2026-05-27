<?php
require_once __DIR__ . '/../includes/config.php';
$page_title = 'InScia Stradda — ' . $site['name'];
include __DIR__ . '/../includes/header.php';
?>

<main id="main">

    <section class="section">
        <div class="container narrative">
            <div class="reveal">
                <p class="section-eyebrow">Bottega di quartiere · Genova</p>
                <h1>InScia Stradda</h1>
                <p class="lead">
                    Bottega di quartiere a Genova, parte della rete del commercio di vicinato
                    de Il Pane e le Rose.
                </p>
                <p>
                    Pagina in costruzione. A breve troverai qui informazioni su orari,
                    indirizzo, prodotti e attività della bottega.
                </p>
                <p>
                    <a href="<?= $site['base_url'] ?>/" class="btn btn-gold">← Torna alla home</a>
                </p>
            </div>
        </div>
    </section>

</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>
