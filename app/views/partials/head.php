<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <link rel="stylesheet" type="text/css" href="/public/css/style.css">
  <title>Page Title</title>
</head>
<body>
  <?php require('nav.php'); ?>

  <h1>Last result</h1>
  <p>
    In the following will be shown:
    <ul>
      <li>the last operation result if selected</li>
      <li>the complete list of orders/products otherwise</li>
    </ul>
  </p>

<?= 'Response code : <span style="color:red">'.http_response_code().', '. $message ."</span>\n"; ?>