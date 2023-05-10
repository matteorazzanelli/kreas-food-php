<?php require('partials/head.php'); ?>

<h1>Last result</h1>
  <p>
    In the following will be shown:
    <ul>
      <li>the last operation result if selected</li>
      <li>the complete list of products otherwise</li>
    </ul>
  </p>

<?= 'Response code : <span style="color:red">'.http_response_code().', '. $message ."</span>\n"; ?>

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
  <label for="name">Name</label>
  <input id="name" name="name"></input>
  <label for="co2">CO2</label>
  <input name="co2"></input>
  <button type="submit">Create</button>
</form>

<h2>Delete an existing product</h2>
<form method="POST" action="/products">
<input type="hidden" name="_method" value="DELETE">
  <label for="id">ID</label>  
  <input name="id"></input>
  <button type="submit">Delete</button>
</form>

<h2>Patch an existing product</h2>
<form method="POST" action="/products">
<input type="hidden" name="_method" value="PATCH">
  <label for="id">ID</label>
  <input name="id"></input>
  <label for="name">Name</label>
  <input name="name"></input>
  <label for="co2">CO2</label>
  <input name="co2"></input>
  <button type="submit">Patch</button>
</form>

<?php require('partials/footer.php'); ?>
