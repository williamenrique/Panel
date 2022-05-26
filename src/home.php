<?php

session_start();
if (empty($_SESSION['login'])) {
	header("Location:".'404');
}else{
	header("Location:".'404');
}