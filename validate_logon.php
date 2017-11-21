<?php
ini_set('display_errors','on');
error_reporting(E_ALL);
//select count(*) cnt from user where username='joe@smith.com' and password = 'password'
/*
	inputs: username (string/email)
			password (string)
	outputs:
		If successful: OK
		If not: ERR [informative message]
			
*/
print_r($_REQUEST); exit;
if (!isset($_REQUEST['username'])) 
	die('ERR Username required');

if (!isset($_REQUEST['password']))
	$_REQUEST['password']= '';

//connect to db
	$db = mysql_connect('localhost','allen','a12345b')
	or die('ERR Could not connect to database');

	//select schema (use)
	mysql_select_db('allen'); //"use allen"
	
	$username = mysql_real_escape_string($_REQUEST['username']);
	$password = mysql_real_escape_string($_REQUEST['password']);
	
	//build a select query (w/ user/pass) > $query
	$query = "
	select count(*) cnt from user 
	where username ='$username' 
		and password ='$password'";
	
	//issue result to mysql
	$res = mysql_query($query,$db)or die('Err Error [$query]');
	
	//fetch result from cursor (res is the cursor in this case)
	$row = mysql_fetch_object($res);
	
	//var_dump($row);
	//interpret/print response
	if ($row->cnt == 0) //user not found
	die('ERR Invalid logon');
	
	print 'OK';
	
?>