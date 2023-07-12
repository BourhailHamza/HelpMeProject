<?php

  include_once '../model/entity/profile.php';
  include_once '../model/repository/profileRepository.php';


  if (isset($_SESSION['email'])) {
    $profileRepository = new ProfileRepository();
    $profiles = $profileRepository->getProfilesByEmail($_SESSION['email']);
  }

  if (isset($_POST['add_profile'])) {
    header("Location: addProfile.php");
    exit();
  }
  
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['profile_username'])) {
      $selectedProfileUsername = $_POST['profile_username'];

      $profileRepository = new ProfileRepository();
      $selectedProfile = $profileRepository->getProfileByUsername($selectedProfileUsername);

      if ($selectedProfile) {
          $_SESSION['username'] = $selectedProfile->getUsername();
          $_SESSION['role'] = $selectedProfile->getRole();
          header("Location: home.php");
            exit();
      }
  }

?>

<footer>
    <img src="../public/assets/isotype.png" alt="isotype">

    <?php if ($current_page != "signin.php" && $current_page != "signup.php" && $current_page != "addProfile.php") { ?>
        <button id="modalBtn">Add topic</button>
        <div id="current_profile" onclick="openModal()">
            <span class="username"><?php echo $_SESSION['username']; ?></span>
            <?php
            $profile = $profileRepository->getProfileByUsername($_SESSION['username']);

            if ($profile) {
                $logo = $profile->getProfileImage();

                if ($logo) {
                    echo "<img src='$logo' alt='profile' style='width: 50px; height: 50px;'>";
                } else {
                    echo "<img src='../public/assets/icon_profile.png' alt='profile' style='width: 50px; height: 50px;'>";
                }
            } else {
                echo "<img src='../public/assets/icon_profile.png' alt='profile' style='width: 50px; height: 50px;'>";
            }
            ?>
        </div>
    <?php } ?>
</footer>

<!-- Modal -->
<div id="changeProfile" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Select Profile</h2>
        <form method="POST" action="">
            <select name="profile_username">
                <?php foreach ($profiles as $profile) { ?>
                    <option value="<?php echo $profile->getUsername(); ?>"><?php echo $profile->getUsername(); ?></option>
                <?php } ?>
            </select>
            <input type="submit" class"change_profile" value="Change Profile">
            <button type="submit" name="add_profile" onclick="openAddProfile()">Create new profile</button>
        </form>
    </div>
</div>
<div id="overlay" class="overlay"></div>

<script>
    function openModal() {
        var modal = document.getElementById("changeProfile");
        var overlay = document.getElementById("overlay");
        modal.style.display = "block";
        overlay.style.display = "block";
    }

    function closeModal() {
        var modal = document.getElementById("changeProfile");
        var overlay = document.getElementById("overlay");
        modal.style.display = "none";
        overlay.style.display = "none";
    }

    window.addEventListener("click", function(event) {
        var modal = document.querySelector("#changeProfile .close");
        var overlay = document.getElementById("overlay");
        if (event.target === modal) {
            closeModal();
        }
    });
</script>


