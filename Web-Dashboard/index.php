<?php
// PSP-144 NQVP Framework — Master Router
define('PSP144_ROOT', __DIR__);
define('PSP144_VERSION', '2.0');
define('PSP144_TIMESTAMP', time());

session_start();

// Page routing
$page = isset($_GET['page']) ? preg_replace('/[^a-z0-9_-]/', '', $_GET['page']) : 'hub';
$valid_pages = ['hub', 'crucible', 'nexus', 'community', 'api-forge', 'axioms', 'shortcomings'];
if (!in_array($page, $valid_pages)) $page = 'hub';

// API proxy handler
if (isset($_GET['api'])) {
    header('Content-Type: application/json');
    require_once PSP144_ROOT . '/api/proxy.php';
    exit;
}

// Load components
require_once PSP144_ROOT . '/php/config.php';
require_once PSP144_ROOT . '/php/nodes.php';
?>
<!DOCTYPE html>
<html lang="en" data-page="<?= htmlspecialchars($page) ?>">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta name="description" content="PSP-144 Neuro-Quantum Validation Protocol — Hyper-Correlational Intelligence Framework"/>
  <title>PSP-144 · NQVP · Hyper-Correlation Sovereign Hub</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Rajdhani:wght@300;400;500;600&family=Share+Tech+Mono&display=swap" rel="stylesheet"/>

  <!-- Core Styles -->
  <link rel="stylesheet" href="css/ghost-mesh.css"/>
  <link rel="stylesheet" href="css/nodes.css"/>
  <link rel="stylesheet" href="css/panels.css"/>
  <link rel="stylesheet" href="css/animations.css"/>

  <!-- Page-specific styles injected via PHP -->
  <?php echo get_page_styles($page); ?>
</head>
<body class="ghost-mesh-body" data-node-count="0">

  <!-- Neural Grid Background -->
  <div class="neural-grid" id="neuralGrid" aria-hidden="true"></div>
  <canvas id="ghostMeshCanvas" aria-hidden="true"></canvas>

  <!-- Sovereign Header -->
  <?php require_once PSP144_ROOT . '/components/header.php'; ?>

  <!-- P2P Node Status Bar -->
  <?php require_once PSP144_ROOT . '/components/node-bar.php'; ?>

  <!-- Main Content Router -->
  <main class="sovereign-main" id="mainContent">
    <?php
    $page_file = PSP144_ROOT . '/pages/' . $page . '.php';
    if (file_exists($page_file)) {
        require_once $page_file;
    } else {
        require_once PSP144_ROOT . '/pages/hub.php';
    }
    ?>
  </main>

  <!-- Sovereign Footer -->
  <?php require_once PSP144_ROOT . '/components/footer.php'; ?>

  <!-- API Modal Overlay -->
  <?php require_once PSP144_ROOT . '/components/api-modal.php'; ?>

  <!-- Core Scripts -->
  <script src="js/ghost-mesh.js" defer></script>
  <script src="js/nodes.js" defer></script>
  <script src="js/api-bridge.js" defer></script>
  <script src="js/d3-triadic.js" defer></script>
  <script src="js/animations.js" defer></script>
  <script>
    // Global PSP144 config passed from PHP
    window.PSP144 = {
      version: '<?= PSP144_VERSION ?>',
      page: '<?= htmlspecialchars($page) ?>',
      timestamp: <?= PSP144_TIMESTAMP ?>,
      apiEndpoint: '?api=1',
      nodes: <?= json_encode(get_active_nodes()) ?>
    };
  </script>
</body>
</html>
