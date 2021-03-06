<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php include './layouts/head.php' ?>
<body>

    <?php
    require_once '../common/post.php';
    ?>
    <?php include './layouts/header.php' ?>
    <?php include './layouts/user-status.php' ?>

    <main>
        <h2 class="page-title">Posts List</h2>
        
        <?php 
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['post-title']) && isset($_POST['post-body'])) {
                create_post($_POST['post-title'], $_POST['post-body']);
            }
        ?>
        <form id="addNewPost" class="container" method="POST">
            <input class="post-title" type="text" placeholder="title ..." name="post-title"/>
            <input class="post-body" type="text" placeholder="body ..." name="post-body"/>
            <button class="btn btn-submit" type="submit"><i class="fas fa-plus-circle"></i> Add New Post</button>
        </form>

        <ul>

            <?php
            $postsData = get_posts();
            $counter = 0;
            foreach($postsData as $post) {
            ?>

                <li>
                    <h3><a href="http://localhost/php-start12/site/post.php?id=<?= $counter ?>"><?= $post['title']; ?></a></h3>
                </li>

            <?php
            $counter++;
            }
            ?>

        </ul>


    </main>

    <?php include './layouts/footer.php' ?>
</body>

</html>