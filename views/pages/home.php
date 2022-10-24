<?php

    use core\User;
    use core\MainClass;

    $user = new \core\User();

?>

<section class="container">
    <div class="row">
        <div class="posts_list_wrap">
            <div class="post_item">

                <?php
                echo "Сессия: ";
                print_r($_SESSION['current_user']);
                ?>

                <?php
                $alert = "АААА!!! <b>ЭТО РАБОТАЕТ!!!!</b> ААААА!!!!";
                MainClass::get_success_alert($alert);
                ?>
            </div>
        </div>
    </div>
</section>
