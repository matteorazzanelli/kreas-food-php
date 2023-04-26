<?php

namespace App\Core;

/* This class is simply a bridge:
app specific controller do not have to take the responsibility
to render the page correctly but only to do the duty job.

*/
class Controller{

  private $content; 
  private $statusCode;
  private $contentType;
  /**
   * content, to be output
   * objectPage, to render
   * message, additional 
   */
  public function renderApi($data){
    extract($data);
    if(getenv('FRONTEND')==true){
      $this->content = $result;
      $this->contentType = "Content-type:text/html";
    }
    else{
      $this->content = json_encode($result);
      $this->contentType = "Content-type:application/json";
    }

    header($this->contentType);
    http_response_code($this->statusCode);

    if(getenv('FRONTEND')==true){
      return view($page, [
        'result' => $this->content,
        'message' => $message
      ]);
    }
    else{
      echo $this->content;
    }
  }

  public function setCode($code){
    // onlt if it is not already set
    if($this->statusCode==null)
      $this->statusCode = $code;
  }
}