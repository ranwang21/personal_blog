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
    // get all the existing tags name
    $tags = DAL::get_all_unique_name_tags();
    // get all selected tags of the post
    $selected_tags = DAL::get_tags_by_postId($args['id']);
    // get the comments associated with this post
    $comments = DAL::get_all_comment_by_post($args['id']);
    // insert the post and comments found into args array
    $args['post'] = $post;
    $args['tags'] = $tags;
    $args['selected_tags'] = $selected_tags;
    $args['comments'] = $comments;
    return $this->renderer->render($response, 'detail.phtml', $args);
})->setName('detail');

$app->post('/detail/{id}', function($request, $response, $args){
    // get the request body
    $comment = $request->getParsedBody();
    // encapsulation
    $new_comment = new Comment($comment['name'], $comment['body'], $args['id']);
    // add comment to database
    DAL::add_one_comment($new_comment);
    return $response->withRedirect('/detail/'.$args['id']);
});

$app->map(['GET', 'POST'], '/edit/{id}', function($request, $response, $args){
    if ($request->getMethod() == 'GET'){
        // find the post
        $post = DAL::get_one_post_by_id($args['id']);
        // insert post into $args
        $args['post'] = $post;
        // show the edit page with values of the post in input fields
        return $this->renderer->render($response, 'edit.phtml', $args);
    } else{
        // get post body
        $arr = $request->getParsedBody();
        // encapsulation
        $post = new Post($arr['title'], null, $arr['body']);
        // update post to the database
        var_dump($post);
        DAL::update_one_post($args['id'], $post);
    }
    return $response->withRedirect('/detail/'.$args['id']);
});

$app->map(['GET', 'POST'], '/new', function($request, $response, $args){
    if($request->getMethod() == 'GET'){
        // get all existing tags to select
        $tags = DAL::get_all_unique_name_tags();
        // insert tags into $args
        $args['tags'] = $tags;
        return $this->renderer->render($response, 'new.phtml', $args);
    } else{
        var_dump($request->getParsedBody());
    }
});