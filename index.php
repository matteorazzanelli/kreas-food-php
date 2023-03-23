<?php

require 'functions.php';

$greeting = 'Hello, world';

$names = [
  'jeff',
  'john',
  'mary'
];
$names[]='elephant';

$person = [
  'age' => 31,
  'hair'=> 'brown',
  'career'=>'web developer'
];

$person['name']='Jeffrey';

// foreach($names as $name){
//   echo $name;
// }

//remove
unset($person['age']);

// echo '<pre>';
// die(var_dump($person));
// echo '</pre>';


$task=[
  'title'=>'finish homework',
  'due'=>'today',
  'assigned_to'=>'Jeffrey',
  'completed'=>true
];

dumper('hello', 'big', 'world');

require 'index.view.php';