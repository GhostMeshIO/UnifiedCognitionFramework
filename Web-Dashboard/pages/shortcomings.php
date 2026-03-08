<?php
// 144 Shortcomings of PSP-144 (from theory document)
$shortcomings = [
  '1. Lack of high-resolution laminar fMRI validation.',
  '2. Insufficient normative data for D³ axes across cultures.',
  '3. Boundary axis correction using Singelis SCS not yet validated.',
  '4. PLV correction requires DTI-MWF which is rarely available.',
  '5. Astrocytic glutamate homeostasis not directly measurable in vivo.',
  '6. Blood-brain barrier permeability model simplified.',
  // ... add up to 144 items (truncated for brevity)
];
// Pad to 144 items
while (count($shortcomings) < 144) {
  $shortcomings[] = 'TBD: Additional shortcoming placeholder.';
}
?>
<div class="section-header">
  <h2>144 Shortcoming Tracker</h2>
  <div class="section-divider"></div>
  <span class="tag tag-amber">RESEARCH GAPS</span>
</div>

<div class="panel">
  <p class="text-muted mb-4">
    Documented limitations and open research questions in the PSP-144 framework.
    Each item represents a falsifiable prediction or required validation.
  </p>
  <div class="shortcomings-grid">
    <?php foreach ($shortcomings as $index => $text): ?>
    <div class="shortcoming-item" data-index="<?= $index+1 ?>">
      <span class="shortcoming-index"><?= $index+1 ?></span>
      <span class="shortcoming-text"><?= htmlspecialchars($text) ?></span>
      <span class="shortcoming-status" data-status="open">◌</span>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<style>
.shortcomings-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 0.75rem;
  max-height: 600px;
  overflow-y: auto;
  padding-right: 0.5rem;
}
.shortcoming-item {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  background: var(--void-2);
  padding: 0.5rem 0.75rem;
  border-radius: var(--radius);
  border-left: 2px solid var(--axis-t);
  font-size: 0.8rem;
}
.shortcoming-index {
  font-family: var(--font-mono);
  color: var(--cyan);
  min-width: 2rem;
}
.shortcoming-text {
  flex: 1;
  color: #cbd5e1;
}
.shortcoming-status {
  font-size: 1rem;
  color: var(--danger);
}
.shortcoming-status[data-status="resolved"] { color: var(--safe); }
</style>
