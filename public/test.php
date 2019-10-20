<?php
require "../src/DBHelper/connection.php";
require "../src/DAL/DAL.php";
require "../src/models/Post.php";

$post = new Post('My Second Post', '12/10/2019', 'This is my second post, updated');
var_dump(DAL::delete_one_post(3, $post));