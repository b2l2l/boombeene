<?php

$text = $_GET['text'] ; 
include "./qrlib.php" ; 
QRcode::png($text) ; 

?>