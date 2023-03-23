<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>

<body>
<ul>
    <?php foreach($users as $user) : ?>
      <li>
        <?= $task->name; ?>
      </li>
    <?php endforeach; ?>
  </ul>
</body>

</html>