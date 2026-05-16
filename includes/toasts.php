<?php

if (!defined('INCLUDED')) {
  http_response_code(404);
  include __DIR__ . '/../404.html';
  exit();
}
?>

<div class="toast-container position-fixed top-0 end-0 p-3">
  <!-- create toast -->
  <div id="toastCreated" class="toast align-items-center text-bg-success border-0" role="alert">
    <div class="d-flex">
      <div class="toast-body border-success"><i class="bi bi-check-circle-fill"></i> Product created successfully</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  </div>

  <!-- edit toast -->
  <div id="toastEdited" class="toast align-items-center text-bg-success border-0" role="alert">
    <div class="d-flex">
      <div class="toast-body"><i class="bi bi-check-circle-fill"></i> Product edited successfully</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>

  <!-- delete toast -->
  <div id="toastDeleted" class="toast align-items-center text-bg-success border-0" role="alert">
    <div class="d-flex">
      <div class="toast-body"><i class="bi bi-check-circle-fill"></i> Product deleted successfully</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  </div>
</div>

<?php if (isset($_GET['created']) || isset($_GET['edited']) || isset($_GET['deleted'])): ?>
<script>
  window.addEventListener('load', () => {
    <?php if (isset($_GET['created'])): ?>
      bootstrap.Toast.getOrCreateInstance(document.getElementById('toastCreated')).show();
    <?php elseif (isset($_GET['edited'])): ?>
      bootstrap.Toast.getOrCreateInstance(document.getElementById('toastEdited')).show();
    <?php elseif (isset($_GET['deleted'])): ?>
      bootstrap.Toast.getOrCreateInstance(document.getElementById('toastDeleted')).show();
    <?php endif; ?>
    window.history.replaceState({}, document.title, window.location.pathname);
  });
</script>
<?php endif;
