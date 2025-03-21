<?php
    include __DIR__."/../helpers/view-helpers.php";

    echo generateDocumentHead(
        'Log in',
        ['forms.css'],
        ['form-validation.js']
    );
?>

<body>
  <header>
    <?php include __DIR__."/../components/side-nav.php" ?>
  </header>
  <main>
    <div class="form-container">
      <div class="panel">
        <form id="login-form" class="account-form" method="post" action="home" novalidate>
          <h1 class="form-title">Log in to your account</h1>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required />
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required />
          </div>
          <button type="submit">Log in</button>
          <div>Don't have an account? <a href="/register">Register an account</a></div>
        </form>
      </div>
    </div>
  </main>
</body>

</html>
