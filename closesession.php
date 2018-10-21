<?php
session_start();
if (ini_get('register_globals'))
{
    foreach ($_SESSION as $key=>$value)
    {
        if (isset($GLOBALS[$key]))
            unset($GLOBALS[$key]);
    }
}

$_SESSION["id"]="";

  if (!isset($_SESSION["id"])){
  	header("Location: index.html");
  }

if ($_SESSION["id"] == "" ){
	header("Location: index.html");
}
?>