<?php

namespace Package\App;

/**
 *
 */
class Input {
  public static function get($input){
    if (isset($_GET[$input])) {
      return $_GET[$input];
    }else if (isset($_POST[$input])) {
      return $_POST[$input];
    }
    return false;
  }
}


?>
