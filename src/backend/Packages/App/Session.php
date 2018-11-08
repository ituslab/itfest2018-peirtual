<?php
  /**
   *
   */
  namespace Package\App;

  session_start();

  class Session {

    public static function set($key, $value){
      $_SESSION[$key] = $value;
    }

    public static function get($key){
      if (isset($_SESSION[$key])) {
        return $_SESSION[$key];
      }
      return false;
    }

    public static function list(){
      return $_SESSION;
    }

    public static function unset($key){
      if (isset($_SESSION[$key])) {
        unset($_SESSION[$key]);
        return true;
      }
      return false;
    }

    public static function destroy(){
      return session_destroy();
    }

  }

?>
