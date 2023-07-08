<?php 
    include_once '../config.php';

    $current_page = "home.php";

    include_once 'header.php'; 

    session_start();

    if (!isset($_SESSION['email'])) {
        header('Location: 404.php');
        exit();
    }
?>

<body>
    <div class="container">
        <div class="left_topics">
            <h3>TOPICS</h3>
            <a href="">Meilleure carte graphique 2023</a>
            <a href="">Meilleure carte graphique 2023</a>
            <a href="">Meilleure carte graphique 2023</a>
            <a href="">Meilleure carte graphique 2023</a>
            <a href="">Meilleure carte graphique 2023</a>
            <a href="">Meilleure carte graphique 2023</a>
            <a href="">Meilleure carte graphique 2023</a>
            <a href="">Meilleure carte graphique 2023</a>
            <a href="">Meilleure carte graphique 2023</a>
            <a href="">Meilleure carte graphique 2023</a>
            <a href="">Meilleure carte graphique 2023</a>
            <a href="">Meilleure carte graphique 2023</a>
            <a href="">Meilleure carte graphique 2023</a>
            <a href="">Meilleure carte graphique 2023</a>
        </div>

        <div class="right_topics">
            <div class="topic_preview mb-2">
                <p class="font_small">17/05/2023 09:32</p>
                <p><strong>Titre : Les meilleurs cartes graphiques 2023</strong></p>
                <p class="description_preview">
                    <strong>Description</strong></br>
                    Bonjour a tous, Je suis actuellement a la recherche d’une carte graphique pour jouer a tout type de jeux. Voici ma config actuelle: Rayzen 7 16gb de RAM 1To
                    Bonjour a tous, Je suis actuellement a la recherche d’une carte graphique pour jouer a tout type de jeux. Voici ma config actuelle: Rayzen 7 16gb de RAM 1To<br>
                    Bonjour a tous, Je suis actuellement a la recherche d’une carte graphique pour jouer a tout type de jeux. Voici ma config actuelle: Rayzen 7 16gb de RAM 1To<br>
                    Bonjour a tous, Je suis actuellement a la recherche d’une carte graphique pour jouer a tout type de jeux. Voici ma config actuelle: Rayzen 7 16gb de RAM 1To<br>
                </p>
                <div class="d-flex">
                    <p class="font_small">3 messages</p>
                    <button class="more_button">Read more</button>
                    <button class="icon" id="icon_trash"><img src="../public/assets/icon_trash.png" alt="Delete"></button>
                </div>
                
            </div>

            <div class="topic_preview mb-2">
                <p class="font_small">17/05/2023 09:32</p>
                <p><strong>Titre : Les meilleurs cartes graphiques 2023</strong></p>
                <p class="description_preview">
                    <strong>Description</strong></br>
                    Bonjour a tous, Je suis actuellement a la recherche d’une carte graphique pour jouer a tout type de jeux. Voici ma config actuelle: Rayzen 7 16gb de RAM 1To
                    Bonjour a tous, Je suis actuellement a la recherche d’une carte graphique pour jouer a tout type de jeux. Voici ma config actuelle: Rayzen 7 16gb de RAM 1To<br>
                    Bonjour a tous, Je suis actuellement a la recherche d’une carte graphique pour jouer a tout type de jeux. Voici ma config actuelle: Rayzen 7 16gb de RAM 1To<br>
                    Bonjour a tous, Je suis actuellement a la recherche d’une carte graphique pour jouer a tout type de jeux. Voici ma config actuelle: Rayzen 7 16gb de RAM 1To<br>
                </p>
                <div class="d-flex">
                    <p class="font_small">3 messages</p>
                    <button class="more_button">Read more</button>
                    <button class="icon" id="icon_trash"><img src="../public/assets/icon_trash.png" alt="Delete"></button>
                </div>
                
            </div>

            <div class="topic_preview">
                <p class="font_small">17/05/2023 09:32</p>
                <p><strong>Titre : Les meilleurs cartes graphiques 2023</strong></p>
                <p class="description_preview">
                    <strong>Description</strong></br>
                    Bonjour a tous, Je suis actuellement a la recherche d’une carte graphique pour jouer a tout type de jeux. Voici ma config actuelle: Rayzen 7 16gb de RAM 1To
                    Bonjour a tous, Je suis actuellement a la recherche d’une carte graphique pour jouer a tout type de jeux. Voici ma config actuelle: Rayzen 7 16gb de RAM 1To<br>
                    Bonjour a tous, Je suis actuellement a la recherche d’une carte graphique pour jouer a tout type de jeux. Voici ma config actuelle: Rayzen 7 16gb de RAM 1To<br>
                    Bonjour a tous, Je suis actuellement a la recherche d’une carte graphique pour jouer a tout type de jeux. Voici ma config actuelle: Rayzen 7 16gb de RAM 1To<br>
                </p>
                <div class="d-flex">
                    <p class="font_small">3 messages</p>
                    <button class="more_button">Read more</button>
                    <button class="icon" id="icon_trash"><img src="../public/assets/icon_trash.png" alt="Delete"></button>
                </div>
                
            </div>
        </div>
    </div>
</body>

<?php include_once 'footer.php' ?>