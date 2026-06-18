<?php ?>
<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PROVA</title>
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  html, body { width: 100%; height: 100%; overflow: hidden; background: #0b0d17; }
  canvas { display: block; }

  .title {
    position: fixed;
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    color: #fff;
    font-family: 'Segoe UI', system-ui, sans-serif;
    font-size: clamp(48px, 12vw, 160px);
    font-weight: 800;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    pointer-events: none;
    user-select: none;
    z-index: 2;
    text-shadow: 0 0 40px rgba(120, 160, 255, 0.4);
  }
</style>
</head>
<body>
  <canvas id="scene"></canvas>
  <h1 class="title"> PER VOT FAIT </h1>

<script>
const canvas = document.getElementById('scene');
const ctx = canvas.getContext('2d');

let W, H;
function resize() {
  W = canvas.width  = window.innerWidth;
  H = canvas.height = window.innerHeight;
}
window.addEventListener('resize', resize);
resize();

// --- Mouse ---
const mouse = { x: -9999, y: -9999 };
window.addEventListener('mousemove', e => { mouse.x = e.clientX; mouse.y = e.clientY; });
window.addEventListener('mouseleave', () => { mouse.x = -9999; mouse.y = -9999; });

// --- Bolle ---
const PALETTE = ['#5b8cff', '#7a5bff', '#36c9d6', '#ff6ba9', '#ffcf5b', '#5bffb0'];
const COUNT = 20;
const REPEL_RADIUS = 140;   // distanza entro cui il cursore perturba
const REPEL_FORCE  = 1.2;   // intensità della spinta
const FRICTION     = 0.94;  // attrito: più vicino a 1 = più inerzia (scivolano di più)
const RESTITUTION  = 0.85;  // elasticità urti: 1 = rimbalzo perfetto, 0 = si appiccicano

const bubbles = [];
for (let i = 0; i < COUNT; i++) {
  const r = 6 + Math.random() * 28;
  bubbles.push({
    x: Math.random() * W,
    y: Math.random() * H,
    r,
    // posizione "di riposo": ci tornano dolcemente dopo la perturbazione
    ox: 0, oy: 0,
    vx: (Math.random() - 0.5) * 0.4,
    vy: (Math.random() - 0.5) * 0.4,
    color: PALETTE[(Math.random() * PALETTE.length) | 0],
    alpha: 0.35 + Math.random() * 0.5
  });
}
bubbles.forEach(b => { b.ox = b.x; b.oy = b.y; });

function tick() {
  ctx.clearRect(0, 0, W, H);

  for (const b of bubbles) {
    // repulsione dal cursore: aggiunge velocità (la bolla scivola per inerzia)
    const dx = b.x - mouse.x;
    const dy = b.y - mouse.y;
    const dist = Math.hypot(dx, dy);
    if (dist < REPEL_RADIUS && dist > 0.01) {
      const push = (1 - dist / REPEL_RADIUS) * REPEL_FORCE;
      b.vx += (dx / dist) * push * 2.2;
      b.vy += (dy / dist) * push * 2.2;
    }

    // inerzia + attrito
    b.x += b.vx;
    b.y += b.vy;
    b.vx *= FRICTION;
    b.vy *= FRICTION;

    // rimbalzo morbido sui bordi
    if (b.x < b.r)     { b.x = b.r;     b.vx *= -0.6; }
    if (b.x > W - b.r) { b.x = W - b.r; b.vx *= -0.6; }
    if (b.y < b.r)     { b.y = b.r;     b.vy *= -0.6; }
    if (b.y > H - b.r) { b.y = H - b.r; b.vy *= -0.6; }
  }

  // collisioni tra bolle (stile biliardo, masse ~ area)
  for (let i = 0; i < bubbles.length; i++) {
    for (let j = i + 1; j < bubbles.length; j++) {
      const a = bubbles[i], c = bubbles[j];
      const dx = c.x - a.x, dy = c.y - a.y;
      const dist = Math.hypot(dx, dy);
      const minDist = a.r + c.r;
      if (dist > 0 && dist < minDist) {
        const nx = dx / dist, ny = dy / dist;
        // separa le bolle sovrapposte
        const overlap = (minDist - dist) / 2;
        a.x -= nx * overlap; a.y -= ny * overlap;
        c.x += nx * overlap; c.y += ny * overlap;
        // velocità relativa lungo la normale
        const dvx = c.vx - a.vx, dvy = c.vy - a.vy;
        const vn = dvx * nx + dvy * ny;
        if (vn < 0) {
          const ma = a.r * a.r, mc = c.r * c.r;
          const imp = (-(1 + RESTITUTION) * vn) / (ma + mc);
          a.vx -= imp * mc * nx; a.vy -= imp * mc * ny;
          c.vx += imp * ma * nx; c.vy += imp * ma * ny;
        }
      }
    }
  }

  // disegno
  for (const b of bubbles) {
    ctx.beginPath();
    ctx.arc(b.x, b.y, b.r, 0, Math.PI * 2);
    ctx.fillStyle = b.color;
    ctx.globalAlpha = b.alpha;
    ctx.fill();

    // alone
    ctx.globalAlpha = b.alpha * 0.25;
    ctx.beginPath();
    ctx.arc(b.x, b.y, b.r * 1.8, 0, Math.PI * 2);
    ctx.fill();
  }
  ctx.globalAlpha = 1;

  requestAnimationFrame(tick);
}
tick();
</script>
</body>
</html>
