<?php
// PSP-144 NQVP Framework — Master Router (v2.0)
define('PSP144_ROOT', __DIR__);
define('PSP144_VERSION', '2.0');
define('PSP144_TIMESTAMP', time());

session_start();

$page = isset($_GET['page']) ? preg_replace('/[^a-z0-9_-]/', '', $_GET['page']) : 'hub';
$valid_pages = ['hub', 'crucible', 'nexus', 'community', 'api-forge', 'axioms', 'shortcomings', 'ar-veil'];
if (!in_array($page, $valid_pages)) $page = 'hub';

if (isset($_GET['api'])) {
    header('Content-Type: application/json');
    require_once PSP144_ROOT . '/api/proxy.php';
    exit;
}

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
  <link rel="preconnect" href="https://fonts.googleapis.com"/>
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700;900&family=Rajdhani:wght@300;400;500;600&family=Share+Tech+Mono&display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="css/ghost-mesh.css"/>
  <link rel="stylesheet" href="css/nodes.css"/>
  <link rel="stylesheet" href="css/panels.css"/>
  <link rel="stylesheet" href="css/animations.css"/>
  <?php
  $page_styles = ['ar-veil' => '<link rel="stylesheet" href="css/ar-veil.css"/>'];
  echo $page_styles[$page] ?? '';
  ?>
</head>
<body class="ghost-mesh-body" data-node-count="0">
  <div class="neural-grid" id="neuralGrid" aria-hidden="true"></div>
  <canvas id="ghostMeshCanvas" aria-hidden="true"></canvas>
  <?php require_once PSP144_ROOT . '/components/header.php'; ?>
  <?php require_once PSP144_ROOT . '/components/node-bar.php'; ?>
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
  <?php require_once PSP144_ROOT . '/components/footer.php'; ?>
  <?php require_once PSP144_ROOT . '/components/api-modal.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
  <script src="js/ghost-mesh.js" defer></script>
  <script src="js/nodes.js" defer></script>
  <script src="js/api-bridge.js" defer></script>
  <script src="js/d3-triadic.js" defer></script>
  <script src="js/animations.js" defer></script>
  <script src="js/drag-module.js" defer></script>
  <script>
    window.PSP144 = {
      version: '<?= PSP144_VERSION ?>',
      page: '<?= htmlspecialchars($page) ?>',
      timestamp: <?= PSP144_TIMESTAMP ?>,
      apiEndpoint: '?api=1',
      nodes: <?= json_encode(get_active_nodes()) ?>,
      d3_metrics: <?= json_encode($d3_metrics ?? get_d3_metrics()) ?>,
      polytope_h: <?= $polytope_h ?? 0.73 ?>,
      mesh_coh: <?= $mesh_coh ?? 81.4 ?>
    };
  </script>
</body>
</html>
