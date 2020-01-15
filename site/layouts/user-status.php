<div class="user-status">
    <p>Salut 
        <?php if(isset($_SESSION['username'])){echo $_SESSION['username'];} ?>
    ! <a href="logout.php">Sign out</a>
    </p>
</div>