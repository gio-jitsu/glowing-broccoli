<?php
// Configurazione globale del sito
$site = [
    'name'        => 'Il Pane e le Rose',
    'tagline'     => 'Cooperativa Sociale Onlus',
    'claim'       => 'Lavoro, dignità, comunità — dal 1987',
    'email'       => 'info@ilpaneelerose.it',
    'pec'         => 'ilpaneelerose@pec.it',
    'sede_legale' => 'Casa di Quartiere, Alessandria',
    'sedi'        => ['Bergamasco', 'Ponzone', 'Visone', 'Frascaro', 'Mignanego', 'Genova — Via Buozzi'],
    'anno'        => date('Y'),
    'base_url'    => '',
];

// Voci di navigazione (anchor sulla home)
$nav = [
    'chi-siamo'     => 'Chi siamo',
    'cosa-facciamo' => 'Cosa facciamo',
    'tematiche'     => 'Tematiche',
    'reti'          => 'Reti & Progetti',
    'storia-nome'   => 'Il nome',
    'blog'          => 'Blog',
    'contatti'      => 'Contatti',
];

// Attività operative (card)
$attivita = [
    [
        'icon'  => 'wheat',
        'titolo'=> 'Agricoltura',
        'desc'  => 'Coltivazioni orto-frutticole nelle sedi di Bergamasco, Ponzone, Visone e Frascaro. Filiera corta e qualità.',
    ],
    [
        'icon'      => 'fork',
        'titolo'    => 'Ristorazione & Bar',
        'desc_html' => 'Trattoria marinara \'A Lanterna di Don Gallo (Genova) e <a href="/pages/ortozerocafe.php">OrtoZero Cafè</a> (Alessandria), bar-ristorante vegano.',
    ],
    [
        'icon'     => 'shop',
        'titolo'   => 'Commercio di vicinato',
        'desc_html'=> 'Botteghe di Quartiere (<a href="/pages/inscia-stradda.php">InScia Stradda</a> — Genova, <a href="/pages/secondlife.php">SecondLife</a> - Alessandria).',
    ],
    [
        'icon'  => 'hammer',
        'titolo'=> 'Manutenzione & Edilizia',
        'desc'  => 'Ristrutturazioni, pronto intervento abitativo e adeguamento locali per ATC Piemonte Sud e Comune.',
    ],
    [
        'icon'  => 'box',
        'titolo'=> 'Facchinaggio & Logistica',
        'desc'  => 'Servizi di trasloco, recupero e distribuzione mobili, supporto alle Unità di Strada.',
    ],
    [
        'icon'  => 'calendar',
        'titolo'=> 'Eventi & Catering',
        'desc'  => 'Allestimento e gestione di eventi pubblici, fiere, festival e installazioni nei quartieri.',
    ],
];

// Tematiche valoriali
$tematiche = [
    [
        'titolo' => 'Sviluppo Etico',
        'sotto'  => 'Lotta allo spreco · filiera corta',
        'desc'   => 'Sostegno ai piccoli e medi produttori, mercati di quartiere con condivisione, vendita e baratto, recupero alimentare e qualità dell\'alimentazione.',
        'color'  => 'gold',
    ],
    [
        'titolo' => 'Antisfruttamento & Antiracket',
        'sotto'  => 'Rete Comunità San Benedetto',
        'desc'   => 'Logistica delle Unità di Strada contro il traffico di uomini e donne. Promozione delle reti italiane antisfruttamento (Libera, NoPizzo, NoCap).',
        'color'  => 'rose',
    ],
    [
        'titolo' => 'Giustizia sociale & Altra Economia',
        'sotto'  => 'Coordinamento CNCA · Banca Etica',
        'desc'   => 'Tramite la relazione con la Comunità San Benedetto, socia fondatrice del Coordinamento Nazionale Comunità di Accoglienza e di Banca Etica.',
        'color'  => 'green',
    ],
];

