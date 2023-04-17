<?php

// to call names only for post requests comment out above and then do:
$this->get('','PagesController@home');
$this->get('about','PagesController@about');
$this->get('contact','PagesController@contact');

$this->get('users', 'UsersController@index');
$this->post('users','UsersController@store');
