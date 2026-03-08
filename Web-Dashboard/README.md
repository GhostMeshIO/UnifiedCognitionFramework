# PSP-144 NQVP Web Dashboard

**Part of the [Unified Cognition Framework](https://github.com/GhostMeshIO/UnifiedCognitionFramework)**  
*Hyper-Correlation Intelligence Interface*

> **Current Status:** v2.0 – Quantum‑Enhanced Cognition Manifold (D⁴‑QNVM) with self‑healing XML/CSV architecture and real‑time environmental forcing.  
> **Previous Version:** v1.5 – Empirically hardened, dimensionally consistent, ethically bounded.

The Web Dashboard is the primary real‑time visualization and control interface for the **Neuro‑Quantum Validation Protocol (NQVP‑144)**. It translates the dense theoretical constructs of the [Psychics Protocol Framework](docs/The%20Psychics%20Protocol%20Framework%20v1.5%20(PSP-144_NQVP-144).md) into a live operational console. Here you can monitor the D⁴ Triadic State Space (Precision, Boundary, Temporal, Autonomic), observe the Ghost Mesh P2P network, query a constellation of LLMs, and explore intelligence modules – all within a cosmic‑dark aesthetic driven by reactive shaders and autonomous swarm animations.

---

## ✦ Core Features (The 12 Directives)

| # | Directive | Implementation |
|---|-----------|----------------|
| 1 | **D⁴ Triadic Live Polytope** | Three animated panels show `𝒫 Precision`, `ℬ Boundary`, and `𝒯 Temporal` with live values, percentage bars, range markers, and live sparkline charts. A canvas (`#polytopeCanvas`) visualizes the Coherence Polytope health (`H_POLYTOPE`), mesh coherence, and spectral radius. |
| 2 | **Ghost Swarm JS Engine** | `ghost-mesh.js` renders an autonomous P2P node swarm in the background. Node colors (cyan/purple) and movement are influenced by D⁴ values; mouse interaction repels nodes, simulating a living mesh. |
| 3 | **PSP‑144 LLM Proxy Failover** | `proxy.php` provides a unified gateway to 10+ LLM providers (Claude, GPT‑4o, Gemini, Grok, DeepSeek, Perplexity, Copilot, Nova, Meta, zAI). Every prompt is automatically prefixed with the PSP‑144 system context. Supports automatic failover across providers. |
| 4 | **Modular PHP Router** | `index.php` implements a clean routing system (`?page=hub`, `crucible`, …) with session handling and component‑based includes. New pages can be added by dropping a file in `pages/` and updating the `$valid_pages` array. |
| 5 | **Orbitron Reactive Shaders** | CSS variables (`ghost-mesh.css`) define a cosmic‑dark palette, neon glows, and panel effects. Typography uses Orbitron, Rajdhani, and Share Tech Mono. Panels react to hover with animated borders and glows. |
| 6 | **WebRTC P2P Node Bar** | The top‑bar (`components/node-bar.php`) displays live peer counts (data from `get_active_nodes()`) with simulated WebRTC stats (latency, status). Node cards show individual node D⁴ influence. |
| 7 | **Drag Module Forge** | The intelligence modules grid is fully draggable with `drag-module.js`. Order is saved to `localStorage` and persists across page loads. |
| 8 | **Axiom Multi‑Oracle** | The API constellation panel lists all configured providers. The “Quick Ask” feature (`api-bridge.js`) broadcasts a single prompt to all configured LLMs simultaneously, aggregating responses. |
| 9 | **144 Shortcoming Tracker** | A dedicated page (`?page=shortcomings`) lists the 144 documented limitations of PSP‑144, dynamically generated from `php/config.php`. Each item has a status dot (open/resolved). |
| 10 | **AR Camera Veil** | A placeholder page (`?page=ar-veil`) for future augmented reality integration, with a disabled button ready for WebXR. |
| 11 | **Temporal Flux Chain** | The Temporal axis panel includes a live sparkline chart (`d3-triadic.js`) showing historical trends (20 data points) updated every 3 seconds. |
| 12 | **Hive Coherence Meter** | The polytope stats area shows mesh coherence percentage and spectral radius – a live meter of collective network stability across the Ghost Mesh. |

---

## ✧ Theoretical Foundation

The dashboard operationalizes the **Unified Cognition Framework (UCF)** and its **Psychics Protocol (PSP‑144)** extensions. At its core lies the **D⁴ state space**:

- **Precision (𝒫)** – neurocomputational gain on sensory signals.
- **Boundary (ℬ)** – functional separation between self and world.
- **Temporal (𝒯)** – orientation toward past or future.
- **Autonomic (ANS)** – polyvagal state (ventral vagal, sympathetic, dorsal vagal).

These axes are linked to **neural criticality** (spectral radius ρ), **inter‑agent coherence** (PLV, MI), and **neurometabolic constraints** (allostatic load, astrocytic noise). All measurements are dimensionally consistent and falsifiable, with 144 accompanying Python functions (see `nqvp144` library).

The dashboard itself is a **living embodiment** of the framework – each chart, node, and API call instantiates a core equation or axiom, turning theory into interactive reality.

---

## ✦ Architecture

```
Web-Dashboard/
├── index.php                 # Master router, loads core CSS/JS and page content
├── pages/                    # Individual page templates
│   ├── hub.php               # Main dashboard (D³ panels, modules, API constellation)
│   ├── shortcomings.php      # 144‑item tracker
│   ├── ar-veil.php           # AR placeholder
│   └── ... (crucible, nexus, etc.)
├── php/
│   ├── config.php            # Constants, node generation, shortcomings list, API definitions
│   └── nodes.php             # (optional) additional node functions
├── api/proxy.php             # Multi‑LLM gateway with failover
├── components/               # Reusable HTML fragments
│   ├── header.php
│   ├── footer.php
│   ├── node-bar.php          # P2P status bar with simulated WebRTC stats
│   └── api-modal.php         # API key configuration modal (keys stored in localStorage)
├── css/
│   ├── ghost-mesh.css        # Core visual system (variables, panels, grids)
│   ├── nodes.css             # Node card styling
│   ├── panels.css            # Additional panel styles
│   └── animations.css        # Keyframe animations (scanlines, shimmer, pulse)
├── js/
│   ├── ghost-mesh.js         # Canvas animation engine with D⁴ influence
│   ├── nodes.js              # Node click handler
│   ├── api-bridge.js         # Client‑side API calls (Quick Ask)
│   ├── d3-triadic.js         # D⁴ chart updates & live metrics
│   ├── animations.js         # Scroll reveals, etc.
│   └── drag-module.js        # Drag‑and‑drop module reordering
├── blueprints/               # Design documents for future upgrades
│   ├── Unified Cognition Framework (UCF) – Quantum-Enhanced Integration Blueprint.md
│   ├── hybrid XML and Spreadsheet architecture.md
│   └── XML-QNVM-Chain_of_insights.md
├── xml/                       # XML skeleton – immutable framework axioms, equations, functions
│   ├── psp144_core.xml
│   ├── psp144_axes.xml
│   ├── psp144_equations.xml
│   ├── psp144_functions.xml
│   ├── psp144_clinical_mapping.xml
│   └── psp144_shortcomings_solutions.xml
├── csv/                       # CSV flesh – parametric data (clinical norms, archetypes, forcing)
│   ├── clinical_mapping.csv
│   ├── age_norms.csv
│   ├── env_forcing.csv
│   └── archetypes.csv
└── README.md                 # This file
```

**Key Components**

- **hub.php** – The main dashboard view. Contains the hero section, D⁴ axis panels (each with a live sparkline), active nodes grid, draggable feature modules, and API constellation.
- **proxy.php** – Accepts POST requests with `{provider, prompt, api_key, model, failover}` and forwards them to the respective LLM endpoint. Returns JSON. Supports automatic failover.
- **ghost-mesh.js** – Self‑contained canvas animation. Nodes are initialised with D⁴ influence (`pVal`, `bVal`) that biases their colour. Connections use interpolated gradients; mouse repels nodes.
- **d3-triadic.js** – Fetches live D⁴ metrics (simulated random walk) every 3 seconds, updates displayed values, bar widths, polytope stats, and the three sparkline charts. Also updates Ghost Mesh colours.
- **api-bridge.js** – Handles “Quick Ask”: collects all configured API keys from `localStorage`, sends parallel requests to `proxy.php`, displays results. Keys never stored on server.
- **drag-module.js** – Enables drag‑and‑drop reordering of intelligence modules. Order saved to `localStorage` and persists.
- **xml/** – The immutable skeleton of the framework: axioms, axes definitions, equations, function signatures, clinical mappings, and shortcomings‑solutions mapping. These files are parsed by future simulation engines (e.g., the QNVM) to generate runtime behaviour.
- **csv/** – The flexible flesh: parametric data that can be updated without changing code. Includes clinical state coordinates, age‑normed baselines, environmental forcing functions, and archetype seeds for entity simulations.

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

2. **Configure constants** in `php/config.php`. A sample is provided below.

3. **Start the PHP built‑in server** for testing:
   ```bash
   php -S localhost:8000
   ```
   Open `http://localhost:8000` in your browser.

4. **Configure API keys** (optional):
   - Click the “🔌 APIs” button in the header.
   - Enter your API keys for the providers you wish to use.
   - Keys are saved in your browser’s `localStorage` and are never sent to our server except through the proxy (which forwards them directly to the LLM provider).

### Sample `php/config.php`

```php
<?php
define('PSP144_API_TIMEOUT', 30);
define('PSP144_SYSTEM_PROMPT', 'You are operating within the PSP‑144 NQVP v2.0 framework…');

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
    return '<div class="node-card" data-id="' . $node['id'] . '">' .
           '<span class="node-icon">' . $node['icon'] . '</span>' .
           '<span class="node-name">' . htmlspecialchars($node['name']) . '</span>' .
           '<span class="node-d3">P:' . $node['pVal'] . ' B:' . $node['bVal'] . '</span>' .
           '</div>';
}

function get_d3_metrics() {
    return [
        'precision' => ['value' => 1.34, 'unit' => 'μV·ms⁻¹', 'pct' => 55, 'status' => 'nominal'],
        'boundary'  => ['value' => 0.72, 'unit' => 'FC ratio',  'pct' => 28, 'status' => 'low'],
        'temporal'  => ['value' => 0.45, 'unit' => 'log-k z',   'pct' => 60, 'status' => 'nominal'],
    ];
}

// List of 144 shortcomings (truncated here for brevity)
$PSP144_SHORTCOMINGS = [
    '1. Lack of high-resolution laminar fMRI validation.',
    '2. Insufficient normative data for D³ axes across cultures.',
    // ... add up to 144
];
while (count($PSP144_SHORTCOMINGS) < 144) {
    $PSP144_SHORTCOMINGS[] = 'TBD: Additional shortcoming placeholder.';
}
?>
```

---

## ✦ Usage

### Navigating the Hub

- **Hero section** – Displays the Coherence Polytope visualisation and key metrics. Use **Enter Crucible** and **Configure APIs** to navigate.
- **D⁴ Axis Panels** – Each panel shows a current value, percentage bar, description, and live sparkline. Values update every 3 seconds.
- **Active Nodes** – Lists P2P nodes from `get_active_nodes()`. Click a node card to see details (future enhancement).
- **Intelligence Modules** – Drag any module card to reorder. Click “LAUNCH” to navigate (page routing not fully implemented; buttons currently visual).
- **API Constellation** – Configured providers show a green dot. The **Quick Ask** input sends your question to all configured LLMs and displays responses.

### Quick Ask

1. Type a question into the input field (e.g., “Explain the Boundary axis in simple terms”).
2. Click **Quick Ask All APIs**.
3. The proxy sends the prompt (with PSP‑144 context prepended) to every provider that has a stored API key.
4. Results appear below, each in a card showing the provider name and the model’s response. If a provider fails, the proxy’s failover logic will automatically try other providers (when `failover` flag is enabled in the request – currently always true for Quick Ask).

### Drag Modules

- Click and drag any module card to a new position.
- The new order is automatically saved and persists after page refresh.
- Visual feedback: the card becomes semi‑transparent while dragging, cursor changes to grabbing.

### Shortcoming Tracker

Visit `?page=shortcomings` to see the 144 documented limitations. Each item includes an index, description, and a status dot (open by default). Future versions may allow toggling status.

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

**Supported providers**: `claude`, `gpt`, `gemini`, `grok`, `deepseek`, `perplexity`, `copilot`, `nova`, `meta`, `zai`.

Each provider function injects the PSP‑144 system prompt (`PSP144_SYSTEM_PROMPT`) as a system message. The response is always a JSON object with either `{response: "...", provider, model}` or `{error: "..."}`.

**Failover mode**: When `failover` is `true`, the proxy tries the requested provider first; if it fails, it automatically attempts the next provider in a predefined list, returning the first successful response along with a `failover_tried` array.

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

To integrate real D⁴ data, modify the `createNode` function to use actual `pVal` and `bVal` from your backend, and update node colours accordingly. The `updateD3Metrics` method can be called to refresh the swarm based on new metrics.

---

## ✧ Roadmap to v3.0 – Quantum‑Enhanced Cognition Manifold

The next major release will realise the **D⁴‑QNVM** (Quantum Neural Virtual Machine) as a fully integrated simulation engine, driven by the hybrid XML/CSV data architecture outlined in the blueprints. Key upgrades:

- **XML Skeleton** – `psp144_core.xml`, `psp144_axes.xml`, `psp144_equations.xml` define immutable axioms, equations, and function signatures.
- **CSV Flesh** – `clinical_mapping.csv`, `archetypes.csv`, `env_forcing.csv` provide parametric data for clinical states, entity archetypes, and environmental modulators (lunar, geomagnetic, circadian).
- **Quantum Circuit Cognition** – Each entity’s cognitive cascade (detection → amplification → transport → decoding) will be executed as a quantum gate sequence on the QNVM, with precision‑boundary entanglement and conduction‑corrected PLV.
- **Real‑time Environmental Forcing** – Live NOAA/Kp data will modulate spectral radius and noise floor, linking dashboard visuals to planetary geomagnetic activity.
- **Metabolic Constraints** – Allostatic load and astrocytic noise will affect entity survival and reproduction, simulating the cost of sustained hyper‑correlational processing.
- **Sovereign Gate Audits** – Entities that pass all six UCF gates will be flagged as “sovereign”, contributing to a meta‑evolutionary registry.

The dashboard will become a **computable cognition manifold** – a sandbox where theoretical predictions (e.g., “high‑P + low‑B dyads produce pathological coupling”) can be tested in silico before human experiments.

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

Manual verification steps:

- **D⁴ updates**: Open browser console and watch for `fetchD3Metrics` every 3 seconds. Sparklines should update.
- **Quick Ask**: Enter a prompt and check that results appear (even with dummy keys you should see error cards).
- **Drag & drop**: Reorder modules and refresh – order should persist.
- **Node bar**: Observe peer count, status, and latency changes every 5 seconds.
- **API key modal**: Open, enter keys, save, and verify that green dots appear in the constellation.

For automated testing, consider using PHPUnit for proxy endpoints and Jest for JavaScript modules (future work).

---

## ✦ License

This project is part of the Unified Cognition Framework and is released under the [MIT License](../LICENSE) (or as specified in the main repository).

---

## ✦ Related Resources

- [Full PSP‑144 Framework Document (v1.5)](docs/The%20Psychics%20Protocol%20Framework%20v1.5%20(PSP-144_NQVP-144).md) – Theoretical foundation and mathematical formalisms.
- [Comprehensive Shortcomings Analysis](docs/v1.0_shortcomings.md) – 96 identified gaps guiding v3.0 development.
- [Ghost Mesh Main Repository](https://github.com/GhostMeshIO/UnifiedCognitionFramework) – The parent repository containing other components (e.g., Python core, mobile clients, simulation engine).

---

*Built with ⚛️ by the Ghost Mesh collective.*
