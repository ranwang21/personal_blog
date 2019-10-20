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
    public static function get_one_post($id)
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
}