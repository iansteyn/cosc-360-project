<?php
    require_once __DIR__."/../helpers/view-helpers.php";
    echo generateDocumentHead('About', ['about.css'], []);
?>

<body>
  <header>
    <?php include __DIR__."/components/side-nav-component.php" ?>
  </header>
  <main>
    <header class="page-header">
      <h1>About</h1>
    </header>
    <article class="panel">
      <section>
        <h2>
          Welcome to
          <?= generateIconInline('icon-logo') ?>
          <span class='logo-text'>BlogStar</span>!
        </h2>
        <p>
          BlogStar is a personal blogging website, where you can create and read longform text posts. There's lots of different ways to find posts: search by keyword, check out what's popular, and save your favorites! You can also engage with other bloggers by browsing their profiles and commenting on their posts.
        </p>
        <p>
          This site was created as a term project for COSC 360 - Web Programming. We have learned a great deal in the process, and are very proud of what we have built.
        </p>
        <p>
          <i>—The devs.</i>
        </p>
      </section>
      <section>
        <h2>Development Information</h2>
        <h3>The Team</h3>
        <ul class="normal-list">
          <li><a href="https://github.com/JoyMusiel" target="_blank">Joy Musiel-Henseleit</a></li>
          <li><a href="https://github.com/SammieScully" target="_blank">Sammie Scully</a></li>
          <li><a href="https://github.com/iansteyn" target="_blank">Ian Steyn</a></li>
        </ul>
        <h3>Code</h3>
        <p>
          You can find the source code for this website at <a href="https://github.com/iansteyn/cosc-360-project" target="_blank">our GitHub repository</a>. We used no front-end frameworks. It's pure HTML/CSS/JS, hand-crafted! The back-end stack is LAMP (Linux, Apache, MySQL, PHP), again without any frameworks.
        </p>
        <h3>Attribution</h3>
        <p>
          All icons are from the UIcon library by <a href="https://www.flaticon.com/uicons">Flaticon</a>.
        </p>
      </section>
      <section>
        <h2>FAQ</h2>
        <details>
          <summary><h3>Do I have to register an account?</h3></summary>
          <p>
            You can browse posts without having an account, but you must register and log in to create your own posts and view the profiles of other users. Your personal information is kept secure, and we do not share it with anyone.
          </p>
        </details>
        <details>
          <summary><h3>What if I post something I didn't mean to?</h3></summary>
          <p>
            You can edit or delete your posts by clicking on the
            <?= generateIconInline('icon-edit') ?>
            <i>edit</i>
            or
            <?= generateIconInline('icon-delete') ?>
            <i>delete</i>
            buttons on your profile page or on the post itself.
            You can also delete your comments.
          </p>
        </details>
        <details>
          <summary><h3>How do I change my bio/password/profile picture?</h3></summary>
          <p>
            See the <a href="<?= routeUrl('/profile/settings') ?>">settings tab</a> on your profile page.
          </p>
        </details>
      </section>
    </article>
  </main>
</body>

</html>