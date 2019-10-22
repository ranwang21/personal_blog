<?php
require '../src/models/Post.php';
require '../src/models/Comment.php';
require '../src/models/Tag.php';
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
    // get the post by title
    $post = DAL::get_one_post_by_id($args['id']);
    // get all the existing tags
    $tags = DAL::get_all_tags();
    // get all the tags associated to the post
    $selected_tags_arr = explode(',', $post['tag_id']);
    $selected_tags = [];
    foreach ($selected_tags_arr as $selected_tag){
        $selected_tags[] = DAL::get_one_tag_by_id($selected_tag);
    }
    var_dump($selected_tags);
    // get the comments associated with this post
    $comments = DAL::get_all_comment_by_post($args['id']);
    // insert the post and comments found into args array
    $args['post'] = $post;
    $args['tags'] = $tags;
    $args['selected_tags'] = $selected_tags;
    $args['comments'] = $comments;
    return $this->renderer->render($response, 'detail.phtml', $args);
});

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
        $tags = DAL::get_all_tags();
        // insert tags into $args
        $args['tags'] = $tags;
        // redirect to index page
        return $this->renderer->render($response, 'new.phtml', $args);
    } else{
        // get post and tags values
        $post = $request->getParsedBody();
        $tags = $post['tags'];
        // form tags as string
        $tags = implode(',',$tags);
        // encapsulation
        $new_post = new Post($post['title'], $post['date'], $post['body'], $tags);
        // save new post to database
        DAL::add_one_post($new_post);
        // redirect to index page
        return $response->withRedirect('/'.$args['id']);
    }
});

$app->get('/delete/{id}', function ($request, $response, $args){
    // delete the post
    DAL::delete_one_post($args['id']);
    // redirect
    return $response->withRedirect('/');
});