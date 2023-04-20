<?php require('partials/head.php'); ?>

    <h1>All Orders</h1>

<?php echo '<p style="color:red">'.http_response_code()."</p>\n"; ?>

<?php foreach ($orders as $order) : ?>
    <li><?= $order->date; ?>, <?= $order->country; ?></li>
<?php endforeach; ?>

<h1>Add new order</h1>

<form method="POST" action="/orders">
    <input name="date" type="date"></input>
    <input name="country"></input>
    <button type="submit">Submit</button>
</form>

<?php require('partials/footer.php'); ?>
