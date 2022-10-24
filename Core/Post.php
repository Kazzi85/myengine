<?php
namespace core;
use PDO;

include_once 'Core/db.php';

class Post
{

    public static function get_posts () {
        global $dbh;

        $result = $dbh->query("SELECT * FROM `posts`");
        $posts = $result->fetchAll();

        return $posts;
    }

    public static function get_post ($id) {
        global $dbh;

        $sql = "SELECT * FROM `posts` WHERE `id` = " . $id;
        $result = $dbh->query($sql);
        $post = $result->fetch();

        return $post;
    }
}