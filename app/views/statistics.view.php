<?php require('partials/head.php');?>

<h1>Last result</h1>
  <p>
    In the following will be shown:
    <ul>
      <li>the last operation result if selected</li>
      <li>the total co2 saved otherwise</li>
    </ul>
  </p>

<?= 'Response code : <span style="color:red">'.http_response_code().', '. $message ."</span>\n"; ?>

<h1>Total CO2 saved</h1>

<?= $result ?>

<h1>Filter by</h1>

  



<?php require('partials/footer.php'); ?>