<?php
require "../src/DBHelper/connection.php";
require "../src/DAL/DAL.php";
var_dump(connection::getConnection());
var_dump(DAL::get_all_post());