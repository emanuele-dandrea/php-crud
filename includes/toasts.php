<?php

if (!defined('INCLUDED')) {
    http_response_code(404);
    include __DIR__ . '/../status-codes/404.html';
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

  <div id="toastLogin" class="toast align-items-center text-bg-success border-0" role="alert">
    <div class="d-flex">
      <div class="toast-body"><i class="bi bi-award-fill"></i> Logged-in successfully</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  </div>
 
  <div id="toastLogOut" class="toast align-items-center text-bg-success border-0" role="alert">
    <div class="d-flex">
      <div class="toast-body"><i class="bi bi-award-fill"></i> Logged-out successfully</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  </div>

  <div id="toastCredentialsError" class="toast align-items-center text-bg-danger border-0" role="alert">
    <div class="d-flex">
      <div class="toast-body"><i class="bi bi-exclamation-circle-fill"></i> Invalid credentials</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  </div>

  <div id="toastUsernameIsTaken" class="toast align-items-center text-bg-danger border-0" role="alert">
    <div class="d-flex">
      <div class="toast-body"><i class="bi bi-exclamation-circle-fill"></i> Username not available</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  </div>

  <div id="toastRegistered" class="toast align-items-center text-bg-success border-0" role="alert">
    <div class="d-flex">
      <div class="toast-body"><i class="bi bi-award-fill"></i> Registration successful</div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
    </div>
  </div>
</div>

<?php
$toastParams = [
  'created', 'edited',
  'deleted', 'login',
  'logout', 'taken',
  'error', 'registered'
];
if (array_intersect($toastParams, array_keys($_GET))):
?>
<script>
  window.addEventListener('load', () => {
    <?php if (isset($_GET['created'])): ?>
      bootstrap.Toast.getOrCreateInstance(document.getElementById('toastCreated')).show();
    <?php elseif (isset($_GET['edited'])): ?>
      bootstrap.Toast.getOrCreateInstance(document.getElementById('toastEdited')).show();
    <?php elseif (isset($_GET['deleted'])): ?>
      bootstrap.Toast.getOrCreateInstance(document.getElementById('toastDeleted')).show();
    <?php elseif (isset($_GET['login'])): ?>
      bootstrap.Toast.getOrCreateInstance(document.getElementById('toastLogin')).show();
    <?php elseif (isset($_GET['logout'])): ?>
      bootstrap.Toast.getOrCreateInstance(document.getElementById('toastLogOut')).show();
    <?php elseif (isset($_GET['error']) === 'taken'): ?>
      bootstrap.Toast.getOrCreateInstance(document.getElementById('toastUsernameIsTaken')).show();
    <?php elseif (isset($_GET['error'])): ?>
      bootstrap.Toast.getOrCreateInstance(document.getElementById('toastCredentialsError')).show();
    <?php elseif (isset($_GET['registered'])): ?>
      bootstrap.Toast.getOrCreateInstance(document.getElementById('toastRegistered')).show();
    <?php endif; ?>
    window.history.replaceState({}, document.title, window.location.pathname);
  });
</script>
<?php endif;
