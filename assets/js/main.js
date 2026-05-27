/* ============================================
   IL PANE E LE ROSE — main.js
   Richiede jQuery 3.x
   ============================================ */
(function ($) {
    'use strict';

    $(function () {

        var $win    = $(window);
        var $header = $('#siteHeader');
        var $nav    = $('#primaryNav');
        var $toggle = $('#navToggle');
        var $toTop  = $('#toTop');
        var $body   = $('body');

        /* ---------- 1. Sticky header style on scroll ---------- */
        function onScroll() {
            var y = $win.scrollTop();
            $header.toggleClass('is-scrolled', y > 12);
            $toTop.toggleClass('is-visible', y > 480);
        }
        $win.on('scroll', onScroll);
        onScroll();

        /* ---------- 2. Mobile nav toggle ---------- */
        $toggle.on('click', function () {
            var open = $nav.toggleClass('is-open').hasClass('is-open');
            $toggle.attr('aria-expanded', open ? 'true' : 'false');
            $toggle.attr('aria-label', open ? 'Chiudi menù' : 'Apri menù');
        });

        // Chiudi nav mobile quando si clicca un link
        $nav.find('a').on('click', function () {
            if ($nav.hasClass('is-open')) {
                $nav.removeClass('is-open');
                $toggle.attr('aria-expanded', 'false').attr('aria-label', 'Apri menù');
            }
        });

        /* ---------- 3. Smooth scroll con offset header ---------- */
        $('a[href^="#"]').on('click', function (e) {
            var href = $(this).attr('href');
            if (href === '#' || href.length < 2) return;
            var $target = $(href);
            if (!$target.length) return;

            e.preventDefault();
            var offset = $header.outerHeight() || 0;
            var top = $target.offset().top - offset + 1;
            $('html, body').animate({ scrollTop: top }, 550, 'swing');
        });

        /* ---------- 4. Active link su scroll ---------- */
        var $navLinks = $nav.find('a[href^="#"]');
        var sections = [];
        $navLinks.each(function () {
            var id = $(this).attr('href');
            var $sec = $(id);
            if ($sec.length) sections.push({ id: id, $el: $sec });
        });

        function highlightActive() {
            var fromTop = $win.scrollTop() + ($header.outerHeight() || 0) + 60;
            var current = null;
            sections.forEach(function (s) {
                if (s.$el.offset().top <= fromTop) current = s.id;
            });
            $navLinks.removeClass('active');
            if (current) $navLinks.filter('[href="' + current + '"]').addClass('active');
        }
        $win.on('scroll', highlightActive);
        highlightActive();

        /* ---------- 5. Reveal on scroll (IntersectionObserver + fallback) ---------- */
        var $reveals = $('.reveal');
        if ('IntersectionObserver' in window) {
            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        io.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

            $reveals.each(function () { io.observe(this); });
        } else {
            $reveals.addClass('is-visible');
        }

        /* ---------- 6. Accessibility controls ---------- */
        var FONT_KEY = 'pr_font_scale';
        var CONTRAST_KEY = 'pr_high_contrast';
        var fontScale = parseFloat(localStorage.getItem(FONT_KEY)) || 1;

        function applyFontScale() {
            // 16px * scale, clamp 0.85 .. 1.3
            fontScale = Math.max(0.85, Math.min(1.3, fontScale));
            document.documentElement.style.fontSize = (16 * fontScale) + 'px';
            localStorage.setItem(FONT_KEY, fontScale);
        }
        applyFontScale();

        if (localStorage.getItem(CONTRAST_KEY) === '1') {
            $body.addClass('high-contrast');
        }

        $('.a11y-btn').on('click', function () {
            var action = $(this).data('action');
            if (action === 'font-up')   { fontScale += 0.1; applyFontScale(); }
            if (action === 'font-down') { fontScale -= 0.1; applyFontScale(); }
            if (action === 'contrast') {
                var on = $body.toggleClass('high-contrast').hasClass('high-contrast');
                localStorage.setItem(CONTRAST_KEY, on ? '1' : '0');
            }
        });

        /* ---------- 7. Newsletter form (validazione client) ---------- */
        $('#newsletter').on('submit', function (e) {
            e.preventDefault();
            var $form  = $(this);
            var $input = $form.find('input[type="email"]');
            var $msg   = $form.find('.form-feedback');
            var email  = ($input.val() || '').trim();
            var ok = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/.test(email);

            $msg.removeClass('is-ok is-error');
            if (!ok) {
                $msg.addClass('is-error').text('Per favore inserisci un indirizzo email valido.');
                $input.trigger('focus');
                return;
            }

            // Stub: in produzione qui andrebbe AJAX a un endpoint PHP.
            $msg.addClass('is-ok').text('Grazie! Ti scriveremo presto.');
            $input.val('');
        });

    });

})(jQuery);
