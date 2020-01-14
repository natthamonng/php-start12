<?php include './layouts/head.php' ?>
<body>
    <main>
        <form action="login.php" method="POST">
            <label>Username</label>
            <input type="text" name="username"/>
            <label>Password</label>
            <input type="password" name="password"/>
            <input type="submit" value="Login"/>
        </form>
    </main>
</body>
<?php include './layouts/footer.php' ?>

