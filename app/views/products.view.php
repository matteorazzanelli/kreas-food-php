<?php require('partials/head.php'); ?>

<?php if(is_array($result)) : ?>
  <ul><!-- showing the list -->
    <li><span style="text-decoration:underline;">ID, NAME, CO2</span></li>
    <?php foreach ($result as $product) : ?>
      <li><?= $product->id; ?>, <?= $product->name; ?>, <?= $product->co2; ?></li>
    <?php endforeach; ?>
  </ul>
<?php else : ?>
  <!-- showing the last result -->
  <?= $result ?><br>
  <a href="/products">Show the complete list</a>
<?php endif ?>

<h1>Operations</h1>

<h2>Add a new product</h2>
<form method="POST" action="/products">
  <input name="name"></input>
  <input name="co2"></input>
  <button type="submit">Create</button>
</form>

<h2>Delete an existing product</h2>
<form method="POST" action="/products">
<input type="hidden" name="_method" value="DELETE">
  <input name="id"></input>
  <button type="submit">Delete</button>
</form>

<h2>Patch an existing product</h2>
<form method="POST" action="/products">
<input type="hidden" name="_method" value="PATCH">
  <input name="id"></input>
  <input name="name" type="date"></input>
  <input name="co2"></input>
  <button type="submit">Patch</button>
</form>

<?php require('partials/footer.php'); ?>
