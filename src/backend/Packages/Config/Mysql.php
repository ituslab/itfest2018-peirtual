<?php

namespace Package\Config;

interface Mysql {
  public const SERVER = '127.0.0.1';
  public const USER = 'itpolsri_client';
  public const PASS = 'itpolsripower2018';
  public const DB = 'itpolsri_PeirtualDB';
  public const DBH = 'mysql:hostname='.self::SERVER.'; dbname='.self::DB; //PDO
}
