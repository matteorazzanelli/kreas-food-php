<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <title>Page Title</title>
  <style>
    header{
      background: gray;
      padding: : 2em;
      text-align: center;
    }
  </style>
</head>
<body>
  <!-- http://localhost:8888/?name=Jeff -->
  <header>
  <h1>
      <?php 
        $name = $_GET['name'];
        echo 'Hello '. $name;
      ?>
    </h1>
    <h1>
      <?php 
        echo 'Hello '. $_GET['name'];
      ?>
    </h1>
    <h1>
      <?php 
       // sanitize
        echo 'Hello '. htmlspecialchars($_GET['name']);
      ?>
    </h1>
    <h1>
      <?= $greeting; ?>
    </h1>
</header>

<ul>
  <?php
    foreach($names as $name){
      echo "<li>$name</li>";
    }
  ?>

  <?php foreach($names as $name) : ?>
    <li><?= $name; ?></li>
  <?php endforeach; ?>
</ul>


<ul>
    <?php foreach ($person as $key=>$value) : ?>
      <li><strong><?= $key; ?> </strong><?= $value; ?></li>
    <?php endforeach; ?>
</ul>

<h1>task for dthe day</h1>
<ul>
  <?php foreach ($task as $heading=>$value) : ?>
    <li><strong><?= ucwords($heading); ?>:</strong> <?= $value; ?></li>
  <?php endforeach; ?>
  <li><strong>Status:</strong><?= $task['completed'] ? 'Complete' : 'Not completed'?>

  <li>
    <strong>Status : </strong>
    <?php
      if($task['completed']){
        echo '&#9989;';
      }
      else{
        echo 'Incomplete';
      }
    ?>
    <!-- Shorthand -->
    <?php if($task['completed']) : ?>
      <span class="icon">&#9989;</span>
    <?php endif; ?>
</ul>
  
</body>
</html>