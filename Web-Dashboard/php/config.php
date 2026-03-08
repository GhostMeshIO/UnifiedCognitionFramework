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
