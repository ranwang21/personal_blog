<?php


class DAL{
    /**
     * -- tested
     * get all posts
     * @return array
     */
    public static function get_all_post(){
        // get PDO object
        $db = connection::getConnection();
        // write sql code
        $sql = "SELECT * FROM posts";
        // prepare statement & execute
        try{
            $results = $db->prepare($sql);
            $results->execute();
        }
        catch (Exception $e){
            echo "Error: " . $e->getMessage();
            exit;
        }
        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * -- tested
     * get one post by id
     * @param $id
     * @return mixed
     */
    public static function get_one_post_by_id($id)
    {
        // get PDO object
        $db = connection::getConnection();
        // write sql code
        $sql = "SELECT * FROM posts WHERE id = ?";
        // prepare statement & execute
        try{
            $results = $db->prepare($sql);
            $results->bindValue(1, $id, PDO::PARAM_INT);
            $results->execute();
        }
        catch (Exception $e){
            echo "Error: " . $e->getMessage();
            exit;
        }
        return $results->fetch();
    }

    /**
     * -- tested
     * search posts by title
     * @param $title
     * @return array
     */
    public static function get_all_post_by_title($title)
    {
        // get PDO object
        $db = connection::getConnection();
        // write sql code
        $sql = "SELECT * FROM posts WHERE title LIKE ?";
        // prepare statement & execute
        try{
            $results = $db->prepare($sql);
            $results->bindValue(1, '%' . $title . '%', PDO::PARAM_STR);
            $results->execute();
        }
        catch (Exception $e){
            echo "Error: " . $e->getMessage();
            exit;
        }
        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * -- tested
     * add a post
     * @param Post $post
     * @return bool
     */
    public static function add_one_post(Post $post)
    {
        // get PDO object
        $db = connection::getConnection();
        // write sql code
        $sql = "INSERT INTO posts (title, date, body) VALUES(?, ?, ?)";
        // prepare statement & execute
        try{
            $results = $db->prepare($sql);
            $results->bindValue(1, $post->getTitle(), PDO::PARAM_STR);
            $results->bindValue(2, $post->getDate(), PDO::PARAM_STR);
            $results->bindValue(3, $post->getBody(), PDO::PARAM_STR);
        }
        catch (Exception $e){
            echo "Error: " . $e->getMessage();
            exit;
        }
        return $results->execute();
    }

    /**
     * -- tested
     * Update a post
     * @param $id
     * @param Post $post
     * @return bool
     */
    public static function update_one_post($id, Post $post)
    {
        // get PDO object
        $db = connection::getConnection();
        // write sql code
        $sql = "UPDATE posts SET title = ?, date = ?, body = ? WHERE id = ?";
        // prepare statement & execute
        try{
            $results = $db->prepare($sql);
            $results->bindValue(1, $post->getTitle(), PDO::PARAM_STR);
            $results->bindValue(2, $post->getDate(), PDO::PARAM_STR);
            $results->bindValue(3, $post->getBody(), PDO::PARAM_STR);
            $results->bindValue(4, $id, PDO::PARAM_INT);
        }
        catch (Exception $e){
            echo "Error: " . $e->getMessage();
            exit;
        }
        return $results->execute();
    }

    /**
     * -- tested
     * Delete a post by id
     * @param $id
     * @return bool
     */
    public static function delete_one_post($id)
    {
        // delete all comments related to this post
        self::delete_comment_by_postId($id);
        // get PDO object
        $db = connection::getConnection();
        // write sql code
        $sql = "DELETE FROM posts WHERE id = ?";
        // prepare statement & execute
        try{
            $results = $db->prepare($sql);
            $results->bindValue(1, $id, PDO::PARAM_INT);
        }
        catch (Exception $e){
            echo "Error: " . $e->getMessage();
            exit;
        }
        return $results->execute();
    }

    /**
     * -- tested
     * find all existing comments
     * @return array
     */
    public static function get_all_comment()
    {
        // get PDO object
        $db = connection::getConnection();
        // write sql code
        $sql = "SELECT * FROM comments";
        // prepare statement & execute
        try{
            $results = $db->prepare($sql);
            $results->execute();
        }
        catch (Exception $e){
            echo "Error: " . $e->getMessage();
            exit;
        }
        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * -- tested
     * find all comments of one specific post
     * @param $id
     * @return array
     */
    public static function get_all_comment_by_post($id)
    {
        // get PDO object
        $db = connection::getConnection();
        // write sql code
        $sql = "SELECT * FROM comments WHERE post_id = ?";
        // prepare statement & execute
        try{
            $results = $db->prepare($sql);
            $results->bindValue(1, $id, PDO::PARAM_INT);
            $results->execute();
        }
        catch (Exception $e){
            echo "Error: " . $e->getMessage();
            exit;
        }
        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * -- tested
     * add a comment linked to a specific post
     * @param Comment $comment
     * @return bool
     */
    public static function add_one_comment(Comment $comment)
    {
        // get PDO object
        $db = connection::getConnection();
        // write sql code
        $sql = "INSERT INTO comments (name, body, post_id) VALUES(?, ?, ?)";
        // prepare statement & execute
        try{
            $results = $db->prepare($sql);
            $results->bindValue(1, $comment->getName(), PDO::PARAM_STR);
            $results->bindValue(2, $comment->getBody(), PDO::PARAM_STR);
            $results->bindValue(3, $comment->getPostId(), PDO::PARAM_INT);
        }
        catch (Exception $e){
            echo "Error: " . $e->getMessage();
            exit;
        }
        return $results->execute();
    }

    /**
     * -- tested
     * delete all comments of a specific post
     * @param $post_id
     * @return bool
     */
    public static function delete_comment_by_postId($post_id)
    {
        // get PDO object
        $db = connection::getConnection();
        // write sql code
        $sql = "DELETE FROM comments WHERE post_id = ?";
        // prepare statement & execute
        try{
            $results = $db->prepare($sql);
            $results->bindValue(1, $post_id, PDO::PARAM_INT);
        }
        catch (Exception $e){
            echo "Error: " . $e->getMessage();
            exit;
        }
        return $results->execute();
    }


}