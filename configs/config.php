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
$files_path = "./files/uploads/" ; 

//time varibles
$now = date('m/d/Y h:i:s a', time());
$d_now = date('m/d/Y');

// Connect to server and select databse.
$con = mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");


// ... (creating a connection to mysql) ...

mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'",$con);
// error reporting 
error_reporting(E_ALL ^ E_NOTICE);

// Load Some Classes and Languages 

// Load Logs Class And Start $logs Control
include "./includes/classes/logs_class.php" ; 
$logs = new Logs ; 


//Load Functions Class And Select Language
include "./includes/classes/functions_class.php" ; 
$functions = new functions ; 
$new_lang = $_GET['lang'] ; 
if($new_lang<>""){
$functions->Language($new_lang);
}elseif($new_lang=="" and $_SESSION["lang"]==""){
$functions->Language($new_lang);
}
include "./includes/lang/" . $_SESSION["lang"] . ".php" ; 


// Load User Class And Start New $User Control 
include "./includes/classes/user_class.php" ; 
$user = new user; 


// Load Payments Class And Start New $Payments Control
include "./includes/classes/payments_class.php" ; 
$payments = new Payments ; 


// Load Shop Center Class And Start $shopcenter Control
include "./includes/classes/shopcenter_class.php" ; 
$shopcenter = new ShopCenter ; 

// Load Orders Class And Start $orders Control
include "./includes/classes/orders_class.php" ; 
$orders = new Orders ; 
?>