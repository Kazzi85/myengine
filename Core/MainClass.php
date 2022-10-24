<?php
namespace core;

class MainClass
{
    public function __construct()
    {
        include_once 'db.php'; //Connecting the database
    }

    /**
     * The function that outputs the site header
     */
    static function get_header () {
        if(file_exists('views/templates/header.php'))
        {
            include_once 'views/templates/header.php';
        } else {
            echo "<h2 style='color: red;'>Файл views/templates/header.php отсутствует.</h2>";
        }
    }

    /**
     * The function that outputs the site footer
     */
    static function get_footer () {
        if(file_exists('views/templates/footer.php'))
        {
            include_once 'views/templates/footer.php';
        } else {
            echo "<h2 style='color: red;'>Файл views/templates/footer.php отсутствует.</h2>";
        }
    }

    /**
     * A function that outputs the content of the requested page
     */
    static function get_content ($file_name) {
        if( $file_name == '/' || $file_name == '') {
            include_once 'views/pages/home.php';
        } else if ( $file_name != '' ) {
            include_once 'views/pages/' . $file_name;
        }
    }

    /**
     * A function that displays the site menu based on the bootstrap menu
     */
    static function get_menu () {
        if(file_exists('views/templates/menu.php'))
        {
            include_once 'views/templates/menu.php';
        } else {
            echo "<h2 style='color: red;'>Файл views/templates/menu.php отсутствует.</h2>";
        }
    }

    /**
     * A function that displays the user's widget in a convenient location.
     */
    static function get_user_widget () {
        if(file_exists('views/templates/user_widget.php'))
        {
            include_once 'views/templates/user_widget.php';
        } else {
            echo "<h2 style='color: red;'>Файл views/templates/user_widget.php отсутствует.</h2>";
        }
    }

    /**
     * Success alert function
     */
    static function get_success_alert ($str = 'Сообщение...') {
        echo ('
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                '. $str .'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ');
    }

    static function get_styles_libs () {
        $styles_libs_list =  array_diff(scandir('assets/libs/css'), array('..', '.'));
        if($styles_libs_list != '') {
            echo "<!-- Libs styles -->";
            foreach ($styles_libs_list as $style_lib) {
                echo nl2br('<link rel="stylesheet" href="../../assets/libs/css/' . $style_lib . '">');
            }
        }
    }

    static function get_styles () {
        $styles_list =  array_diff(scandir('assets/css'), array('..', '.'));
        if($styles_list != '') {
            echo "<!-- Styles -->";
            foreach ($styles_list as $style) {
                echo nl2br('<link rel="stylesheet" href="../../assets/css/' . $style . '">');
            }
        }
    }

    static function get_scripts_libs () {
        $scripts_libs_list =  array_diff(scandir('assets/libs/js'), array('..', '.'));
        if($scripts_libs_list != '') {
            echo "<!-- Libs scripts -->";
            foreach ($scripts_libs_list as $script_lib) {
                echo nl2br('<script src="../../assets/libs/js/' . $script_lib . '"></script>');
            }
        }
    }

    static function get_scripts () {
        $scripts_list =  array_diff(scandir('assets/js'), array('..', '.'));
        if($scripts_list != '') {
            echo "<!-- Scripts -->";
            foreach ($scripts_list as $script) {
                echo nl2br('<script src="../../assets/js/' . $script . '"></script>');
            }
        }
    }

    static function get_all_styles () {
        self::get_styles_libs();
        self::get_styles();
    }

    static function get_all_scripts () {
        self::get_scripts_libs();
        self::get_scripts();
    }


}