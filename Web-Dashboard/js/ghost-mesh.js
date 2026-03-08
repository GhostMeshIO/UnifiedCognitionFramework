/**
 * PSP-144 Ghost Mesh Canvas
 * Animated P2P node network visualization with D3 influence
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
    d3Influence:    true, // use D3 metrics to color nodes
  };

  // Get D3 metrics from global PSP144 object
  let d3Metrics = window.PSP144?.d3_metrics || {
    precision: { value: 1.34 },
    boundary: { value: 0.72 },
    temporal: { value: 0.45 }
  };

  function resize() {
    width  = canvas.width  = window.innerWidth;
    height = canvas.height = window.innerHeight;
  }

  function lerp(a, b, t) { return a + (b - a) * t; }

  function createNode() {
    // Use D3 metrics to influence node color
    const pVal = d3Metrics.precision.value;
    const bVal = d3Metrics.boundary.value;
    // Normalize pVal and bVal to 0-1 range (roughly)
    const pNorm = Math.min(1, Math.max(0, (pVal - 0.8) / 1.6)); // 0.8-2.4 range
    const bNorm = Math.min(1, Math.max(0, (bVal - 0.2) / 1.8)); // 0.2-2.0 range
    // High P + Low B = cyan dominant
    const colorMix = pNorm * (1 - bNorm); // 0 = purple, 1 = cyan
    return {
      x:      Math.random() * width,
      y:      Math.random() * height,
      vx:     (Math.random() - 0.5) * CONFIG.nodeSpeed,
      vy:     (Math.random() - 0.5) * CONFIG.nodeSpeed,
      r:      CONFIG.nodeMinR + Math.random() * (CONFIG.nodeMaxR - CONFIG.nodeMinR),
      phase:  Math.random() * Math.PI * 2,
      colorMix,
      // Interpolate between cyan and purple based on colorMix
      color: [
        lerp(CONFIG.purpleColor[0], CONFIG.cyanColor[0], colorMix),
        lerp(CONFIG.purpleColor[1], CONFIG.cyanColor[1], colorMix),
        lerp(CONFIG.purpleColor[2], CONFIG.cyanColor[2], colorMix)
      ]
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
  window.PSP144_GhostMesh = { nodes, config: CONFIG, updateD3Metrics: (metrics) => {
    d3Metrics = metrics;
    // Gradually update node colors? For now, re-init.
    initNodes();
  } };

})();
