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
    // get the comments associated with this post
    $comments = DAL::get_all_comment_by_post($args['id']);
    // insert the post and comments found into args array
    $args['post'] = $post;
    $args['comments'] = $comments;
    return $this->renderer->render($response, 'detail.phtml', $args);
})->setName('detail');

$app->post('/detail/{id}', function($request, $response, $args){
    // get the request body
    $comment = $request->getParsedBody();
    var_dump($comment);
    // encapsulation
    $new_comment = new Comment($comment['name'], $comment['body'], $comment['post_id']);
    // add comment to database
    DAL::add_one_comment($new_comment);
    return $response->withRedirect('/detail/'.$args['id']);
});