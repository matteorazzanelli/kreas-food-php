<?php require('partials/head.php');?>

<h1>Last result</h1>
  <p>
    In the following will be shown:
    <ul>
      <li>the total co2 saved otherwise</li>
    </ul>
  </p>

<?= 'Response code : <span style="color:red">'.http_response_code().', '. $message ."</span>\n"; ?>

<h1>Total CO2 saved</h1>

<?= $result ?>

<h1>Filter by</h1>

<form method="GET" action="/filter">
  <label for="name">Product name</label>
  <input id="name" name="name"></input><br>
  <label for="country">Country</label>
  <input id="country" name="country"></input><br>
  <label for="start_date">From</label>
  <input name="start_date" type="date"></input><br>
  <label for="end_date">To</label>
  <input name="end_date" type="date"></input><br>
  <button type="submit">Filter</button>
</form>
  



<?php require('partials/footer.php'); ?>