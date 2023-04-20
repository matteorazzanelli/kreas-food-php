<?php require('partials/head.php'); ?>

    <h1>All Products</h1>

<?php echo '<p style="color:red">'.http_response_code()."</p>\n"; ?>

<?php foreach ($products as $product) : ?>
    <li><?= $product->name; ?>, <?= $product->co2; ?></li>
<?php endforeach; ?>

<h1>Add new product</h1>

<form method="POST" action="/products">
    <input name="name"></input>
    <input name="co2"></input>
    <button type="submit">Submit</button>
</form>

<?php require('partials/footer.php'); ?>
