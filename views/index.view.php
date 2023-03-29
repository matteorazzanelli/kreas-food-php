<?php require('partials/head.php'); session_start();?>

<?php
  // $content = $_REQUEST['content'];
  echo '<p style="color:red">'.$content."</p>\n";
  // echo '<p style="color:red">'.http_response_code()."</p>\n";
  var_dump($_SESSION);
?>

  <?php foreach ($users as $user) : ?>
    <li>
      <?php if ($user->completed) : ?>
        <strike><?= $user->name; ?></strike>
      <?php else: ?>
        <?= $user->name; ?>
      <?php endif; ?>
    </li>
  <?php endforeach; ?>
  
  <h1>Submit your name</h1>
  <!-- invece di richiamare il file .php richiamo un azione del controller che a sua volta mi richiama un file php -->
  <form method="POST" action="/names">
    <input name="name"></input>
    <button type="submit">Submit</button>
  </form>
<?php require('partials/footer.php'); ?>