// Blog & articoli (placeholder)
$articoli = [
    [
        'titolo'   => 'Recuperando: un anno di mensa diffusa',
        'data'     => '15 marzo 2026',
        'data_iso' => '2026-03-15',
        'tag'      => 'Progetti',
        'excerpt'  => 'Il bilancio del primo anno del patto di collaborazione con Comune, Caritas e Coompany& per il recupero alimentare ad Alessandria.',
        'link'     => '/pages/articoli/recuperando.php',
    ],
    [
        'titolo'   => 'Botteghe di quartiere: cosa cambia con SecondLife',
        'data'     => '8 febbraio 2026',
        'data_iso' => '2026-02-08',
        'tag'      => 'Comunità',
        'excerpt'  => 'Apre ad Alessandria la nuova bottega del riuso. Un modello che dialoga con InScia Stradda di Genova e con la rete del commercio etico.',
        'link'     => '#',
    ],
    [
        'titolo'   => 'Emergenza Freddo 2025/26: il bilancio',
        'data'     => '22 gennaio 2026',
        'data_iso' => '2026-01-22',
        'tag'      => 'Cronache',
        'excerpt'  => 'Dieci anni di Programma Emergenza Freddo con il Comune di Alessandria. Numeri, volti e prospettive per le persone senza dimora.',
        'link'     => '#',
    ],
];

// SecondLife — prodotti in vetrina (placeholder: sostituire 'foto' con percorso reale es. 'img/second_life/prodotti/xxx.jpg')
$prodotti_secondlife = [
    ['nome' => 'Giacca varsity Guess, vintage',  'categoria' => 'Abbigliamento', 'prezzo' => 28, 'lotto' => '001', 'foto' => 'img/second_life/prodotti/p1 (2).jpeg'],
    ['nome' => 'Macchina da scrivere Olivetti',  'categoria' => 'Vintage',       'prezzo' => 45, 'lotto' => '002', 'foto' => null],
    ['nome' => 'Set 4 bicchieri vetro soffiato', 'categoria' => 'Casa',          'prezzo' => 12, 'lotto' => '003', 'foto' => null],
    ['nome' => 'Lampada da tavolo, design',      'categoria' => 'Casa',          'prezzo' => 28, 'lotto' => '004', 'foto' => null],
    ['nome' => 'Libro illustrato Einaudi',       'categoria' => 'Libri',         'prezzo' =>  6, 'lotto' => '005', 'foto' => null],
    ['nome' => 'Borsa in pelle vintage',         'categoria' => 'Accessori',     'prezzo' => 18, 'lotto' => '006', 'foto' => null],
    ['nome' => 'Sciarpa in lana, fatta a mano',  'categoria' => 'Abbigliamento', 'prezzo' =>  8, 'lotto' => '007', 'foto' => null],
    ['nome' => 'Vinile 33 giri — jazz italiano', 'categoria' => 'Vintage',       'prezzo' =>  5, 'lotto' => '008', 'foto' => null],
    ['nome' => "Vaso in ceramica anni '70",      'categoria' => 'Casa',          'prezzo' => 15, 'lotto' => '009', 'foto' => null],
];

// Reti e progetti
$reti = [
    [ 'nome' => 'CISSACA', 'desc' => 'Ristrutturazione appartamenti e pronto intervento abitativo.' ],
    [ 'nome' => 'Associazione Comunità San Benedetto', 'desc' => 'Supporto logistico Unità di Strada, gestione eventi, catering.' ],
    [ 'nome' => 'Coop. Coompany& · Orti In Città', 'desc' => 'Orti sociali e commercializzazione verso GAS, mercati, botteghe.' ],
    [ 'nome' => 'Comune di Alessandria · ATC Piemonte Sud', 'desc' => 'Interventi edili di emergenza nelle Case Popolari.' ],
    [ 'nome' => 'Caritas Alessandria', 'desc' => 'Emergenza abitativa, recupero mobili, raccolta e distribuzione indumenti.' ],
    [ 'nome' => 'Progetto RECUPERANDO (dal 2023)', 'desc' => 'Patto di collaborazione con Comune, Caritas e Coompany& per recupero e distribuzione gratuita.' ],
    [ 'nome' => 'Gruppo AMAG', 'desc' => 'Iniziative, festival e percorsi per comportamenti collettivi sostenibili.' ],
    [ 'nome' => 'Comune di Frascaro · SOMS', 'desc' => 'Modello di comunità rurale basato su partecipazione e condivisione.' ],
];
