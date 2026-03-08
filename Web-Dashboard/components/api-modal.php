<div id="apiModal" class="modal">
  <div class="modal-content">
    <span class="modal-close">&times;</span>
    <h2>API Constellation Configuration</h2>
    <p class="text-muted">Store your API keys locally (never sent to our server).</p>
    <div class="api-key-grid">
      <?php foreach ($PSP144_APIS as $id => $api): ?>
      <div class="api-key-item">
        <label for="key_<?= $id ?>"><?= $api['icon'] ?> <?= $api['name'] ?></label>
        <input type="password" id="key_<?= $id ?>" data-provider="<?= $id ?>" placeholder="sk-..." class="api-key-input" />
        <button class="btn btn-sm btn-cyan test-key" data-provider="<?= $id ?>">Test</button>
      </div>
      <?php endforeach; ?>
    </div>
    <div class="modal-footer">
      <button class="btn btn-cyan" id="saveApiKeys">Save Keys</button>
      <button class="btn btn-purple" id="clearApiKeys">Clear All</button>
    </div>
  </div>
</div>
<style>
.modal { display: none; position: fixed; z-index: 200; left: 0; top: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.8); backdrop-filter: blur(5px); }
.modal-content { background: var(--panel); margin: 5% auto; padding: 2rem; border: 1px solid var(--cyan); border-radius: var(--radius-lg); max-width: 600px; }
.modal-close { float: right; font-size: 2rem; cursor: pointer; color: var(--cyan); }
.api-key-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 1rem; margin: 1.5rem 0; }
.api-key-item { display: flex; flex-direction: column; gap: 0.3rem; background: var(--void-2); padding: 0.75rem; border-radius: var(--radius); }
.api-key-input { background: var(--void); border: 1px solid rgba(0,255,255,0.3); color: white; padding: 0.3rem; border-radius: var(--radius); }
.btn-sm { padding: 0.2rem 0.5rem; font-size: 0.6rem; }
.modal-footer { display: flex; justify-content: flex-end; gap: 1rem; margin-top: 1rem; }
</style>
<script>
const modal = document.getElementById('apiModal');
document.getElementById('apiModalBtn').onclick = () => modal.style.display = 'block';
document.querySelector('.modal-close').onclick = () => modal.style.display = 'none';
window.onclick = (e) => { if (e.target == modal) modal.style.display = 'none'; };

// Load saved keys
Object.keys(<?= json_encode($PSP144_APIS) ?>).forEach(provider => {
  const input = document.getElementById(`key_${provider}`);
  if (input) {
    const saved = localStorage.getItem(`psp144_key_${provider}`);
    if (saved) input.value = saved;
  }
});

document.getElementById('saveApiKeys').onclick = () => {
  document.querySelectorAll('.api-key-input').forEach(input => {
    const provider = input.dataset.provider;
    if (provider) localStorage.setItem(`psp144_key_${provider}`, input.value);
  });
  alert('Keys saved locally.');
  modal.style.display = 'none';
  // Update dots
  document.querySelectorAll('.api-const-dot').forEach(dot => {
    const prov = dot.dataset.provider;
    if (prov && localStorage.getItem(`psp144_key_${prov}`)) {
      dot.classList.add('configured');
    } else {
      dot.classList.remove('configured');
    }
  });
};

document.getElementById('clearApiKeys').onclick = () => {
  document.querySelectorAll('.api-key-input').forEach(input => {
    input.value = '';
    const provider = input.dataset.provider;
    if (provider) localStorage.removeItem(`psp144_key_${provider}`);
  });
};

// Test key (simple call)
document.querySelectorAll('.test-key').forEach(btn => {
  btn.onclick = async (e) => {
    e.preventDefault();
    const provider = btn.dataset.provider;
    const input = document.getElementById(`key_${provider}`);
    const key = input.value;
    if (!key) { alert('Enter a key first'); return; }
    btn.textContent = 'Testing...';
    try {
      const res = await fetch('?api=1', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ provider, prompt: 'Hello, this is a test.', api_key: key })
      });
      const data = await res.json();
      if (data.response) alert('Test successful!');
      else alert('Error: ' + (data.error || 'Unknown'));
    } catch (err) {
      alert('Network error');
    }
    btn.textContent = 'Test';
  };
});
</script>
