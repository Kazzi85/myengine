<?php

    //use core\User;
    use core\MainClass;
    use core\Post;

    //$user = new \core\User();

?>

<section class="container">
    <div class="row">
        <div class="posts_list_wrap">

            <?php
                $posts = Post::get_posts();

                foreach ($posts as $post):
            ?>

            <div class="card post-item" style="width: 18rem;">
                <img src="/assets/img/<?= $post['main_img']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $post['title']; ?></h5>
                    <p class="card-text post-description"><?= $post['content']; ?></p>
                    <a href="single.php?id=<?= $post['id'] ?>" class="btn btn-primary stretched-link">Read more</a>
                </div>
            </div>

            <?php endforeach; ?>


        </div>
        <pre>
            <?php var_dump($_SESSION['current_user']);?>
        </pre>
    </div>
</section>
