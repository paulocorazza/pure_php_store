<?php

use core\classes\Database;

session_start();

require_once('../config.php');
require_once('../vendor/autoload.php');


$db = new Database();
$db->select("INSERT INTO TESTE");