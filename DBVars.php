<?php
/* filename: DBVars.php 
 *
 * This file holds information for creating a DB connection string. Edit this 
 * file and careful check that the connection string is correct. 
 *
 * Include this file in other PHH scripts so that you always have the connection
 * string avaiable. 
 */


$gDB_host	= "ec2-54-225-106-211.compute-1.amazonaws.com";
/*
 * The name of the database
 */
$gDB_name	= 'd23v0hanim6c7p';
/*
 * The port on which the database is listening  
 */
$gDB_port		= '5432';

$gDB_user	= 'anyxyfnwjhadnw';

$gDB_password = 'GhCPdjL86oVo2ZAI_AWi5_ZqJp';
/*
 *  This is the connection string for connecting to the database -- 
 *  Note: In this case we do not use a password.
 */
$gDB_conn_string = 	'host=' . 		$gDB_host . 
					' dbname=' . 	$gDB_name . 
					' port=' .		$gDB_port .
					' user=' . 		$gDB_user . 
					' password=' .  $gDB_password.
					' sslmode=require';
					

?>
