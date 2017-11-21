<?php
 // this will avoid mysql_connect() deprecation error.
 error_reporting( ~E_DEPRECATED & ~E_NOTICE );

 
 define('DBHOST', '18.216.168.78');
 define('DBUSER', 'root');
 define('DBPASS', 'password');
 define('DBNAME', 'BeadArt');
 
 $conn = mysql_connect(DBHOST,DBUSER,DBPASS);
 $dbcon = mysql_select_db(DBNAME);
 
 if ( !$conn ) {
  die("Connection failed : " . mysql_error());
 }
 
 if ( !$dbcon ) {
  die("Database Connection failed : " . mysql_error());
?>