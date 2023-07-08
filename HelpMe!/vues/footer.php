<footer>
    <img src="../public/assets/isotype.png" alt="isotype">

    <?php if ($current_page != "signin.php" && $current_page != "signup.php" && $current_page != "addProfile.php") { ?>
        <button>Add topic</button>
        <div id='current_profile'>
            <?php echo $_SESSION['username'] ?>
        </div>
    <?php } ?>
</footer>