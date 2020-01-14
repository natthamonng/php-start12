<?php include './layouts/head.php' ?>
<body>

    <?php
    require_once '../common/post.php';
    ?>

    <main>
        <header>
            <h1>Posts List</h1>
        </header>
        
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

</body>
<?php include './layouts/footer.php' ?>