<?php
@ob_start();
session_start();

//encoding stuff
 header('Content-type: text/html; charset=utf-8'); 
 
// database info
$host="localhost"; // Host name
$username="comqren_azubidy"; // Mysql username
$password="_Zoooz123"; // Mysql password
$db_name="comqren_kreeen"; // Database name

//paths 
$files_path = "../files/uploads/" ; 
$admin_files_path = "./admin_files/" ; 

//time varibles
$now = date('m/d/Y h:i:s a', time());
$d_now = date('m/d/Y');

// Connect to server and select databse.
$con = mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// ... (creating a connection to mysql) ...

mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $con);

// error reporting 
error_reporting(E_ALL ^ E_NOTICE);

//Load Logs Class And Start New $logs Control
include "./includes/classes/logs_class.php" ; 
$logs = new Logs ; 


//Load Functions Class And Select Language
include "./includes/classes/functions_class.php" ; 
$functions = new functions ; 

// Load Admin Class, Start new $admin control
include "./includes/classes/admin_class.php" ; 
$admin = new Admin ; 

// Load User Class And Start New $User Control 
include "./includes/classes/user_class.php" ; 
$user = new user; 

// Load Shop Center Class And Start $shopcenter Control
include "./includes/classes/shopcenter_class.php" ; 
$shopcenter = new ShopCenter ; 

// Load Orders Class And Start $orders Control
include "./includes/classes/orders_class.php" ; 
$orders = new Orders ; 

// Load Cards Class And Start $cards Control
include "./includes/classes/cards_class.php" ; 
$cards = new Cards ; 

//Load Categories Class And Start New $categories Control
include "./includes/classes/categories_class.php" ; 
$categories = new Categories ; 
?>