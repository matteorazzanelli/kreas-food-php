<?php require('partials/head.php');?>

<h1>Home page</h1>
<?php
  // $content = $_REQUEST['content'];
  // http_response_code(404);
  // echo '<p style="color:red">'.$content."</p>\n";
  echo '<p style="color:red">'.http_response_code()."</p>\n";
  var_dump($_GET);
?>

  
  <!-- <h1>Submit your name</h1> -->
  <!-- invece di richiamare il file .php richiamo un azione del controller 
  che a sua volta mi richiama un file php -->
  <!-- <form method="POST" action="/names">
    <input name="name"></input>
    <button type="submit">Submit</button>
  </form> -->
<?php require('partials/footer.php'); ?>