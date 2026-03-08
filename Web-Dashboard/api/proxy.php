<?php
// PSP-144 API Proxy — Multi-LLM Bridge with Failover (v2.0)
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(204); exit; }
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { echo json_encode(['error' => 'Method not allowed']); exit; }

$body = json_decode(file_get_contents('php://input'), true);
$provider = $body['provider'] ?? 'claude';
$prompt = $body['prompt'] ?? '';
$apiKey = $body['api_key'] ?? '';
$context = $body['context'] ?? PSP144_SYSTEM_PROMPT;
$model = $body['model'] ?? null;
$failover = $body['failover'] ?? false;

if (empty($prompt)) { echo json_encode(['error' => 'No prompt provided']); exit; }

$fullPrompt = "FRAMEWORK CONTEXT: PSP-144 NQVP v2.0 — D3 Triadic State Space (Precision/Boundary/Temporal axes)\n\n" . $prompt;

if ($failover) {
    $providers = ['claude', 'gpt', 'gemini', 'grok', 'deepseek', 'perplexity', 'copilot', 'nova', 'meta', 'zai'];
    $index = array_search($provider, $providers);
    if ($index === false) $index = 0;
    $tried = [];
    for ($i = $index; $i < count($providers); $i++) {
        $p = $providers[$i];
        if (in_array($p, $tried)) continue;
        $tried[] = $p;
        $result = route_to_provider($p, $fullPrompt, $apiKey, $context, $model);
        if (!isset($result['error'])) {
            $result['failover_tried'] = $tried;
            echo json_encode($result);
            exit;
        }
    }
    echo json_encode(['error' => 'All providers failed', 'tried' => $tried]);
    exit;
} else {
    echo json_encode(route_to_provider($provider, $fullPrompt, $apiKey, $context, $model));
}

function route_to_provider(string $provider, string $prompt, string $apiKey, string $context, ?string $model): array {
    return match($provider) {
        'claude'     => call_claude($prompt, $apiKey, $context, $model ?? 'claude-3-opus-20240229'),
        'gpt'        => call_openai($prompt, $apiKey, $context, $model ?? 'gpt-4o'),
        'gemini'     => call_gemini($prompt, $apiKey, $context, $model ?? 'gemini-1.5-pro'),
        'grok'       => call_xai($prompt, $apiKey, $context, $model ?? 'grok-beta'),
        'deepseek'   => call_openai_compat($prompt, $apiKey, $context, 'https://api.deepseek.com/v1/chat/completions', $model ?? 'deepseek-chat'),
        'perplexity' => call_openai_compat($prompt, $apiKey, $context, 'https://api.perplexity.ai/chat/completions', $model ?? 'llama-3.1-sonar-large-128k-online'),
        'copilot'    => call_openai_compat($prompt, $apiKey, $context, 'https://api.githubcopilot.com/chat/completions', $model ?? 'gpt-4o'),
        'nova'       => call_openai_compat($prompt, $apiKey, $context, 'https://api.nova-oss.com/v1/chat/completions', $model ?? 'nova-pro'),
        'meta'       => call_openai_compat($prompt, $apiKey, $context, 'https://api.meta.ai/v1/chat/completions', $model ?? 'llama-3.3-70b'),
        'zai'        => call_openai_compat($prompt, $apiKey, $context, 'https://api.z.ai/v1/chat/completions', $model ?? 'z-pro'),
        default      => ['error' => 'Unknown provider: ' . $provider],
    };
}

// Provider functions (call_claude, call_openai, call_gemini, call_xai, call_openai_compat) unchanged from earlier version
// ... (include them as in the previous proxy.php)
