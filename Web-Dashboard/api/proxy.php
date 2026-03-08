<?php
// PSP-144 API Proxy — Multi-LLM Bridge
// Routes requests to GPT/Claude/Gemini/Grok/DeepSeek/Perplexity/Copilot/Nova/Meta/zAI

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Method not allowed']); exit;
}

$body     = json_decode(file_get_contents('php://input'), true);
$provider = $body['provider'] ?? 'claude';
$prompt   = $body['prompt'] ?? '';
$apiKey   = $body['api_key'] ?? '';
$context  = $body['context'] ?? PSP144_SYSTEM_PROMPT;
$model    = $body['model'] ?? null;

if (empty($prompt)) {
    echo json_encode(['error' => 'No prompt provided']); exit;
}

// PSP-144 context injection
$fullPrompt = "FRAMEWORK CONTEXT: PSP-144 NQVP v2.0 — D3 Triadic State Space (Precision/Boundary/Temporal axes)\n\n" . $prompt;

$result = route_to_provider($provider, $fullPrompt, $apiKey, $context, $model);
echo json_encode($result);

// ── Provider Router ─────────────────────────────────────────────────────────

function route_to_provider(string $provider, string $prompt, string $apiKey, string $context, ?string $model): array {
    return match($provider) {
        'claude'     => call_claude($prompt, $apiKey, $context, $model ?? 'claude-opus-4-6'),
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

// ── Anthropic Claude ─────────────────────────────────────────────────────────
function call_claude(string $prompt, string $apiKey, string $context, string $model): array {
    $payload = json_encode([
        'model'      => $model,
        'max_tokens' => 1024,
        'system'     => $context,
        'messages'   => [['role' => 'user', 'content' => $prompt]],
    ]);
    $response = http_post('https://api.anthropic.com/v1/messages', $payload, [
        'x-api-key'         => $apiKey,
        'anthropic-version' => '2023-06-01',
        'content-type'      => 'application/json',
    ]);
    if (isset($response['content'][0]['text'])) {
        return ['response' => $response['content'][0]['text'], 'provider' => 'claude', 'model' => $model];
    }
    return ['error' => $response['error']['message'] ?? 'Claude API error', 'raw' => $response];
}

// ── OpenAI GPT ───────────────────────────────────────────────────────────────
function call_openai(string $prompt, string $apiKey, string $context, string $model): array {
    $payload = json_encode([
        'model'    => $model,
        'messages' => [
            ['role' => 'system', 'content' => $context],
            ['role' => 'user',   'content' => $prompt],
        ],
        'max_tokens' => 1024,
    ]);
    $response = http_post('https://api.openai.com/v1/chat/completions', $payload, [
        'Authorization' => 'Bearer ' . $apiKey,
        'content-type'  => 'application/json',
    ]);
    if (isset($response['choices'][0]['message']['content'])) {
        return ['response' => $response['choices'][0]['message']['content'], 'provider' => 'gpt', 'model' => $model];
    }
    return ['error' => $response['error']['message'] ?? 'OpenAI API error', 'raw' => $response];
}

// ── Google Gemini ─────────────────────────────────────────────────────────────
function call_gemini(string $prompt, string $apiKey, string $context, string $model): array {
    $url     = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}";
    $payload = json_encode([
        'system_instruction' => ['parts' => [['text' => $context]]],
        'contents'           => [['parts' => [['text' => $prompt]]]],
        'generationConfig'   => ['maxOutputTokens' => 1024],
    ]);
    $response = http_post($url, $payload, ['content-type' => 'application/json']);
    if (isset($response['candidates'][0]['content']['parts'][0]['text'])) {
        return ['response' => $response['candidates'][0]['content']['parts'][0]['text'], 'provider' => 'gemini', 'model' => $model];
    }
    return ['error' => $response['error']['message'] ?? 'Gemini API error', 'raw' => $response];
}

// ── xAI Grok ─────────────────────────────────────────────────────────────────
function call_xai(string $prompt, string $apiKey, string $context, string $model): array {
    $payload = json_encode([
        'model'    => $model,
        'messages' => [
            ['role' => 'system', 'content' => $context],
            ['role' => 'user',   'content' => $prompt],
        ],
    ]);
    $response = http_post('https://api.x.ai/v1/chat/completions', $payload, [
        'Authorization' => 'Bearer ' . $apiKey,
        'content-type'  => 'application/json',
    ]);
    if (isset($response['choices'][0]['message']['content'])) {
        return ['response' => $response['choices'][0]['message']['content'], 'provider' => 'grok', 'model' => $model];
    }
    return ['error' => $response['error']['message'] ?? 'Grok API error', 'raw' => $response];
}

// ── OpenAI-Compatible (DeepSeek/Perplexity/Copilot/Nova/Meta/zAI) ────────────
function call_openai_compat(string $prompt, string $apiKey, string $context, string $endpoint, string $model): array {
    $payload = json_encode([
        'model'    => $model,
        'messages' => [
            ['role' => 'system', 'content' => $context],
            ['role' => 'user',   'content' => $prompt],
        ],
        'max_tokens' => 1024,
    ]);
    $response = http_post($endpoint, $payload, [
        'Authorization' => 'Bearer ' . $apiKey,
        'content-type'  => 'application/json',
    ]);
    if (isset($response['choices'][0]['message']['content'])) {
        $providerName = parse_url($endpoint, PHP_URL_HOST);
        return ['response' => $response['choices'][0]['message']['content'], 'provider' => $providerName, 'model' => $model];
    }
    return ['error' => $response['error']['message'] ?? 'API error', 'raw' => $response];
}

// ── HTTP Helper ───────────────────────────────────────────────────────────────
function http_post(string $url, string $payload, array $headers): array {
    $headerLines = array_map(fn($k, $v) => "$k: $v", array_keys($headers), $headers);
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => $payload,
        CURLOPT_HTTPHEADER     => $headerLines,
        CURLOPT_TIMEOUT        => PSP144_API_TIMEOUT,
        CURLOPT_SSL_VERIFYPEER => true,
    ]);
    $raw  = curl_exec($ch);
    $err  = curl_error($ch);
    curl_close($ch);
    if ($err) return ['error' => 'cURL error: ' . $err];
    $decoded = json_decode($raw, true);
    return $decoded ?? ['error' => 'Invalid JSON response', 'raw_text' => substr($raw, 0, 500)];
}
