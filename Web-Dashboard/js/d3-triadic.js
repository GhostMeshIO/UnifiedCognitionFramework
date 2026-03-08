/**
 * PSP-144 D³ Triadic Live Updates and Temporal Flux Chain
 */
(function() {
  'use strict';

  // Chart instances
  let temporalChart;

  // Initialize temporal flux chart
  function initTemporalChart() {
    const canvas = document.getElementById('temporalFluxCanvas');
    if (!canvas) return;
    const ctx = canvas.getContext('2d');
    // Generate some historical data (last 20 points)
    const history = JSON.parse(localStorage.getItem('psp144_temporal_history')) || [];
    if (history.length === 0) {
      for (let i = 0; i < 20; i++) {
        history.push(0.45 + (Math.random() - 0.5) * 0.3);
      }
    }
    temporalChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: Array.from({ length: history.length }, (_, i) => i.toString()),
        datasets: [{
          label: 'Temporal Axis',
          data: history,
          borderColor: '#f59e0b',
          backgroundColor: 'rgba(245,158,11,0.1)',
          tension: 0.4,
          pointRadius: 0,
          borderWidth: 2
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: { x: { display: false }, y: { display: false } },
        elements: { line: { fill: true } }
      }
    });
    return history;
  }

  // Update D3 values from server or simulation
  function fetchD3Metrics() {
    // In production, this would be an AJAX call to get real metrics
    // For demo, we simulate random walk
    const metrics = window.PSP144.d3_metrics;
    const newPrec = metrics.precision.value + (Math.random() - 0.5) * 0.1;
    const newBound = metrics.boundary.value + (Math.random() - 0.5) * 0.1;
    const newTemp = metrics.temporal.value + (Math.random() - 0.5) * 0.1;

    // Clamp to reasonable ranges
    metrics.precision.value = Math.max(0.5, Math.min(2.5, newPrec));
    metrics.boundary.value = Math.max(0.1, Math.min(2.5, newBound));
    metrics.temporal.value = Math.max(-3, Math.min(3, newTemp));

    // Update percentages
    document.getElementById('precision-val').textContent = metrics.precision.value.toFixed(2);
    document.getElementById('boundary-val').textContent = metrics.boundary.value.toFixed(2);
    document.getElementById('temporal-val').textContent = metrics.temporal.value.toFixed(2);

    const precPct = ((metrics.precision.value - 0.8) / 1.6) * 100; // map 0.8-2.4 to 0-100
    const boundPct = (metrics.boundary.value / 2.5) * 100;
    const tempPct = ((metrics.temporal.value + 3) / 6) * 100;
    document.getElementById('precision-bar').style.width = Math.min(100, Math.max(0, precPct)) + '%';
    document.getElementById('boundary-bar').style.width = Math.min(100, Math.max(0, boundPct)) + '%';
    document.getElementById('temporal-bar').style.width = Math.min(100, Math.max(0, tempPct)) + '%';

    // Update polytope stats
    document.getElementById('polytopeH').textContent = (0.7 + Math.random() * 0.1).toFixed(2);
    document.getElementById('meshCoh').textContent = (80 + Math.random() * 5).toFixed(1) + '%';
    document.getElementById('spectralRho').textContent = (0.85 + Math.random() * 0.1).toFixed(2);

    // Update temporal chart
    if (temporalChart) {
      temporalChart.data.datasets[0].data.push(metrics.temporal.value);
      temporalChart.data.datasets[0].data.shift();
      temporalChart.update();
      // Save to localStorage
      localStorage.setItem('psp144_temporal_history', JSON.stringify(temporalChart.data.datasets[0].data));
    }

    // Update Ghost Mesh with new D3 metrics
    if (window.PSP144_GhostMesh) {
      window.PSP144_GhostMesh.updateD3Metrics(metrics);
    }
  }

  // Start live updates every 3 seconds
  function startLiveUpdates() {
    initTemporalChart();
    fetchD3Metrics(); // initial
    setInterval(fetchD3Metrics, 3000);
  }

  // Wait for DOM
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', startLiveUpdates);
  } else {
    startLiveUpdates();
  }

})();
