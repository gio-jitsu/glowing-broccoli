<?php
require_once __DIR__ . '/../includes/config.php';
$page_title = 'Nuovo articolo · Editor — ' . $site['name'];
include __DIR__ . '/../includes/header.php';
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css">

<style>
.editor-shell { background: var(--cream); padding: 3rem 0 4rem; min-height: 70vh; }
.editor-header { margin-bottom: 1.5rem; }
.editor-header h1 { font-size: 1.8rem; margin: 0 0 .3rem; }
.editor-header p { margin: 0; color: var(--ink-soft); font-size: .92rem; }

.editor-grid {
    display: grid;
    grid-template-columns: minmax(0, 1fr) 320px;
    gap: 1.5rem;
    align-items: start;
}
@media (max-width: 1000px) {
    .editor-grid { grid-template-columns: 1fr; }
}

.editor-pane, .editor-side {
    background: var(--white);
    border: 1px solid var(--line);
    border-radius: var(--radius);
    padding: 1.8rem;
    box-shadow: var(--shadow-sm);
}
.editor-side { position: sticky; top: 90px; }

.field { margin-bottom: 1.2rem; }
.field label {
    display: block;
    font-size: .78rem;
    font-weight: 700;
    color: var(--ink);
    margin-bottom: .4rem;
    text-transform: uppercase;
    letter-spacing: .05em;
}
.field input[type="text"],
.field input[type="date"],
.field textarea,
.field select {
    width: 100%;
    padding: .7rem .9rem;
    border: 1px solid var(--line);
    border-radius: var(--radius-sm);
    font: inherit;
    color: var(--ink);
    background: var(--white);
    transition: border-color .2s, box-shadow .2s;
}
.field input:focus, .field textarea:focus, .field select:focus {
    outline: none;
    border-color: var(--gold);
    box-shadow: 0 0 0 3px rgba(200,146,61,0.18);
}
.field textarea { resize: vertical; min-height: 60px; }
.field-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
@media (max-width: 520px) { .field-row { grid-template-columns: 1fr; } }

#editor { min-height: 360px; font-family: var(--font-sans); font-size: 1rem; }
.ql-toolbar.ql-snow, .ql-container.ql-snow { border-color: var(--line); }
.ql-toolbar.ql-snow {
    border-top-left-radius: var(--radius-sm);
    border-top-right-radius: var(--radius-sm);
    background: var(--cream-warm);
}
.ql-container.ql-snow {
    border-bottom-left-radius: var(--radius-sm);
    border-bottom-right-radius: var(--radius-sm);
}
.ql-editor.ql-blank::before { color: var(--ink-soft); font-style: normal; }

.editor-actions { margin-top: 1.5rem; display: flex; gap: .8rem; justify-content: flex-end; flex-wrap: wrap; }

.preview-title {
    font-size: .78rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: .05em; color: var(--ink-soft); margin: 0 0 1rem;
}
.preview-card {
    background: var(--cream);
    border: 1px dashed var(--line);
    border-radius: var(--radius-sm);
    padding: 1.2rem;
}
.preview-meta {
    display: flex; gap: .65rem; align-items: center;
    margin: 0 0 .7rem; font-size: .78rem; color: var(--ink-soft);
}
.preview-tag {
    background: var(--cream-warm); color: var(--gold-dark);
    padding: .2rem .6rem; border-radius: 999px;
    font-weight: 700; font-size: .68rem;
    text-transform: uppercase; letter-spacing: .04em;
}
.preview-card h3 { font-size: 1.15rem; margin: 0 0 .5rem; }
#previewExcerpt { color: var(--ink-soft); font-size: .92rem; margin: 0; }

.mockup-banner {
    background: linear-gradient(90deg, var(--gold-soft), var(--rose-soft));
    color: var(--ink);
    padding: .7rem 1rem;
    border-radius: var(--radius-sm);
    font-size: .88rem;
    margin-bottom: 1.5rem;
}
.mockup-banner strong { font-weight: 700; }

.toast {
    position: fixed; bottom: 2rem; right: 2rem;
    background: var(--ink); color: var(--white);
    padding: 1rem 1.3rem; border-radius: var(--radius);
    box-shadow: var(--shadow-lg);
    opacity: 0; transform: translateY(20px);
    transition: opacity .25s, transform .25s;
    pointer-events: none; z-index: 1000;
    max-width: 360px; font-size: .92rem; line-height: 1.4;
}
.toast.is-visible { opacity: 1; transform: translateY(0); }
.toast strong { color: var(--gold-soft); display: block; margin-bottom: .2rem; }
</style>

