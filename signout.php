<?php
 
// Include database, session, general info
require_once 'core/init.php';

// destroy session
$session->destroy();

// redirect home page 
header('Location: index.php');
 
?>