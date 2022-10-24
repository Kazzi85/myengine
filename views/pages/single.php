<?php
use core\Post;

$post = Post::get_post($_GET['id']);
?>

<div class="container post-wrap">
    <h1><?= $post['title']; ?></h1>
    <img src="/assets/img/<?= $post['main_img']; ?>" class="img-fluid m-auto" alt="main_img" width="600">
    <div class="post-content">
        <?= $post['content']; ?>
    </div>
</div>
