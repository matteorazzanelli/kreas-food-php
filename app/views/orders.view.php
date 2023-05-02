<?php require('partials/head.php'); ?>

<?php if(is_array($result)) : ?>
  <ul><!-- showing the list -->
    <li><span style="text-decoration:underline;">ID, DATE, COUNTRY</span></li>
    <?php foreach ($result as $order) : ?>
      <li><?= $order->id; ?>, <?= $order->date; ?>, <?= $order->country; ?></li>
    <?php endforeach; ?>
  </ul>
<?php else : ?>
  <!-- showing the last result -->
  <?= $result ?><br>
  <a href="/orders">Show the complete list</a>
<?php endif ?>

<h1>Operations</h1>

<h2>Create a new order</h2>
<form method="POST" action="/orders">
  <label for="date">Date</label>
  <input name="date" type="date"></input>
  <label for="country">Country</label>
  <input name="country"></input>
  <label for="products">Products</label>
  <input name="products" placeholder="separate with comma"></input>
  <label for="quantities">Quantities</label>
  <input name="quantities" placeholder="separate with comma"></input>
  <button type="submit">Create</button>
</form>

<h2>Delete an existing order</h2>
<form method="POST" action="/orders">
<input type="hidden" name="_method" value="DELETE">
  <label for="id">ID</label>  
  <input name="id"></input>
  <button type="submit">Delete</button>
</form>

<h2>Patch an existing order</h2>
<form method="POST" action="/orders">
<input type="hidden" name="_method" value="PATCH">
  <label for="id">ID</label>  
  <input name="id"></input>
  <label for="date">Date</label>
  <input name="date" type="date"></input>
  <label for="country">Country</label>
  <input name="country"></input>
  <label for="products">Products</label>
  <input name="products" placeholder="separate with comma"></input>
  <label for="quantities">Quantities</label>
  <input name="quantities" placeholder="separate with comma"></input>
  <button type="submit">Patch</button>
</form>

<?php require('partials/footer.php'); ?>
