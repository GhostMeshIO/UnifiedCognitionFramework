# PSP-144 NQVP Web Dashboard

**Part of the [Unified Cognition Framework](https://github.com/GhostMeshIO/UnifiedCognitionFramework)**  
*Hyper-Correlation Intelligence Interface*

The Web Dashboard is the primary real‑time visualization and control interface for the **Neuro‑Quantum Validation Protocol (NQVP‑144)**. It implements the D³ Triadic State Space (Precision, Boundary, Temporal) as an interactive monitoring console, provides a live view of the Ghost Mesh P2P network, and acts as a unified API gateway to multiple state‑of‑the‑art language models – all within the cosmic‑dark aesthetic defined by the Ghost Mesh visual language.

---

## ✦ Overview

This dashboard translates the dense theoretical constructs of the [Psychics Protocol Framework](The%20Psychics%20Protocol%20Framework%20v1.0%20(PSP-144_NQVP-144)%20An%20Exhaustive%20Research%20Architecture%20for%20Hyper-Correlational%20Information%20Processing.md) into a live operational interface. It is designed for researchers, developers, and explorers of hyper‑correlational cognition to:

- Monitor the D³ axes in real time (simulated demo values, ready for database/session integration).
- Observe the Ghost Mesh – an animated P2P node network whose behaviour is influenced by D³ parameters.
- Launch intelligence modules (Bias Mirror, Flow Oracle, Empathy Weaver, etc.) – each representing a distinct functional component of the framework.
- Query a constellation of LLMs simultaneously through a secure, context‑aware API proxy that injects the PSP‑144 system prompt automatically.

---

## ✦ Features

| Feature | Description |
|---------|-------------|
| **Live D³ Triadic Dashboard** | Three animated panels show `𝒫 Precision`, `ℬ Boundary`, and `𝒯 Temporal` values with dynamic bars, range markers, and placeholder mini‑charts. |
| **Coherence Polytope Visualisation** | A small canvas (`#polytopeCanvas`) displays the current polytope health (`H_POLYTOPE`), mesh coherence, and spectral radius – key stability metrics from the framework. |
| **Ghost Mesh Animation** | A full‑background canvas (`ghost-mesh.js`) renders a self‑organising node network. Node colours (cyan/purple) and movement respond to synthetic D³ values; the mouse repels nodes to simulate interaction. |
| **Active Nodes Panel** | Lists live P2P nodes (data from `get_active_nodes()`). Each node card can be rendered by `render_node_card()` (implementation not shown, but structure exists). |
| **Intelligence Modules Grid** | 12 feature modules (expandable to 24) with icons, descriptions, and colour‑coded launch buttons. Hover effects follow the cyan/purple/amber theme. |
| **API Constellation & Quick Ask** | Displays all configured API providers (from `PSP144_APIS`) with status dots. A “Quick Ask” input lets you send a prompt to all LLMs simultaneously; results appear in a responsive grid. |
| **Unified API Proxy** | `proxy.php` routes requests to 10+ LLM providers (Claude, GPT‑4o, Gemini, Grok, DeepSeek, Perplexity, Copilot, Nova, Meta, zAI). Automatically prepends the PSP‑144 system context to every prompt. |
| **Modular Page Structure** | Pages are routed via `index.php?page=...` – currently supports `hub`, `crucible`, `nexus`, `community`, `api‑forge`, `axioms`, `shortcomings`. |

---

## ✦ Architecture

```
Web-Dashboard/
├── index.php                 # Master router, loads core CSS/JS and page content
├── pages/                    # Individual page templates (hub.php, crucible.php, …)
├── php/                      # Backend logic (config.php, nodes.php)
├── api/proxy.php             # Multi‑LLM gateway (called via ?api=1)
├── css/                      # Stylesheets
│   ├── ghost-mesh.css        # Core visual system (variables, panels, grids)
│   ├── nodes.css             # (placeholder) node card styling
│   ├── panels.css            # (placeholder) additional panel styles
│   └── animations.css        # (placeholder) keyframe animations
├── js/                       # JavaScript modules
│   ├── ghost-mesh.js         # Canvas animation engine
│   ├── nodes.js              # (placeholder) node data handling
│   ├── api-bridge.js         # (placeholder) client‑side API calls
│   ├── d3-triadic.js         # (placeholder) D3 chart updates
│   └── animations.js         # (placeholder) scroll reveals, etc.
├── components/               # Reusable HTML fragments
│   ├── header.php
│   ├── footer.php
│   ├── node-bar.php          # P2P status bar
│   └── api-modal.php         # API key configuration modal
└── README.md                 # You are here
```

**Key Files Explained**

- **`hub.php`** – The main dashboard view. Contains the hero section, D3 axis panels, active nodes grid, feature modules, and API constellation.
- **`proxy.php`** – A pure PHP proxy that receives POST requests with `{provider, prompt, api_key, model}` and forwards them to the respective LLM endpoint. All providers use a common system prompt (`PSP144_SYSTEM_PROMPT`, expected to be defined elsewhere) to ground the conversation in the PSP‑144 framework.
- **`ghost-mesh.js`** – Self‑contained canvas animation. Nodes are initialised with synthetic D3 influence (`pVal`, `bVal`) that biases their colour. Connections are drawn with interpolated gradients. The mouse creates a repulsion force.
- **`ghost-mesh.css`** – Defines the cosmic‑dark palette (`--void`, `--cyan`, `--purple`), typography (Orbitron, Rajdhani, Share Tech Mono), panel styles, button variants, and utility classes. All components inherit these design tokens.

---

## ✦ Setup & Configuration

### Requirements

- PHP 8.0+ (with cURL extension)
- A web server (Apache, Nginx, or PHP built‑in server)
- (Optional) API keys for the LLM providers you wish to use

### Local Installation

1. Clone the repository and navigate to the Web-Dashboard directory:
   ```bash
   git clone https://github.com/GhostMeshIO/UnifiedCognitionFramework.git
   cd UnifiedCognitionFramework/Web-Dashboard
   ```

2. Ensure the following constants are defined somewhere (e.g., in `php/config.php`):
   - `PSP144_API_TIMEOUT` – cURL timeout in seconds.
   - `PSP144_SYSTEM_PROMPT` – the PSP‑144 context injected into every LLM call.
   - `PSP144_APIS` – an array of provider definitions (name, icon, colour) as used in `hub.php`.

3. Place your API keys securely. The proxy expects the client to send the key with each request; you may extend it to read from environment variables.

4. Start the PHP built‑in server for testing:
   ```bash
   php -S localhost:8000
   ```
   Then open `http://localhost:8000` in your browser.

### Configuration Example

In `php/config.php` you might have:

```php
<?php
define('PSP144_API_TIMEOUT', 30);
define('PSP144_SYSTEM_PROMPT', 'You are operating within the PSP‑144 NQVP v2.0 framework…');

$PSP144_APIS = [
    'claude'    => ['name' => 'Claude 3.7', 'icon' => '🧠', 'color' => '#d97757'],
    'gpt'       => ['name' => 'GPT‑4o',     'icon' => '🤖', 'color' => '#10a37f'],
    // ...
];
?>
```

---

## ✦ Usage

### Navigating the Hub

- **Hero section** – Shows a live polytope visualisation (static canvas, can be animated later) and key metrics. Use the **Enter Crucible** and **Configure APIs** buttons to navigate.
- **D³ Axis Panels** – Each panel displays a current value, a percentage bar, a short description, and a placeholder for a mini‑chart. The bar fill and glow colours correspond to the axis (cyan = Precision, purple = Boundary, amber = Temporal).
- **Active Nodes** – Lists P2P nodes (data from `get_active_nodes()`). Node cards can show status, D3 influence, etc. (implementation of `render_node_card()` is expected).
- **Intelligence Modules** – Click any module card to launch its interface (page routing not yet implemented; buttons currently only visual).
- **API Constellation** – The coloured dots indicate whether a provider is configured (class `configured`). The **Quick Ask** input sends your question to all configured LLMs and displays responses in a grid.

### Quick Ask Example

1. Type a question into the input field (e.g., “Explain the Boundary axis in simple terms”).
2. Click the **Quick Ask All APIs** button.
3. The proxy sends the prompt (with PSP‑144 context prepended) to every provider that has a stored API key.
4. Results appear below, each in a card showing the provider name and the model’s response.

*Note: The JavaScript for `api-bridge.js` is not fully implemented in the provided files; you will need to write the client‑side code to collect keys, send POST requests to `?api=1`, and render the results.*

### Adding a New Module

To add a module to the grid, simply append an array to `$feature_modules` in `hub.php`:

```php
$feature_modules[] = [
    'id'    => 'new-module',
    'icon'  => '✨',
    'title' => 'New Module',
    'desc'  => 'Description of the new feature.',
    'color' => 'cyan'   // or 'purple', 'amber'
];
```

The module will automatically appear with the appropriate hover style and button.

---

## ✦ API Proxy Details

The proxy at `proxy.php` accepts POST requests with JSON bodies:

```json
{
  "provider": "claude",
  "prompt": "Your question here",
  "api_key": "sk-...",
  "model": "claude-3-opus-20240229"   // optional, provider default used if omitted
}
```

**Supported providers** (case‑sensitive):

- `claude`    → Anthropic Claude
- `gpt`       → OpenAI GPT‑4o / GPT‑4 Turbo
- `gemini`    → Google Gemini 1.5 Pro
- `grok`      → xAI Grok
- `deepseek`  → DeepSeek Chat
- `perplexity`→ Perplexity Sonar
- `copilot`   → GitHub Copilot (OpenAI compatible)
- `nova`      → Nova‑OSS
- `meta`      → Meta Llama 3.3
- `zai`       → z.ai

Each provider function injects the PSP‑144 system prompt (`PSP144_SYSTEM_PROMPT`) as a system message (or equivalent). The response is always a JSON object with either `{response: "...", provider, model}` or `{error: "..."}`.

**Security Note**: The proxy does **not** store API keys; they must be supplied by the client on each request. For production, consider implementing a server‑side key vault or use temporary session storage.

---

## ✦ Customising the Ghost Mesh

The canvas animation in `ghost-mesh.js` exposes its internal state via `window.PSP144_GhostMesh`. You can adjust parameters in the `CONFIG` object:

- `nodeCount`: number of nodes.
- `connectDist`: maximum distance for drawing connections.
- `nodeSpeed`: base movement speed.
- `pulseSpeed`: speed of node pulsation.
- `cyanColor` / `purpleColor`: RGB arrays for the two node colour families.
- `lineMaxOpacity`: maximum opacity of connection lines.

To integrate real D3 data, modify the `createNode` function to use actual `pVal` and `bVal` from your backend, and update node colours accordingly.

---

## ✦ Extending the Framework

The dashboard is intentionally modular. To add a new page:

1. Create `pages/newpage.php`.
2. Add `'newpage'` to the `$valid_pages` array in `index.php`.
3. Optionally define page‑specific styles in a separate CSS file and include them via `get_page_styles($page)` (function not shown, but can be implemented in `php/config.php`).

All pages share the same global layout (neural grid background, ghost mesh canvas, header, footer, node bar). The main content area is replaced with the page’s template.

---

## ✦ Related Resources

- [Full PSP‑144 Framework Document](The%20Psychics%20Protocol%20Framework%20v1.0%20(PSP-144_NQVP-144)%20An%20Exhaustive%20Research%20Architecture%20for%20Hyper-Correlational%20Information%20Processing.md) – Theoretical foundation and mathematical formalisms.
- [Ghost Mesh Main Repository](https://github.com/GhostMeshIO/UnifiedCognitionFramework) – The parent repository containing other components (e.g., Python core, mobile clients).

---

## ✦ License

This project is part of the Unified Cognition Framework and is released under the [MIT License](../LICENSE) (or as specified in the main repository).

---

*Built with 💡 by the Ghost Mesh collective.*