<main id="main" class="editor-shell">
    <div class="container">

        <div class="editor-header">
            <h1>Nuovo articolo</h1>
            <p>Compila i campi, scrivi il corpo e usa l'anteprima a destra per controllare la card.</p>
        </div>

        <div class="mockup-banner">
            <strong>Mockup:</strong> i pulsanti non salvano nulla. La persistenza verrà implementata in seguito.
        </div>

        <form class="editor-grid" id="articleForm" onsubmit="return false;">

            <div class="editor-pane">

                <div class="field">
                    <label for="art-titolo">Titolo</label>
                    <input type="text" id="art-titolo" name="titolo" placeholder="Es. Recuperando: un anno di mensa diffusa" autocomplete="off">
                </div>

                <div class="field">
                    <label for="art-excerpt">Sommario</label>
                    <textarea id="art-excerpt" name="excerpt" rows="2" placeholder="Una frase che incuriosisce e riassume l'articolo."></textarea>
                </div>

                <div class="field-row">
                    <div class="field">
                        <label for="art-tag">Categoria</label>
                        <select id="art-tag" name="tag">
                            <option>Progetti</option>
                            <option>Comunità</option>
                            <option>Cronache</option>
                            <option>Riflessioni</option>
                            <option>Eventi</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="art-data">Data</label>
                        <input type="date" id="art-data" name="data">
                    </div>
                </div>

                <div class="field">
                    <label>Corpo dell'articolo</label>
                    <div id="editor"></div>
                </div>

                <div class="editor-actions">
                    <button type="button" class="btn btn-ghost" id="btnDraft">Salva bozza</button>
                    <button type="button" class="btn btn-rose" id="btnPublish">Pubblica</button>
                </div>

            </div>

            <aside class="editor-side">
                <p class="preview-title">Anteprima card</p>
                <div class="preview-card">
                    <p class="preview-meta">
                        <span class="preview-tag" id="previewTag">Progetti</span>
                        <time id="previewDate">—</time>
                    </p>
                    <h3 id="previewTitle">Il titolo del tuo articolo</h3>
                    <p id="previewExcerpt">Qui apparirà il sommario.</p>
                </div>
            </aside>

        </form>

    </div>

    <div class="toast" id="toast" role="status" aria-live="polite"></div>
</main>

<script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>
<script>
(function () {
    const quill = new Quill('#editor', {
        theme: 'snow',
        placeholder: 'Scrivi qui il corpo dell\'articolo...',
        modules: {
            toolbar: [
                [{ header: [2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                ['blockquote', 'code-block'],
                [{ list: 'ordered' }, { list: 'bullet' }],
                ['link'],
                ['clean']
            ]
        }
    });

    const titoloInput  = document.getElementById('art-titolo');
    const excerptInput = document.getElementById('art-excerpt');
    const tagInput     = document.getElementById('art-tag');
    const dateInput    = document.getElementById('art-data');

    const previewTitle   = document.getElementById('previewTitle');
    const previewExcerpt = document.getElementById('previewExcerpt');
    const previewTag     = document.getElementById('previewTag');
    const previewDate    = document.getElementById('previewDate');

    dateInput.value = new Date().toISOString().slice(0, 10);

    const MESI = ['gennaio','febbraio','marzo','aprile','maggio','giugno','luglio','agosto','settembre','ottobre','novembre','dicembre'];
    function fmtDate(iso) {
        if (!iso) return '—';
        const [y, m, d] = iso.split('-');
        return parseInt(d, 10) + ' ' + MESI[parseInt(m, 10) - 1] + ' ' + y;
    }

    function refreshPreview() {
        previewTitle.textContent   = titoloInput.value.trim() || 'Il titolo del tuo articolo';
        previewExcerpt.textContent = excerptInput.value.trim() || 'Qui apparirà il sommario.';
        previewTag.textContent     = tagInput.value;
        previewDate.textContent    = fmtDate(dateInput.value);
    }

    [titoloInput, excerptInput, tagInput, dateInput].forEach(el => {
        el.addEventListener('input', refreshPreview);
        el.addEventListener('change', refreshPreview);
    });
    refreshPreview();

    const toast = document.getElementById('toast');
    let toastTimer;
    function showToast(title, msg) {
        toast.innerHTML = '<strong>' + title + '</strong>' + msg;
        toast.classList.add('is-visible');
        clearTimeout(toastTimer);
        toastTimer = setTimeout(() => toast.classList.remove('is-visible'), 3200);
    }

    document.getElementById('btnDraft').addEventListener('click', () => {
        showToast('Bozza salvata (mockup)', 'In produzione lo stato verrebbe persistito.');
    });

    document.getElementById('btnPublish').addEventListener('click', () => {
        if (!titoloInput.value.trim()) {
            showToast('Titolo mancante', 'Inserisci un titolo prima di pubblicare.');
            return;
        }
        const html = quill.root.innerHTML;
        console.log('[mockup] payload articolo:', {
            titolo: titoloInput.value.trim(),
            excerpt: excerptInput.value.trim(),
            tag: tagInput.value,
            data: dateInput.value,
            corpo_html: html
        });
        showToast('Pubblicato (mockup)', 'Payload stampato in console. In produzione verrebbe scritto su file o DB.');
    });
})();
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>
