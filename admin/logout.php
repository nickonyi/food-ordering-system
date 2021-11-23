<?php
//include config for the SITEURL
include ("../config/dbh.php");
//destroy the session 
session_destroy();//unset the  $_SESSION['user']
//direct  to our login page
header("Location:".SITEURL."admin/login.php");
?>