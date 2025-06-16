<?php
// File: public/index.php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once '../config/database.php';
require_once '../routes/api.php';
