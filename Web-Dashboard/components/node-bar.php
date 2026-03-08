<?php
// WebRTC P2P Node Status Bar
$nodes = get_active_nodes();
$peer_count = count($nodes);
?>
<div class="p2p-bar" id="p2pBar">
  <div class="p2p-bar-left">
    <span class="p2p-icon">🌐</span>
    <span class="p2p-label">GHOST MESH P2P</span>
    <span class="p2p-count" id="peerCount"><?= $peer_count ?></span>
    <span class="p2p-status" id="p2pStatus">● CONNECTED</span>
  </div>
  <div class="p2p-bar-right">
    <span class="p2p-peer-list" id="peerList">
      <?php foreach ($nodes as $node): ?>
        <span class="p2p-peer" title="<?= htmlspecialchars($node['name'] ?? 'Anonymous') ?>">
          <?= $node['icon'] ?? '●' ?>
        </span>
      <?php endforeach; ?>
    </span>
    <span class="p2p-latency" id="p2pLatency">⏱️ 12ms</span>
  </div>
</div>

<style>
.p2p-bar {
  position: fixed;
  top: var(--nav-h);
  left: 0;
  right: 0;
  height: var(--bar-h);
  background: rgba(0, 0, 0, 0.8);
  backdrop-filter: blur(4px);
  border-bottom: 1px solid rgba(0, 255, 255, 0.2);
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 1.5rem;
  z-index: 50;
  font-family: var(--font-mono);
  font-size: 0.7rem;
  color: #9ca3af;
}
.p2p-bar-left, .p2p-bar-right {
  display: flex;
  align-items: center;
  gap: 1rem;
}
.p2p-icon { font-size: 1rem; }
.p2p-label { color: var(--cyan); letter-spacing: 0.1em; }
.p2p-count { color: var(--purple); font-weight: 700; }
.p2p-status { color: var(--safe); }
.p2p-peer-list { display: flex; gap: 0.3rem; }
.p2p-peer {
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background: var(--void-2);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.8rem;
  border: 1px solid rgba(0,255,255,0.3);
}
.p2p-latency { color: var(--axis-t); }
</style>

<script>
// Simulate WebRTC stats (for demo)
(function() {
  const peerCountEl = document.getElementById('peerCount');
  const peerListEl = document.getElementById('peerList');
  const latencyEl = document.getElementById('p2pLatency');
  const statusEl = document.getElementById('p2pStatus');

  function updateP2P() {
    // Simulate changing peer count and latency
    const baseCount = <?= $peer_count ?>;
    const variation = Math.floor(Math.random() * 3) - 1; // -1,0,1
    const newCount = Math.max(1, baseCount + variation);
    peerCountEl.textContent = newCount;

    const latency = 10 + Math.floor(Math.random() * 20);
    latencyEl.textContent = `⏱️ ${latency}ms`;

    statusEl.textContent = Math.random() > 0.1 ? '● CONNECTED' : '○ RECONNECTING';
    statusEl.style.color = Math.random() > 0.1 ? 'var(--safe)' : 'var(--danger)';
  }
  setInterval(updateP2P, 5000);
})();
</script>
