<?php

namespace Package\Middleware;

class Token {

  public static function generate($hash = 'sha256'){
    return hash($hash, crypt(uniqid(mt_rand().time()), ''));
  }

  public static function verify($knowntoken, $usertoken){
    return hash_equals($knowntoken, $usertoken);
  }

}
