<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);

session_start();

spl_autoload_register(function ($class) {
    require_once 'classes/' . $class  . '.php';
});

require_once 'functions/sanitize.php';