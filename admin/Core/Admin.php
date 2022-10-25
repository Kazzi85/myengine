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
            include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/views/blocks/main.php';
        } else {
            include_once $_SERVER['DOCUMENT_ROOT'] . '/admin/views/blocks/' . $file_name;
        }
    }

    static function get_admin_header () {
        include_once 'views/templates/admin_header.php';
    }

    static function get_admin_footer () {
        include_once 'views/templates/admin_footer.php';
    }

    static function get_admin_links () {
        include_once 'views/templates/admin_links_panel.php';
    }

}