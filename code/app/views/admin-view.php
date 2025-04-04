<?php
/**
 * This view expects the following variables:
 * @var bool $isAdmin
 * @var bool $isLoggedIn
 * @var string $searchValue
 * @var array $usernames
 * @var bool $showResultMessage
*/
require_once __DIR__."/../helpers/view-helpers.php";

$usernames = sanitizeData($usernames);

echo generateDocumentHead(
    'Admin Dashboard',
    ['search.css', 'admin.css'],
    ['admin.js']
);
?>

<body>
  <header>
    <?php
        // This component uses: $isAdmin, $isLoggedIn
        include __DIR__."/components/side-nav-component.php"
    ?>
  </header>
  <main>
    <header class="page-header">
      <h1>Admin Dashboard</h1>
    </header>
    <article class="dashboard-grid">
      <section class="panel user-search" id="user-search">
        <h2>User List</h2>
        <div class="action-bar">
            <?php
                $searchAction = '/admin';
                $isRequired = false;
                // this component uses: $searchAction, $isRequired, $searchValue
                include __DIR__."/components/search-bar-component.php";
            ?>
        </div>

        <?php if($showResultMessage): ?>
        <div class='search-message result-message'>
          <h4>
            <?php
                if ($searchValue == '') {
                    echo 'Showing all users';
                } else if (empty($usernames)) {
                    echo "No results for: \"$searchValue\"";
                } else {
                    echo "Showing results for: \"$searchValue\"";
                }
            ?>
          </h4>
          <a class='clear-link' href='/admin'>
            Clear
          </a>
        </div>
        <?php endif; ?>

        <ul class="user-list">
          <?php foreach($usernames as $username): ?>
            <li>
              <a href="/profile/posts/<?= $username ?>/">
                <i>@<?= $username ?></i>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </section>
      <section class="panel site-analytics" id="site-analytics">
        <h2>Site Analytics</h2>
        <canvas id="analytics" width="300" height="300"></canvas><!-- temporary placeholder graphic -->
      </section>
    </article>
  </main>

  <!-- temporary placeholder for site analytics -->
  <script>
    var ctx = document.getElementById("analytics").getContext("2d");
    ctx.beginPath();
    ctx.arc(150,150,125,0,2*Math.PI);
    ctx.stroke();
    ctx.beginPath();
    ctx.strokeStyle = "green";
    ctx.moveTo(25, 150);
    ctx.lineTo(275, 150);
    ctx.stroke();
    ctx.beginPath();
    ctx.strokeStyle = "blue";
    ctx.moveTo(150, 150);
    ctx.lineTo(150, 25);
    ctx.stroke();
  </script>
</body>

</html>
