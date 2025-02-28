<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Admin Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../css/reset.css" />
  <link rel="stylesheet" href="../css/main.css" />
  <link rel="stylesheet" href="../css/admin.css" />
  <link rel="stylesheet" href="../css/side-nav.css">
  <script src="../scripts/side-nav.js" defer></script>
</head>

<body>
  <header>
    <?php include "../html/side-nav.html" ?>
  </header>
  <main>
    <header class="page-header">
      <h1>Admin Dashboard</h1>
    </header>
    <article class="dashboard-grid">
      <section class="panel user-search" id="user-search">
        <h2>User List</h2>
        <div class="action-bar">
          <?php include "../html/search-bar.html" ?>
        </div>
        <div class="user-list">
          <div class="user-listing">Sadie Smith</div>
          <div class="user-listing">Jane Doe</div>
          <div class="user-listing">John Appleseed</div>
        </div>
      </section>
      <section class="panel search-topics" id="search-topics">
        <h2>Site Search Topics</h2>
        <div class="action-bar">
          <!-- TODO: Add ability to add search topics -->
        </div>
      </section>
      <section class="panel site-analytics" id="site-analytics">
        <h2>Site Analytics</h2>
        <canvas id="analytics" width="300" height="300"></canvas> <!-- temporary placeholder graphic -->
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
