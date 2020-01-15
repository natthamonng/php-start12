<?php 
    session_start();
?>
<?php include './layouts/head.php' ?>
<body>
    <?php include './layouts/header.php' ?>
    <main>
        <form action="login.php" method="POST">
        <label for="username">UserName</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="username" value="root" />

            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="password"/>

            <input type="submit" class="btn btn-submit" value="Login"/>
        </form>
    </main>
</body>
<?php include './layouts/footer.php' ?>

