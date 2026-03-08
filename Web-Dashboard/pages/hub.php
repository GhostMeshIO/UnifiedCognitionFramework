<?php
$nodes = get_active_nodes();
$apis  = $PSP144_APIS;

$d3_metrics = get_d3_metrics();
$polytope_h = 0.73;
$mesh_coh   = 81.4;

$feature_modules = [
  ['id'=>'bias-mirror',      'icon'=>'🪞', 'title'=>'Bias Mirror',         'desc'=>'LLM-powered cognitive bias detection in real time', 'color'=>'cyan'],
  ['id'=>'flow-oracle',      'icon'=>'🌊', 'title'=>'Flow Oracle',          'desc'=>'D3 coordinate prediction for peak performance windows', 'color'=>'purple'],
  ['id'=>'empathy-weaver',   'icon'=>'🕸️', 'title'=>'Empathy Weaver',       'desc'=>'Inter-brain PLV phase-locking simulation', 'color'=>'cyan'],
  ['id'=>'mem-palace',       'icon'=>'🏛️', 'title'=>'Memory Nexus Palace',  'desc'=>'3D spatial correlation vault explorer', 'color'=>'purple'],
  ['id'=>'attn-sculptor',    'icon'=>'🎯', 'title'=>'Attention Sculptor',   'desc'=>'Precision axis training via adaptive tasks', 'color'=>'cyan'],
  ['id'=>'dec-forest',       'icon'=>'🌳', 'title'=>'Decision Forest',      'desc'=>'Parallel what-if branch weaver for complex decisions', 'color'=>'amber'],
  ['id'=>'emo-fusion',       'icon'=>'⚡', 'title'=>'Emotion-Logic Fusion', 'desc'=>'Sentiment-data merge engine with D3 mapping', 'color'=>'purple'],
  ['id'=>'habit-loop',       'icon'=>'🔄', 'title'=>'Habit Loop LLM',       'desc'=>'STDP-modeled habit reinforcement circuits', 'color'=>'cyan'],
  ['id'=>'aha-spark',        'icon'=>'💡', 'title'=>'Aha Spark',            'desc'=>'Generative insight prompts at spectral radius ρ→1.0', 'color'=>'amber'],
  ['id'=>'social-nexus',     'icon'=>'🌐', 'title'=>'Social Nexus',         'desc'=>'Collective hive aggregator — anon correlation pools', 'color'=>'purple'],
  ['id'=>'time-chain',       'icon'=>'⛓️', 'title'=>'Time Chain',           'desc'=>'Temporal flux oracle — predictive time-series chains', 'color'=>'cyan'],
  ['id'=>'load-balancer',    'icon'=>'⚖️', 'title'=>'Load Balancer',        'desc'=>'Allostatic load asymmetry monitor (Eq. 3.9)', 'color'=>'amber'],
];
?>
<div class="hub-layout">
  <div class="hub-hero reveal">
    <div>
      <div class="tag tag-cyan mb-2">SOVEREIGN HUB · LIVE</div>
      <h1 class="glow-text-cyan mb-2">Hyper-Correlation<br>Intelligence Dashboard</h1>
      <p class="text-muted" style="max-width:480px;line-height:1.7;font-size:0.95rem">
        Real-time monitoring of D³ triadic state space. Precision · Boundary · Temporal axes
        mapped to the Coherence Polytope. Ghost Mesh P2P active.
      </p>
      <div class="flex gap-3 mt-4">
        <a href="?page=crucible" class="btn btn-solid-cyan">⚗ Enter Crucible</a>
        <a href="?page=api-forge" class="btn btn-purple">⚙ Configure APIs</a>
      </div>
    </div>
    <div class="hub-polytope-display reveal reveal-delay-2">
      <canvas id="polytopeCanvas" width="200" height="200" aria-label="D3 Coherence Polytope visualization"></canvas>
      <div class="polytope-stats">
        <div class="polytope-stat"><span class="text-dim" style="font-size:0.65rem;font-family:var(--font-mono)">H_POLYTOPE</span><span class="polytope-stat-val text-cyan" id="polytopeH"><?= $polytope_h ?></span></div>
        <div class="polytope-stat"><span class="text-dim" style="font-size:0.65rem;font-family:var(--font-mono)">MESH COH.</span><span class="polytope-stat-val text-purple" id="meshCoh"><?= $mesh_coh ?>%</span></div>
        <div class="polytope-stat"><span class="text-dim" style="font-size:0.65rem;font-family:var(--font-mono)">ρ SPECTRAL</span><span class="polytope-stat-val text-amber" id="spectralRho">0.89</span></div>
      </div>
    </div>
  </div>

  <div class="section-header reveal reveal-delay-1 mt-6"><h2>D³ Triadic State Space</h2><div class="section-divider"></div><span class="tag tag-cyan">LIVE</span></div>
  <div class="grid-3 reveal reveal-delay-2">
    <div class="panel d3-axis-panel scan-line" id="precision-panel">
      <div class="axis-header"><span class="axis-label axis-label-p">𝒫 PRECISION</span><span class="axis-value glow-text-cyan" id="precision-val"><?= $d3_metrics['precision']['value'] ?></span><span class="text-mono text-dim" style="font-size:0.65rem"><?= $d3_metrics['precision']['unit'] ?></span></div>
      <div class="bar-track mt-2 mb-3"><div class="bar-fill bar-fill-cyan axis-bar-animated" id="precision-bar" style="width:<?= $d3_metrics['precision']['pct'] ?>%"></div></div>
      <div class="axis-info">
        <p class="text-muted" style="font-size:0.78rem;line-height:1.6">Neurocomputational gain on ascending prediction errors. Modulated by dopamine / noradrenaline / acetylcholine.</p>
        <div class="axis-range-markers"><span class="range-low">Low 0.8</span><span class="range-opt">Optimal 1.0–1.2</span><span class="range-high">Manic 1.8+</span></div>
        <div class="axis-mini-chart" id="precisionChart"></div>
      </div>
    </div>
    <div class="panel panel-purple d3-axis-panel scan-line" id="boundary-panel">
      <div class="axis-header"><span class="axis-label axis-label-b">ℬ BOUNDARY</span><span class="axis-value glow-text-purple" id="boundary-val"><?= $d3_metrics['boundary']['value'] ?></span><span class="text-mono text-dim" style="font-size:0.65rem"><?= $d3_metrics['boundary']['unit'] ?></span></div>
      <div class="bar-track mt-2 mb-3"><div class="bar-fill bar-fill-purple axis-bar-animated" id="boundary-bar" style="width:<?= $d3_metrics['boundary']['pct'] ?>%"></div></div>
      <div class="axis-info">
        <p class="text-muted" style="font-size:0.78rem;line-height:1.6">DMN intra-network FC ratio vs. SN/FPN coupling. Low B = ego dissolution / hyper-empathic state.</p>
        <div class="axis-range-markers"><span class="range-low">Dissolved 0.3</span><span class="range-opt" style="color:var(--purple)">Optimal 1.0–1.5</span><span class="range-high">Rigid 2.0+</span></div>
        <div class="axis-mini-chart" id="boundaryChart"></div>
      </div>
    </div>
    <div class="panel d3-axis-panel" id="temporal-panel">
      <div class="axis-header"><span class="axis-label axis-label-t">𝒯 TEMPORAL</span><span class="axis-value" id="temporal-val" style="color:var(--axis-t);text-shadow:0 0 10px rgba(245,158,11,0.6)"><?= $d3_metrics['temporal']['value'] ?></span><span class="text-mono text-dim" style="font-size:0.65rem"><?= $d3_metrics['temporal']['unit'] ?></span></div>
      <div class="bar-track mt-2 mb-3"><div class="bar-fill bar-fill-amber axis-bar-animated" id="temporal-bar" style="width:<?= $d3_metrics['temporal']['pct'] ?>%"></div></div>
      <div class="axis-info">
        <p class="text-muted" style="font-size:0.78rem;line-height:1.6">Hyperbolic discounting k-parameter normalized z-score. Negative = trauma past-lock. Positive = future anticipation.</p>
        <div class="axis-range-markers"><span class="range-low">Past -3</span><span class="range-opt" style="color:var(--axis-t)">Balanced 0</span><span class="range-high">Future +3</span></div>
        <div class="axis-mini-chart" id="temporalChart"><canvas id="temporalFluxCanvas" width="200" height="40"></canvas></div>
      </div>
    </div>
  </div>

  <div class="section-header reveal mt-6"><h2>Ghost Mesh · Active Nodes</h2><div class="section-divider"></div><span class="text-mono text-dim" style="font-size:0.65rem" id="node-count"><?= count($nodes) ?> nodes / P2P</span></div>
  <div class="grid-3 stagger-grid" id="node-grid"><?php foreach ($nodes as $node) echo render_node_card($node); ?></div>

  <div class="section-header reveal mt-6"><h2>Intelligence Modules</h2><div class="section-divider"></div><span class="tag tag-purple">24 FEATURES</span></div>
  <div class="grid-4 stagger-grid module-grid" id="module-grid">
    <?php foreach ($feature_modules as $mod): ?>
    <div class="module-card <?= 'module-' . $mod['color'] ?>" data-module="<?= $mod['id'] ?>" draggable="true">
      <div class="module-icon"><?= $mod['icon'] ?></div>
      <div class="module-body"><h3 class="module-title"><?= htmlspecialchars($mod['title']) ?></h3><p class="module-desc text-muted"><?= htmlspecialchars($mod['desc']) ?></p></div>
      <button class="btn btn-<?= $mod['color'] === 'amber' ? 'cyan' : 'btn-' . $mod['color'] ?> module-btn" style="font-size:0.55rem;padding:0.25rem 0.6rem">LAUNCH →</button>
    </div>
    <?php endforeach; ?>
  </div>

  <div class="section-header reveal mt-6"><h2>API Constellation</h2><div class="section-divider"></div><span class="tag tag-cyan">10 PROVIDERS</span></div>
  <div class="panel reveal">
    <div class="api-constellation-grid">
      <?php foreach ($apis as $id => $api): ?>
      <div class="api-constellation-item" id="api-status-<?= $id ?>">
        <span class="api-const-icon"><?= $api['icon'] ?></span>
        <span class="api-const-name" style="color:<?= $api['color'] ?>"><?= htmlspecialchars($api['name']) ?></span>
        <span class="api-const-dot" data-provider="<?= $id ?>"></span>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="flex items-center gap-3 mt-4">
      <button class="btn btn-cyan" id="quickAskBtn">⚡ Quick Ask All APIs</button>
      <input type="text" id="quickAskInput" class="quick-ask-input" placeholder="Ask all configured LLMs about PSP-144..."/>
    </div>
    <div id="quickAskResults" class="quick-results-grid" aria-live="polite"></div>
  </div>
</div>
<style>/* hub-specific styles from earlier versions */</style>
