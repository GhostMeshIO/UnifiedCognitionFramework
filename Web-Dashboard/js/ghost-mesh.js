/**
 * PSP-144 Ghost Mesh Canvas
 * Animated P2P node network visualization
 */
(function() {
  'use strict';

  const canvas = document.getElementById('ghostMeshCanvas');
  if (!canvas) return;

  const ctx = canvas.getContext('2d');
  let width, height, nodes, animId;

  const CONFIG = {
    nodeCount:      28,
    connectDist:    180,
    nodeSpeed:      0.4,
    pulseSpeed:     0.015,
    cyanColor:      [0,   255, 255],
    purpleColor:    [168,  85, 247],
    nodeMinR:       1.5,
    nodeMaxR:       4,
    lineMaxOpacity: 0.18,
    bgFade:         0.04,
  };

  function resize() {
    width  = canvas.width  = window.innerWidth;
    height = canvas.height = window.innerHeight;
  }

  function lerp(a, b, t) { return a + (b - a) * t; }

  function createNode() {
    // Assign D3 coordinate influence
    const pVal = 0.8 + Math.random() * 2.0;
    const bVal = 0.2 + Math.random() * 1.8;
    const colorMix = Math.random(); // 0=cyan, 1=purple
    return {
      x:      Math.random() * width,
      y:      Math.random() * height,
      vx:     (Math.random() - 0.5) * CONFIG.nodeSpeed,
      vy:     (Math.random() - 0.5) * CONFIG.nodeSpeed,
      r:      CONFIG.nodeMinR + Math.random() * (CONFIG.nodeMaxR - CONFIG.nodeMinR),
      phase:  Math.random() * Math.PI * 2,
      pVal,
      bVal,
      colorMix,
      // High P + Low B = cyan dominant
      color: colorMix > bVal / 2 ? CONFIG.cyanColor : CONFIG.purpleColor,
    };
  }

  function initNodes() {
    nodes = Array.from({ length: CONFIG.nodeCount }, createNode);
  }

  function getNodeColor(node, alpha) {
    const [r, g, b] = node.color;
    return `rgba(${r},${g},${b},${alpha})`;
  }

  function draw(ts) {
    ctx.clearRect(0, 0, width, height);

    const t = ts * 0.001;

    // Update nodes
    for (const n of nodes) {
      n.x += n.vx;
      n.y += n.vy;
      if (n.x < 0 || n.x > width)  n.vx *= -1;
      if (n.y < 0 || n.y > height) n.vy *= -1;
      n.phase += CONFIG.pulseSpeed;
    }

    // Draw connections
    for (let i = 0; i < nodes.length; i++) {
      for (let j = i + 1; j < nodes.length; j++) {
        const a = nodes[i], b = nodes[j];
        const dx = a.x - b.x, dy = a.y - b.y;
        const dist = Math.sqrt(dx*dx + dy*dy);
        if (dist > CONFIG.connectDist) continue;

        const strength  = 1 - dist / CONFIG.connectDist;
        const linePulse = 0.5 + 0.5 * Math.sin(t * 2 + a.phase);
        const alpha     = strength * CONFIG.lineMaxOpacity * linePulse;

        // Interpolate color between node colors
        const colA = a.color, colB = b.color;
        const rC = Math.round(lerp(colA[0], colB[0], 0.5));
        const gC = Math.round(lerp(colA[1], colB[1], 0.5));
        const bC = Math.round(lerp(colA[2], colB[2], 0.5));

        const grad = ctx.createLinearGradient(a.x, a.y, b.x, b.y);
        grad.addColorStop(0, `rgba(${colA[0]},${colA[1]},${colA[2]},${alpha})`);
        grad.addColorStop(1, `rgba(${colB[0]},${colB[1]},${colB[2]},${alpha})`);

        ctx.beginPath();
        ctx.moveTo(a.x, a.y);
        ctx.lineTo(b.x, b.y);
        ctx.strokeStyle = grad;
        ctx.lineWidth = strength * 1.2;
        ctx.stroke();
      }
    }

    // Draw nodes
    for (const n of nodes) {
      const pulse = 0.6 + 0.4 * Math.sin(n.phase);
      const r = n.r * pulse;

      // Outer glow
      const glowGrad = ctx.createRadialGradient(n.x, n.y, 0, n.x, n.y, r * 4);
      glowGrad.addColorStop(0, getNodeColor(n, 0.3 * pulse));
      glowGrad.addColorStop(1, getNodeColor(n, 0));
      ctx.beginPath();
      ctx.arc(n.x, n.y, r * 4, 0, Math.PI * 2);
      ctx.fillStyle = glowGrad;
      ctx.fill();

      // Core
      ctx.beginPath();
      ctx.arc(n.x, n.y, r, 0, Math.PI * 2);
      ctx.fillStyle = getNodeColor(n, 0.8 * pulse);
      ctx.fill();
    }

    animId = requestAnimationFrame(draw);
  }

  // Init
  resize();
  initNodes();
  animId = requestAnimationFrame(draw);
  window.addEventListener('resize', () => { resize(); });

  // Mouse interaction — repel nodes
  document.addEventListener('mousemove', (e) => {
    for (const n of nodes) {
      const dx = n.x - e.clientX, dy = n.y - e.clientY;
      const dist = Math.sqrt(dx*dx + dy*dy);
      if (dist < 80) {
        const force = (80 - dist) / 80;
        n.vx += (dx / dist) * force * 0.5;
        n.vy += (dy / dist) * force * 0.5;
        // Clamp velocity
        const speed = Math.sqrt(n.vx*n.vx + n.vy*n.vy);
        if (speed > 3) { n.vx = n.vx/speed*3; n.vy = n.vy/speed*3; }
      }
    }
  });

  // Expose for external control
  window.PSP144_GhostMesh = { nodes, config: CONFIG };

})();
