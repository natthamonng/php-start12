<?php 
    session_start();
?>

<?php include './layouts/head.php' ?>
<body>

    <?php include './layouts/header.php' ?>
    <?php include './layouts/user-status.php' ?>
    <?php 
        require_once '../common/post.php';
        
        $post_id = $_GET['id'];
        $post = get_post($post_id);
    ?>
        <main>
            <h2 class="page-title">Post Detail</h2>
            <h3><?= $post['title']; ?></h3>
            <p class="post-body"><?= $post['body']; ?> </p>
            <a href="http://localhost/php-start12/site/posts.php">Back to Posts List page</a>
        </main>
</body>
<?php include './layouts/footer.php' ?>