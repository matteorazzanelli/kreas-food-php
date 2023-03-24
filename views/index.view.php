<?php require('partials/head.php'); ?>
  <h1>My Tasks</h1>
  <ul>
    <?php foreach($users as $user): ?>
      <li>
        <?php if ($user->completed): ?>
          <strike><?= $user->name; ?></strike>
        <?php else: ?>
          <?= $user->name; ?>
        <?php endif;?>
      </li>
    <?php endforeach; ?>
  </ul>
<?php require('partials/footer.php'); ?>