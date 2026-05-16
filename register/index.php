<?php define('INCLUDED', true); ?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | Dummy CRUD</title>
  <link rel="stylesheet" href="../main.css">

  <!-- Bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

  <script>
    // Theme adapt to system
    function setTheme(isDark) {
      document.documentElement.dataset.bsTheme = isDark ? 'dark' : 'light';
    }

    const isDark = window.matchMedia('(prefers-color-scheme: dark)');
    isDark.addEventListener('change', (e) => setTheme(e.matches));
    setTheme(isDark.matches);

  </script>

  <!-- Bootstrap CSS minified -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body>
   <?php include __DIR__ . '/../includes/header.php'; ?>

  <main>
    <div class="width padding">
      <form action="">
        <h2 class="text-center">Register</h2>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username">
          <div class="invalid-feedback">
            Invalid username.
          </div>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <div class="input-group">
            <input type="password" class="form-control" id="password" name="password">
            <div class="invalid-feedback">
              Invalid password.
            </div>
            <button class="btn btn-outline-secondary" type="button" id="togglePassword" title="Show password"><i
                class="bi bi-eye-fill" id="toggleIcon"></i></button>
          </div>
        </div>
        <div class="col-12 text-center mb-3">
          <button class="btn btn-primary" type="submit">Register</button>
        </div>
        <a href="../login/" title="Go to Login" class="d-flex justify-content-center">Already have an account?</a>
      </form>
    </div>
  </main>

  <?php include __DIR__ . '/../includes/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>

  <script>
    // Popper tooltips
    const tooltipTriggerList = document.querySelectorAll('[title]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
  
    document.getElementById('togglePassword').addEventListener('click', () => {
      const btn     = document.getElementById('togglePassword');
      const input = document.getElementById('password');
      const icon  = document.getElementById('toggleIcon');
      
      if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('bi-eye-fill', 'bi-eye-slash-fill');
        btn.setAttribute('data-bs-original-title', 'Hide password');
      } else {
        input.type = 'password';
        icon.classList.replace('bi-eye-slash-fill', 'bi-eye-fill');
        btn.setAttribute('data-bs-original-title', 'Show password');
      }

      bootstrap.Tooltip.getOrCreateInstance(btn).hide();

    });

  </script>
</body>

</html>
