<?php
//connection to the database and select a DB to work with
$dbhandle = mysql_connect('localhost', 'root', '')  or die('MySQL not connected');
mysql_select_db('php_security',$dbhandle)  or die ( 'Could not select php_security' );

// execute the SQL query and return records
$username = $_POST["username"];
$password = $_POST["password"];

//uncomment these to fix SQL injection
//$username = mysql_real_escape_string( $_POST["username"] );
//$password = mysql_real_escape_string( $_POST["password"] );


$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysql_query( $query , $dbhandle);

// fetch tha data from the database
$num = mysql_num_rows($result);

if ($num > 0) {
	print 'got a matching user';
}

// close the connection
mysql_close ( $dbhandle );
