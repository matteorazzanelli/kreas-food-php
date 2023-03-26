<?php require('partials/head.php'); ?>

  <?php foreach ($users as $user) : ?>
    <li><?= $user->name; ?></li>
  <?php endforeach; ?>
  
  <h1>Submit your name</h1>
  <!-- invece di richiamare il file .php richiamo un azione del controller che a sua volta mi richiama un file php -->
  <form method="POST" action="/names">
    <input name="name"></input>
    <button type="submit">Submit</button>
  </form>
<?php require('partials/footer.php'); ?>