# Il Pane e le Rose — sito

Sito statico-dinamico in PHP/jQuery/HTML che fonde l'impronta pulita di
[La Ruota](https://www.laruota.info/) con la struttura a card tematiche e i
controlli di accessibilità di [San Benedetto al Porto](https://sanbenedetto.org/).

## Struttura

```
panerose/
├─ index.php                  ← landing page completa
├─ includes/
│  ├─ config.php              ← dati del sito (sedi, attività, tematiche, reti)
│  ├─ header.php              ← <head>, nav sticky, controlli a11y
│  └─ footer.php              ← footer con newsletter + jQuery
├─ assets/
│  ├─ css/style.css           ← design system completo
│  └─ js/main.js              ← scroll, nav, reveal, a11y, validazione
└─ pages/                     ← pronto per future sotto-pagine
```

## Come provare in locale

Da Windows (PowerShell o terminale bash con PHP installato):

```bash
cd C:\Users\gamic\panerose
php -S localhost:8080
```

Poi apri `http://localhost:8080/`.

> Se il path richiede il prefisso `/panerose`, modifica `base_url` in
> `includes/config.php`.

## Cosa c'è dentro

- **Hero** con claim "Pane / Rose" e statistiche (1987, sedi, soci, anni di reti)
- **Chi siamo** con quote-card oro + key-facts laterali
- **Cosa facciamo** — 6 card attività (agricoltura, ristorazione, commercio,
  manutenzione, facchinaggio, eventi)
- **Tematiche** — 3 card a gradiente (oro / rosa / verde): sviluppo etico,
  antisfruttamento, giustizia sociale
- **Reti & Progetti** — lista delle collaborazioni + callout RECUPERANDO
- **Il nome** — sezione scura sulla storia dello sciopero di Lawrence 1912
- **Footer** — sedi, contatti, newsletter (validazione jQuery)

## Accessibilità

- Skip link, semantica `<header>/<main>/<footer>`, focus visibili
- Controlli A−/A+ persistenti via `localStorage`
- Toggle contrasto elevato persistente
- `prefers-reduced-motion` rispettato
# glowing-broccoli
# glowing-broccoli
# glowing-broccoli
