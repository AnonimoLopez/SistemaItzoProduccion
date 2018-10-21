<?php
session_start();
 if (!isset($_SESSION["id"])){
  	header("Location: index.html");
  }


if ($_SESSION["id"] == "" ){
	header("Location: index.html");
}
?>