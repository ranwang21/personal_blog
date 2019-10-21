<?php
require "../src/DBHelper/connection.php";
require "../src/DAL/DAL.php";
require "../src/models/Post.php";
require "../src/models/Comment.php";

var_dump(DAL::get_all_post_by_title("se"));