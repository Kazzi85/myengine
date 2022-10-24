<?php

namespace admin\core;

class Admin
{
    public function __construct()
    {
        include_once  $_SERVER['DOCUMENT_ROOT'] . '/Core/db.php'; //Connecting the database
    }

    /**
     * A function that outputs the content of the requested page in admin panel
     */
    static function get_admin_block ($admin_url) {
        $file_name = substr($admin_url, 6);
        if( $file_name == '' ) {
            include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/views/main.php';
        } else {
            include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/views/' . $file_name;
        }
    }
}