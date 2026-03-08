/**
 * PSP-144 API Bridge – Quick Ask and Multi-Oracle
 */
(function() {
  const quickAskBtn = document.getElementById('quickAskBtn');
  const quickAskInput = document.getElementById('quickAskInput');
  const resultsDiv = document.getElementById('quickAskResults');
  if (!quickAskBtn) return;

  quickAskBtn.addEventListener('click', async () => {
    const prompt = quickAskInput.value.trim();
    if (!prompt) { alert('Please enter a prompt'); return; }
    resultsDiv.innerHTML = '<div class="loading">Consulting oracles...</div>';

    // Gather configured providers and their keys
    const providers = <?= json_encode(array_keys($PSP144_APIS)) ?>;
    const keys = {};
    providers.forEach(p => { const k = localStorage.getItem(`psp144_key_${p}`); if (k) keys[p] = k; });
    if (Object.keys(keys).length === 0) { resultsDiv.innerHTML = '<div class="error">No API keys configured. Open the API modal to add keys.</div>'; return; }

    const promises = Object.entries(keys).map(async ([provider, api_key]) => {
      try {
        const res = await fetch('?api=1', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify({ provider, prompt, api_key, failover: true })
        });
        const data = await res.json();
        return { provider, data };
      } catch (err) {
        return { provider, data: { error: 'Network error' } };
      }
    });

    const results = await Promise.all(promises);
    resultsDiv.innerHTML = '';
    results.forEach(({ provider, data }) => {
      const card = document.createElement('div');
      card.className = 'result-card';
      card.innerHTML = `
        <div class="result-card-header">
          <span class="api-const-icon">${$PSP144_APIS[provider]?.icon || '🔮'}</span>
          <span class="result-card-name" style="color:${$PSP144_APIS[provider]?.color || '#fff'}">${$PSP144_APIS[provider]?.name || provider}</span>
        </div>
        <div class="result-card-body">${data.response ? data.response : (data.error || 'No response')}</div>
      `;
      resultsDiv.appendChild(card);
    });
  });
})();
