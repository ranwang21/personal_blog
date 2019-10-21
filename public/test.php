<?php
require "../src/DBHelper/connection.php";
require "../src/DAL/DAL.php";
require "../src/models/Post.php";
require "../src/models/Comment.php";

$post = new Post('test post2', '04/10/2019', 'hello world2', [2, 3, 5]);

var_dump(DAL::get_one_tag(1));