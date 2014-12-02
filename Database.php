<?php

class Database 
{
  private static $server="db2517.1and1.fr";
  private static $user = "dbo331051526";
  private static $password = "guigus06";
  private static $db = "db331051526";

  static function connect() 
  {
    mysql_connect(self::$server,self::$user,self::$password)
      or die("unable to connect to database server");
    mysql_select_db(self::$db) or die("unable to select database");
  }

  public static function disconnect()
  {
    mysql_close();
  }

}
?>