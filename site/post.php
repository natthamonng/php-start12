<?php include './layouts/head.php' ?>
<body>
<?php 
    require_once '../common/post.php';
    
    $post_id = $_GET['id'];
    $post = get_post($post_id);
?>
    <main>
        <h1><?= $post['title']; ?></h1>
        <p><?= $post['body']; ?> </p>
        <a href="http://localhost/php-start12/site/posts.php">Back to Posts List page</a>
    </main>
</body>
<?php include './layouts/footer.php' ?>