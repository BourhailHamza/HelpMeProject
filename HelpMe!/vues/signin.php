<?php 
    include_once '../config.php';

    $current_page = "signin.php";

    include_once 'header.php'; 

    include_once '../model/entity/account.php';
    include_once  '../model/repository/accountRepository.php';

    include_once '../model/entity/profile.php';
    include_once  '../model/repository/profileRepository.php';

    $class_error = "d-none";

    if (isset($_SESSION['email'])) {
        header('Location: home.php');
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $account_repository = new AccountRepository();
        $account = $account_repository->getAccountByEmail($email);

        if ($account != null) {
            if (password_verify($password, $account->getPassword())) {
                $class_error = "d-none";
        
                $_SESSION['email'] = $email;
        
                $current_email = $email;
        
                $profile_repository = new ProfileRepository();
                $profiles = $profile_repository->getProfilesByEmail($email);
        
                if ($profiles) {
                    $profile = $profiles[0];
        
                    $_SESSION['idProfile'] = $profile->getIdProfile();
                    var_dump($profile->getIdProfile());
                    $_SESSION['username'] = $profile->getUsername();

                    if ($profile->getRole() == "admin") {
                        $_SESSION['role'] = $profile->getRole();
                    }
                    
                    header('Location: home.php');
                    exit();
                } else {
                    header('Location: addProfile.php');
                    exit();
                }
            } else {
                $class_error = "d-block";
            }
        }
    }
?>

<body>
    <form class="sign" method="post" action="">
        <img src="../public/assets/logotype.png" alt="HelpMe!">
        <h1>SIGN IN</h1>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <p class="error_message <?php echo $class_error ?>">Email or password incorrect. Please try again</p>
        <input type="submit" value="Sign in">
        <a href="signup.php">I don't have an account</a>
    </form>
</body>

<?php include_once 'footer.php'; ?>

</html>