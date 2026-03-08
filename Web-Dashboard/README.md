# PSP-144 NQVP Web Dashboard

**Part of the [Unified Cognition Framework](https://github.com/GhostMeshIO/UnifiedCognitionFramework)**  
*Hyper-Correlation Intelligence Interface*

The Web Dashboard is the primary real‑time visualization and control interface for the **Neuro‑Quantum Validation Protocol (NQVP‑144)**. It translates the dense theoretical constructs of the [Psychics Protocol Framework](The%20Psychics%20Protocol%20Framework%20v1.0%20(PSP-144_NQVP-144)%20An%20Exhaustive%20Research%20Architecture%20for%20Hyper-Correlational%20Information%20Processing.md) into a live operational console. Here you can monitor D³ Triadic state space, observe the Ghost Mesh P2P network, query a constellation of LLMs, and explore intelligence modules – all within a cosmic‑dark aesthetic driven by reactive shaders and autonomous swarm animations.

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
├── php/                      # Backend logic (config.php, nodes.php)
├── api/proxy.php             # Multi‑LLM gateway (called via ?api=1)
├── css/                      # Stylesheets
│   ├── ghost-mesh.css        # Core visual system (variables, panels, grids)
│   ├── nodes.css             # Node card styling (placeholder)
│   ├── panels.css            # Additional panel styles (placeholder)
│   └── animations.css        # Keyframe animations (placeholder)
├── js/                       # JavaScript modules
│   ├── ghost-mesh.js         # Canvas animation engine
│   ├── nodes.js              # Node data handling (placeholder)
│   ├── api-bridge.js         # Client‑side API calls (placeholder)
│   ├── d3-triadic.js         # D3 chart updates (placeholder)
│   └── animations.js         # Scroll reveals, etc. (placeholder)
├── components/               # Reusable HTML fragments
│   ├── header.php
│   ├── footer.php
│   ├── node-bar.php          # P2P status bar
│   └── api-modal.php         # API key configuration modal
└── README.md                 # You are here
```

**Key Components**

- **hub.php** – The main dashboard view. Contains the hero section, D³ axis panels, active nodes grid, feature modules, and API constellation.
- **proxy.php** – Accepts POST requests with `{provider, prompt, api_key, model}` and forwards them to the respective LLM endpoint. All responses are returned as JSON.
- **ghost-mesh.js** – Self‑contained canvas animation. Nodes are initialised with synthetic D³ influence (`pVal`, `bVal`) that biases their colour. Connections are drawn with interpolated gradients; the mouse creates a repulsion force.
- **ghost-mesh.css** – Defines design tokens (`--void`, `--cyan`, `--purple`), panel styles, button variants, and utility classes. All components inherit these.

---

## ✦ Setup & Configuration

### Requirements

- PHP 8.0+ (with cURL extension)
- A web server (Apache, Nginx, or PHP built‑in server)
- (Optional) API keys for the LLM providers you wish to use

### Installation

1. Clone the repository and navigate to the Web-Dashboard directory:
   ```bash
   git clone https://github.com/GhostMeshIO/UnifiedCognitionFramework.git
   cd UnifiedCognitionFramework/Web-Dashboard
   ```

2. Define required constants in `php/config.php` (create if missing):
   ```php
   <?php
   define('PSP144_API_TIMEOUT', 30);
   define('PSP144_SYSTEM_PROMPT', 'You are operating within the PSP‑144 NQVP v2.0 framework…');

   $PSP144_APIS = [
       'claude'    => ['name' => 'Claude 3.7', 'icon' => '🧠', 'color' => '#d97757'],
       'gpt'       => ['name' => 'GPT‑4o',     'icon' => '🤖', 'color' => '#10a37f'],
       // ... add all providers you support
   ];
   ?>
   ```

3. (Optional) Implement `get_active_nodes()` in `php/nodes.php` to return real P2P node data.

4. Start the PHP built‑in server for testing:
   ```bash
   php -S localhost:8000
   ```
   Open `http://localhost:8000` in your browser.

---

## ✦ Usage

### Navigating the Hub

- **Hero section** – Displays the Coherence Polytope visualisation and key metrics. Use **Enter Crucible** and **Configure APIs** to navigate.
- **D³ Axis Panels** – Each panel shows a current value, a percentage bar, and a short description. The bar fill and glow colours correspond to the axis (cyan = Precision, purple = Boundary, amber = Temporal). Mini‑chart placeholders are ready for D3 integration.
- **Active Nodes** – Lists P2P nodes from `get_active_nodes()`. Node cards can show status, D3 influence, etc. (customise via `render_node_card()`).
- **Intelligence Modules** – Click any module card to launch its interface (page routing not yet implemented; buttons currently only visual).
- **API Constellation** – Coloured dots indicate whether a provider is configured (add class `configured` via JavaScript). The **Quick Ask** input sends your question to all configured LLMs and displays responses.

### Quick Ask Example

1. Type a question into the input field (e.g., “Explain the Boundary axis in simple terms”).
2. Click **Quick Ask All APIs**.
3. The proxy sends the prompt (with PSP‑144 context prepended) to every provider that has a stored API key.
4. Results appear below, each in a card showing the provider name and the model’s response.

*Note: You need to implement the client‑side code in `api-bridge.js` to collect keys, send POST requests to `?api=1`, and render the results.*

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

To integrate real D³ data, modify the `createNode` function to use actual `pVal` and `bVal` from your backend, and update node colours accordingly.

---

## ✦ Extending the Framework

### Adding a New Page

1. Create `pages/newpage.php`.
2. Add `'newpage'` to the `$valid_pages` array in `index.php`.
3. Optionally define page‑specific styles in a separate CSS file and include them via `get_page_styles($page)` (implement this function in `php/config.php`).

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

---

## ✦ Related Resources

- [Full PSP‑144 Framework Document](The%20Psychics%20Protocol%20Framework%20v1.0%20(PSP-144_NQVP-144)%20An%20Exhaustive%20Research%20Architecture%20for%20Hyper-Correlational%20Information%20Processing.md) – Theoretical foundation and mathematical formalisms.
- [Ghost Mesh Main Repository](https://github.com/GhostMeshIO/UnifiedCognitionFramework) – The parent repository containing other components (e.g., Python core, mobile clients).

---

## ✦ License

This project is part of the Unified Cognition Framework and is released under the [MIT License](../LICENSE) (or as specified in the main repository).

---

*Built with ⚛️ by the Ghost Mesh collective.*
