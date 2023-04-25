<?php require('partials/head.php'); ?>

  <h1>Last result</h1>
  <p>
    In the following will be shown:
    <ul>
      <li>the last operation result if selected</li>
      <li>the complete list of orders otherwise</li>
    </ul>
  </p>

<?php echo '<p style="color:red">'.http_response_code()."</p>\n"; ?>

<?php if(is_array($result)) : ?>
  <?php foreach ($result as $order) : ?>
    <li><?= $order->id; ?>, <?= $order->date; ?>, <?= $order->country; ?></li>
  <?php endforeach; ?>
<?php else : ?>
  <?= $result ?>
<?php endif ?>



<h1>Operations</h1>

<h2>Create a new order</h2>
<form method="POST" action="/orders">
  <input name="date" type="date"></input>
  <input name="country"></input>
  <button type="submit">Create</button>
</form>

<h2>Delete an existing order</h2>
<form method="POST" action="/orders">
<input type="hidden" name="_method" value="DELETE">
  <input name="id"></input>
  <button type="submit">Delete</button>
</form>

<h2>Patch an existing order</h2>
<form method="POST" action="/orders">
<input type="hidden" name="_method" value="PATCH">
  <input name="id"></input>
  <input name="date" type="date"></input>
  <input name="country"></input>
  <button type="submit">Patch</button>
</form>



<?php require('partials/footer.php'); ?>
