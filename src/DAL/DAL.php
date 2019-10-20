<?php
require_once '../DBHelper/connection.php';

class DAL{
    /**
     * get all posts
     * @param $id
     * @return array
     */
    public static function get_all_post(){
        // get PDO object
        $db = connection::getConnection();
        // write sql code
        $sql = "SELECT * FROM post";
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
     * get one post by id
     * @param $id
     * @return mixed
     */
    public static function get_one_post($id){
        // get PDO object
        $db = connection::getConnection();
        // write sql code
        $sql = "SELECT * FROM post WHERE id = ?";
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
}