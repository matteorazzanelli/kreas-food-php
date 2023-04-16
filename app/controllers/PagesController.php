<?php

// controller is responsible for recevingn request delegating and return a response

namespace App\Controllers;

class PagesController
{
  // Receive the request

  // Delegate

  // Return a response
  
  /**
   * Show the home page.
   */
  public function home()
  {
    // $users = App::get('database')->selectAll('users', 'User');
    // $content = $_REQUEST['content'];
    // // require 'views/index.view.php';
    // return view('index', [
    //   'users' => $users,
    //   'content' => $content
    // ]);
    view('index');
  }

  /**
   * Show the about page.
   */
  public function about()
  {
    // require 'views/about.view.php';
    $company = 'Laracasts';
    view('about', ['company' => $company]);
  }

  /**
   * Show the contact page.
   */
  public function contact()
  {
    // require 'views/contact.view.php';
    view('contact');
  }
}