<header class="sovereign-header">
  <div class="header-left">
    <a href="?page=hub" class="logo">PSP‑144<span class="logo-dim">/NQVP</span></a>
  </div>
  <nav class="header-nav">
    <a href="?page=hub" class="<?= $page === 'hub' ? 'active' : '' ?>">HUB</a>
    <a href="?page=crucible" class="<?= $page === 'crucible' ? 'active' : '' ?>">CRUCIBLE</a>
    <a href="?page=nexus" class="<?= $page === 'nexus' ? 'active' : '' ?>">NEXUS</a>
    <a href="?page=community" class="<?= $page === 'community' ? 'active' : '' ?>">COMMUNITY</a>
    <a href="?page=api-forge" class="<?= $page === 'api-forge' ? 'active' : '' ?>">API FORGE</a>
    <a href="?page=axioms" class="<?= $page === 'axioms' ? 'active' : '' ?>">AXIOMS</a>
    <a href="?page=shortcomings" class="<?= $page === 'shortcomings' ? 'active' : '' ?>">SHORTCOMINGS</a>
    <a href="?page=ar-veil" class="<?= $page === 'ar-veil' ? 'active' : '' ?>">AR VEIL</a>
  </nav>
  <div class="header-right">
    <button class="btn btn-ghost" id="apiModalBtn">🔌 APIs</button>
  </div>
</header>
<style>
.sovereign-header {
  position: fixed;
  top: 0; left: 0; right: 0;
  height: var(--nav-h);
  background: rgba(0,0,0,0.9);
  backdrop-filter: blur(4px);
  border-bottom: 1px solid rgba(0,255,255,0.2);
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 1.5rem;
  z-index: 100;
  font-family: var(--font-display);
  font-size: 0.8rem;
}
.logo { font-size: 1.2rem; font-weight: 700; color: var(--cyan); text-decoration: none; }
.logo-dim { color: var(--purple); font-weight: 400; }
.header-nav { display: flex; gap: 1rem; }
.header-nav a { color: #9ca3af; text-decoration: none; letter-spacing: 0.1em; padding: 0.25rem 0; }
.header-nav a.active { color: var(--cyan); border-bottom: 2px solid var(--cyan); }
.btn-ghost { background: transparent; border: 1px solid rgba(0,255,255,0.3); color: var(--cyan); padding: 0.3rem 0.8rem; border-radius: var(--radius); cursor: pointer; }
.btn-ghost:hover { background: rgba(0,255,255,0.1); }
</style>
