<?php

/**
 * instantiate a PDO object
 * Class connection
 */
class connection
{
    public static function getConnection(){
        try{
            $db = new PDO('sqlite:' . __DIR__ . './blog.db');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo 'Database connection failed: ' . $e->getMessage();
            exit;
        }
        return $db;
    }
}