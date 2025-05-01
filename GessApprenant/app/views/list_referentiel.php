

<?php
$title = "Ajout réferentiel";
$css = "/assets/css/list_referentiel.css";

ob_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- link rel="stylesheet" href="assets/css/list_referentiel.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>TOUS LES REFS</title>
</head>
<body>
    

    <div class="conteneur">
        <div class="retour">
            <a href=""><i class="fa-solid fa-arrow-left"></i></a>
            <span>Retour au référentiel actifs</span>
        </div>

        <div class="titre">
            <h2>Tous les Référentiels</h2>
            <p>Liste complètes des rèférentiels de formation</p>
        </div>

        <div class="search">
            <div class="barre-search">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder = "Rechercher un référentiel ...">
            </div>
        
            <a href="index.php?page=<?= \App\Enums\Page::REF_CREATE->value ?>" class="btn">
                <i class="fas fa-plus"></i> Créer un référentiel
            </a>

        </div>



                <div class="grille-ref">
                    <?php foreach ($referentiels as $referentiel) : ?>
                    <div class="item">
                        <img src="<?= $referentiel['image'] ?>" alt="<?= $referentiel['nom'] ?>">
                        <h3><?= $referentiel['nom'] ?></h3>
                        <p><?= $referentiel['description'] ?></p>
                        <div></div>
                        Capacité: <?= $referentiel['capacite'] ?> places
                    </div>
                <?php endforeach; ?>
                </div>
    </div>
</body>
</html>



<?php
     $content = ob_get_clean();
     require_once __DIR__ . '/layout/base.layout.php';
?>

