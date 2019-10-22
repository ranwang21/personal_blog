<?php
require '../src/models/Post.php';
require '../src/models/Comment.php';
require '../src/DAL/DAL.php';

$app->get('/', function ($request, $response, $args) {
    // get all posts from database
    $posts = DAL::get_all_post();
    // insert posts into args
    $args['posts'] = $posts;
    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/detail/{id}', function($request, $response, $args){
    // get the post by id
    $post = DAL::get_one_post_by_id($args['id']);
    // insert the post found into args array
    $args['post'] = $post;
    return $this->renderer->render($response, 'detail.phtml', $args);
});