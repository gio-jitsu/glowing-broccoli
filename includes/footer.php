<?php $base = $site['base_url']; ?>
<footer class="site-footer" id="contatti">
    <div class="container footer-grid">
        <div class="footer-col">
            <h3 class="footer-title">Il Pane e le Rose</h3>
            <p>Cooperativa Sociale Onlus — agricola di Tipo B e di inserimento lavorativo. Costituita nel 1987, oggi parte della rete della Comunità di San Benedetto al Porto.</p>
        </div>

        <div class="footer-col">
            <h3 class="footer-title">Sedi</h3>
            <ul class="plain-list">
                <?php foreach ($site['sedi'] as $sede): ?>
                    <li><?= htmlspecialchars($sede) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="footer-col">
            <h3 class="footer-title">Contatti</h3>
            <p><strong>Sede legale:</strong><br><?= htmlspecialchars($site['sede_legale']) ?></p>
            <p>
                <a href="mailto:<?= $site['email'] ?>"><?= $site['email'] ?></a><br>
                <a href="mailto:<?= $site['pec'] ?>"><?= $site['pec'] ?></a>
            </p>
        </div>

        <div class="footer-col">
            <h3 class="footer-title">Resta in contatto</h3>
            <form class="newsletter" id="newsletter" novalidate>
                <label for="nl-email" class="sr-only">La tua email</label>
                <input type="email" id="nl-email" name="email" placeholder="La tua email" required>
                <button type="submit" class="btn btn-rose">Iscrivimi</button>
                <p class="form-feedback" role="status" aria-live="polite"></p>
            </form>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p>© <?= $site['anno'] ?> Il Pane e le Rose Soc. Coop. Sociale Onlus — Tutti i diritti riservati.</p>
            <p class="small">Sito ispirato ai valori condivisi con <a href="https://sanbenedetto.org/" target="_blank" rel="noopener">San Benedetto al Porto</a></p>
        </div>
    </div>
</footer>

<button class="to-top" id="toTop" aria-label="Torna in cima">↑</button>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="<?= $base ?>/assets/js/main.js"></script>
</body>
</html>
