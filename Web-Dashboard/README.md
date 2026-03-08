# PSP-144 NQVP Web Dashboard

**Part of the [Unified Cognition Framework](https://github.com/GhostMeshIO/UnifiedCognitionFramework)**  
*Hyper-Correlation Intelligence Interface*

The Web Dashboard is the primary real‑time visualization and control interface for the **Neuro‑Quantum Validation Protocol (NQVP‑144)**. It translates the dense theoretical constructs of the [Psychics Protocol Framework](The%20Psychics%20Protocol%20Framework%20v1.0%20(PSP-144_NQVP-144)%20An%20Exhaustive%20Research%20Architecture%20for%20Hyper-Correlational%20Information%20Processing.md) into a live operational console. Here you can monitor the D³ Triadic State Space (Precision, Boundary, Temporal), observe the Ghost Mesh P2P network, query a constellation of LLMs, and explore intelligence modules – all within a cosmic‑dark aesthetic driven by reactive shaders and autonomous swarm animations.

---

## ✦ Core Features (The 12 Directives)

| # | Directive | Implementation |
|---|-----------|----------------|
| 1 | **D³ Triadic Live Polytope** | Three animated panels show `𝒫 Precision`, `ℬ Boundary`, and `𝒯 Temporal` with live values, percentage bars, and range markers. A canvas (`#polytopeCanvas`) visualizes the Coherence Polytope health (`H_POLYTOPE`), mesh coherence, and spectral radius. |
| 2 | **Ghost Swarm JS Engine** | `ghost-mesh.js` renders an autonomous P2P node swarm in the background. Node colors (cyan/purple) and movement are influenced by D³ values; mouse interaction repels nodes, simulating a living mesh. |
| 3 | **PSP‑144 LLM Proxy Failover** | `proxy.php` provides a unified gateway to 10+ LLM providers (Claude, GPT‑4o, Gemini, Grok, DeepSeek, Perplexity, Copilot, Nova, Meta, zAI). Every prompt is automatically prefixed with the PSP‑144 system context. The architecture supports failover logic for high availability. |
| 4 | **Modular PHP Router** | `index.php` implements a clean routing system (`?page=hub`, `crucible`, …) with session handling and component‑based includes. New pages can be added by dropping a file in `pages/` and updating the `$valid_pages` array. |
| 5 | **Orbitron Reactive Shaders** | CSS variables (`ghost-mesh.css`) define a cosmic‑dark palette, neon glows, and panel effects. Typography uses Orbitron, Rajdhani, and Share Tech Mono for a technical, futuristic feel. Panels react to hover with animated borders and glows. |
| 6 | **WebRTC P2P Node Bar** | The top‑bar (`components/node-bar.php`) displays live peer counts (data from `get_active_nodes()`). Node cards in the hub show individual node status, ready to be extended with real WebRTC connection statistics. |
| 7 | **Drag Module Forge** | The intelligence modules grid (Bias Mirror, Flow Oracle, etc.) is built with flex/grid and can be extended with drag‑and‑drop reordering. Each card has a unique ID and color‑coded hover effects, paving the way for a modular forge. |
| 8 | **Axiom Multi‑Oracle** | The API constellation panel lists all configured providers. The “Quick Ask” feature broadcasts a single prompt to multiple LLMs simultaneously, aggregating responses – a true multi‑oracle approach to querying the framework axioms. |
| 9 | **144 Shortcoming Tracker** | A dedicated page (`?page=shortcomings`) lists the 144 documented limitations of PSP‑144 (placeholder content). This ensures transparency and guides future research efforts. |
| 10 | **AR Camera Veil** | Placeholder for augmented reality integration. The modular page system is ready to host AR modules that overlay D³ data on live camera feeds (future enhancement). |
| 11 | **Temporal Flux Chain** | The Temporal axis panel includes a mini‑chart placeholder for historical trends. Future versions will display time‑series prediction chains using the Time Chain module. |
| 12 | **Hive Coherence Meter** | The polytope stats area shows mesh coherence percentage and spectral radius – a live meter of collective network stability across the Ghost Mesh. |

---

## ✦ Architecture

```
Web-Dashboard/
├── index.php                 # Master router, loads core CSS/JS and page content
├── pages/                    # Individual page templates (hub.php, crucible.php, …)
├── php/
│   ├── config.php            # Constants, node generation, shortcomings list
│   └── nodes.php             # (optional) node data functions
├── api/proxy.php             # Multi‑LLM gateway (called via ?api=1)
├── components/               # Reusable HTML fragments
│   ├── header.php
│   ├── footer.php
│   ├── node-bar.php          # P2P status bar with simulated WebRTC stats
│   └── api-modal.php         # API key configuration modal
├── css/
│   ├── ghost-mesh.css        # Core visual system (variables, panels, grids)
│   ├── nodes.css             # Node card styling (placeholder)
│   ├── panels.css            # Additional panel styles (placeholder)
│   └── animations.css        # Keyframe animations (scanlines, shimmer)
├── js/
│   ├── ghost-mesh.js         # Canvas animation engine with D³ influence
│   ├── nodes.js              # Node click handler
│   ├── api-bridge.js         # Client‑side API calls (Quick Ask)
│   ├── d3-triadic.js         # D³ chart updates & live metrics
│   ├── animations.js         # Scroll reveals, etc. (placeholder)
│   └── drag-module.js        # Drag‑and‑drop module reordering
└── README.md                 # You are here
```

**Key Components**

- **hub.php** – The main dashboard view. Contains the hero section, D³ axis panels (each with a live sparkline), active nodes grid, draggable feature modules, and API constellation.
- **proxy.php** – Accepts POST requests with `{provider, prompt, api_key, model, failover}` and forwards them to the respective LLM endpoint. All responses are returned as JSON. Supports automatic failover to other providers.
- **ghost-mesh.js** – Self‑contained canvas animation. Nodes are initialised with D³ influence (`pVal`, `bVal`) that biases their colour. Connections are drawn with interpolated gradients; the mouse creates a repulsion force.
- **d3-triadic.js** – Fetches live D³ metrics (simulated random walk) every 3 seconds, updates the displayed values, bar widths, polytope stats, and the three sparkline charts. Also updates the Ghost Mesh colour palette.
- **api-bridge.js** – Handles the “Quick Ask” feature: collects all configured API keys from `localStorage`, sends parallel requests to `proxy.php`, and displays the results in a grid. Keys are never stored on the server.
- **drag-module.js** – Enables drag‑and‑drop reordering of the intelligence modules. The new order is saved to `localStorage` and persists across page loads.

---

## ✦ Setup & Configuration

### Requirements

- PHP 8.0+ (with cURL extension)
- A web server (Apache, Nginx, or PHP built‑in server)
- (Optional) API keys for the LLM providers you wish to use

### Installation

1. **Clone the repository** and navigate to the Web-Dashboard directory:
   ```bash
   git clone https://github.com/GhostMeshIO/UnifiedCognitionFramework.git
   cd UnifiedCognitionFramework/Web-Dashboard
   ```

2. **Configure constants** in `php/config.php` (create if missing). Example:
   ```php
   <?php
   define('PSP144_API_TIMEOUT', 30);
   define('PSP144_SYSTEM_PROMPT', 'You are operating within the PSP‑144 NQVP v2.0 framework…');

   // List of supported API providers
   $PSP144_APIS = [
       'claude'    => ['name' => 'Claude 3.7', 'icon' => '🧠', 'color' => '#d97757'],
       'gpt'       => ['name' => 'GPT‑4o',     'icon' => '🤖', 'color' => '#10a37f'],
       'gemini'    => ['name' => 'Gemini 1.5', 'icon' => '✨', 'color' => '#1e88e5'],
       'grok'      => ['name' => 'Grok',       'icon' => '𝕏',  'color' => '#ffffff'],
       'deepseek'  => ['name' => 'DeepSeek',   'icon' => '🧪', 'color' => '#4d6bfe'],
       'perplexity'=> ['name' => 'Perplexity', 'icon' => '🔍', 'color' => '#1f2b3c'],
       'copilot'   => ['name' => 'Copilot',    'icon' => '🪁', 'color' => '#6f2da8'],
       'nova'      => ['name' => 'Nova',       'icon' => '🌟', 'color' => '#ff6b6b'],
       'meta'      => ['name' => 'Meta',       'icon' => '📘', 'color' => '#1877f2'],
       'zai'       => ['name' => 'z.ai',       'icon' => '⚡', 'color' => '#f5c542'],
   ];

   // Synthetic node generator for demo
   function get_active_nodes() {
       $nodes = [];
       for ($i = 0; $i < rand(5, 12); $i++) {
           $nodes[] = [
               'id' => uniqid(),
               'name' => 'Node_' . chr(65 + $i),
               'icon' => '●',
               'status' => 'active',
               'pVal' => rand(80, 240) / 100,
               'bVal' => rand(20, 200) / 100,
           ];
       }
       return $nodes;
   }

   function render_node_card($node) {
       return '<div class="node-card">' . htmlspecialchars($node['name']) . '</div>';
   }

   function get_d3_metrics() {
       return [
           'precision' => ['value' => 1.34, 'unit' => 'μV·ms⁻¹', 'pct' => 55, 'status' => 'nominal'],
           'boundary'  => ['value' => 0.72, 'unit' => 'FC ratio',  'pct' => 28, 'status' => 'low'],
           'temporal'  => ['value' => 0.45, 'unit' => 'log-k z',   'pct' => 60, 'status' => 'nominal'],
       ];
   }
   ?>
   ```

3. **Start the PHP built‑in server** for testing:
   ```bash
   php -S localhost:8000
   ```
   Open `http://localhost:8000` in your browser.

4. **Configure API keys** (optional):
   - Click the “🔌 APIs” button in the header.
   - Enter your API keys for the providers you wish to use.
   - Keys are saved in your browser’s `localStorage` and are never sent to our server except through the proxy (which forwards them directly to the LLM provider).

---

## ✦ Usage

### Navigating the Hub

- **Hero section** – Displays the Coherence Polytope visualisation and key metrics. Use **Enter Crucible** and **Configure APIs** to navigate.
- **D³ Axis Panels** – Each panel shows a current value, a percentage bar, a short description, and a live sparkline chart. The bar fill and glow colours correspond to the axis (cyan = Precision, purple = Boundary, amber = Temporal). Values update every 3 seconds.
- **Active Nodes** – Lists P2P nodes from `get_active_nodes()`. Node cards show status and D³ influence.
- **Intelligence Modules** – Drag any module card to reorder the grid. Click the “LAUNCH” button to navigate to its dedicated page (page routing not yet implemented; buttons currently only visual).
- **API Constellation** – Configured providers show a green dot. The **Quick Ask** input sends your question to all configured LLMs and displays responses.

### Quick Ask

1. Type a question into the input field (e.g., “Explain the Boundary axis in simple terms”).
2. Click **Quick Ask All APIs**.
3. The proxy sends the prompt (with PSP‑144 context prepended) to every provider that has a stored API key.
4. Results appear below, each in a card showing the provider name and the model’s response. If a provider fails, the proxy’s failover logic will automatically try other providers (when `failover` flag is enabled).

### Drag Modules

- Click and drag any module card to a new position.
- The new order is automatically saved and will persist after page refresh.
- Visual feedback: the card becomes semi‑transparent while dragging, and the cursor changes to a grabbing hand.

### Shortcoming Tracker

Visit `?page=shortcomings` to see the 144 documented limitations of the PSP‑144 framework. Each item includes an index, description, and a status dot (open by default). This page helps guide future research and validation efforts.

### AR Camera Veil (Placeholder)

Visit `?page=ar-veil` for a preview of the upcoming augmented reality overlay. The interface is ready for future WebXR integration.

---

## ✦ API Proxy Details

The proxy at `proxy.php` accepts POST requests with JSON bodies:

```json
{
  "provider": "claude",
  "prompt": "Your question here",
  "api_key": "sk-...",
  "model": "claude-3-opus-20240229",   // optional
  "failover": true                      // optional, default false
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

**Failover mode**: When `failover` is `true`, the proxy will try the requested provider first; if it fails, it automatically attempts the next provider in a predefined list, returning the first successful response along with a `failover_tried` array.

**Security**: API keys are **never logged** and are only used to authenticate the request to the upstream provider. The proxy does **not** store any keys.

---

## ✦ Customising the Ghost Mesh

The canvas animation in `ghost-mesh.js` exposes its internal state via `window.PSP144_GhostMesh`. Adjust parameters in the `CONFIG` object:

```javascript
const CONFIG = {
    nodeCount:      28,
    connectDist:    180,
    nodeSpeed:      0.4,
    pulseSpeed:     0.015,
    cyanColor:      [0,   255, 255],
    purpleColor:    [168,  85, 247],
    // ...
};
```

To integrate real D³ data, modify the `createNode` function to use actual `pVal` and `bVal` from your backend, and update node colours accordingly. The `updateD3Metrics` method can be called to refresh the swarm based on new metrics.

---

## ✦ Extending the Framework

### Adding a New Page

1. Create `pages/newpage.php`.
2. Add `'newpage'` to the `$valid_pages` array in `index.php`.
3. Optionally define page‑specific styles in a separate CSS file and include them via the `$page_styles` array in `index.php`.

All pages share the same global layout (neural grid background, ghost mesh canvas, header, footer, node bar). The main content area is replaced with the page’s template.

### Adding a New Module

Simply append an array to `$feature_modules` in `hub.php`:

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

### Adding a New API Provider

1. Add the provider to `$PSP144_APIS` in `php/config.php`.
2. Implement a calling function in `proxy.php` (e.g., `call_newprovider`).
3. Add a `match` case in `route_to_provider()`.
4. Update the provider list in `api-bridge.js` if you want it included in Quick Ask.

---

## ✦ Testing

A simple test suite is not yet included, but you can manually verify:

- **D³ updates**: Open browser console and watch for `fetchD3Metrics` every 3 seconds.
- **Quick Ask**: Enter a prompt and check that results appear (even with dummy keys you should see error cards).
- **Drag & drop**: Reorder modules and refresh – order should persist.
- **Node bar**: Observe peer count, status, and latency changes every 5 seconds.
- **API key modal**: Open, enter keys, save, and verify that green dots appear in the constellation.

For automated testing, you can use PHPUnit for proxy endpoints and Jest for JavaScript modules (future work).

---

## ✦ License

This project is part of the Unified Cognition Framework and is released under the [MIT License](../LICENSE) (or as specified in the main repository).

---

## ✦ Related Resources

- [Full PSP‑144 Framework Document](The%20Psychics%20Protocol%20Framework%20v1.0%20(PSP-144_NQVP-144)%20An%20Exhaustive%20Research%20Architecture%20for%20Hyper-Correlational%20Information%20Processing.md) – Theoretical foundation and mathematical formalisms.
- [Ghost Mesh Main Repository](https://github.com/GhostMeshIO/UnifiedCognitionFramework) – The parent repository containing other components (e.g., Python core, mobile clients).

---

*Built with ⚛️ by the Ghost Mesh collective.*
