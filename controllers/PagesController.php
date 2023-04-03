<?php

// controller is responsible for recevingn request delegating and return a response

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
    return view('index');
  }

  /**
   * Show the about page.
   */
  public function about()
  {
    // require 'views/about.view.php';
    $company = 'Laracasts';
    return view('about', ['company' => $company]);
  }

  /**
   * Show the contact page.
   */
  public function contact()
  {
    // require 'views/contact.view.php';
    return view('contact');
  }
}