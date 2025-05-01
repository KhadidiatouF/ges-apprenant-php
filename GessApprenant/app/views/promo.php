
<?php
$title = "PROMOTION";
$css = "/assets/css/promo.css";

ob_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Promotions</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/promo.css">
</head>

<body>
                <div class="conteneur">
                    <div class="en-tete">
                        <div>
                            <h2>Promotion</h2>
                            <p>Gérer les promotions de l'école</p>
                        </div>
                        <a href="index.php?page=<?= \App\Enums\Page::PROMO_ADD->value ?>" class="ajouter">
                            <i class="fa-solid fa-plus"></i>
                            Ajouter une promotion
                        </a>
                    </div>

                    <?php if (isset($statistics) && is_array($statistics)): ?>
                        <div class="grille">
                            <div class="item">
                                <div class="apprenant">
                                    <span><?= $statistics['totalApprenants'] ?></span>
                                    <p>Apprenants</p>
                                </div>
                                <i class="fa-solid fa-users"></i>
                            </div>
                            <div class="item">
                                <div class="apprenant">
                                    <span><?= $statistics['uniqueReferentiels'] ?></span>
                                    <p>Référentiels</p>
                                </div>
                                <i class="fa-solid fa-book"></i>
                            </div>
                            <div class="item">
                                <div class="apprenant">
                                    <span><?= $statistics['activePromotions'] ?></span>
                                    <p>Promotions actives</p>
                                </div>
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <div class="item">
                                <div class="apprenant">
                                    <span><?= $statistics['pastPromotions'] ?></span>
                                    <p>Promotions passées</p>
                                </div>
                                <i class="fa-solid fa-folder"></i>
                            </div>
                        </div>
                    <?php else: ?>
                        <p>Les statistiques ne sont pas disponibles pour le moment.</p>
                    <?php endif; ?>


                    <div class="barre-recherche">
                        <div class="barre">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <form method="GET" >
                            <input type="hidden" name="page" value="promo">  
                            <input type="text" name= "search" placeholder="Rechercher ...">
                            <input type="submit" style="display: none;" />
                            
                            <?php foreach ($promotions as $promo): ?>
                                    <?php if (isset($promo)) : ?>
                                            <?php if ($promo) : ?>
                                            <?php else : ?>
                                                <p>Aucun résultat trouvé.</p>
                                            <?php endif; ?>
                                    <?php endif; ?>

                                <?php endforeach; ?>

                            

                            </form>                
                        </div>
                        <div class="tous-btn">
                            <span>Tous</span>
                            <i class="fa-solid fa-angle-down"></i>
                        </div>
                        <div class="tous">
                            <a href="#" class="btn-grille">Grille</a>
                            <a href="index.php?page=<?= \App\Enums\Page::PROMO_LIST->value ?>" class="btn-liste">Liste</a>
                        </div>
                    </div>

                    <div class="grille-promo">
                       <?php foreach ($promotions as $promo): ?>
                            <div class="item1">
                                <div class="active-desactive">
                                    <button class="btn-active"
                                            style="background-color: <?= strtolower($promo['statut']) === 'active' ? '#daf9e3' : '#fde8e8' ?>;
                                                color: <?= strtolower($promo['statut']) === 'active' ? '#589972' : '#c0392b' ?>;">
                                        <?= ucfirst($promo['statut']) ?>
                                    </button>

                                    <a href="index.php?page=promo-toggle&id=<?= $promo['id'] ?>">
                                        <i class="fa-solid fa-power-off"
                                        style="color: <?= strtolower($promo['statut']) === 'active' ? 'red' : 'green' ?>;
                                                background-color: #fde8e8;
                                                padding: 8px;
                                                border-radius: 50%;">
                                        </i>
                                    </a>
                                </div>

                                <div class="promo">
                                    <img src="assets/img/<?= $promo['photo'] ?>" alt="logo promo">
                                    <div class="numero-promo">
                                        <span><?= $promo['nom'] ?></span>
                                        <div>
                                            <span><i class="fa-solid fa-calendar-days"></i></span>
                                            <span>Début :</span> 
                                            <span><?= $promo['debut'] ?></span>
                                            <span>- Fin :</span> 
                                            <span><?= $promo['fin'] ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="apprenants">
                                    <span><i class="fa-regular fa-user"></i></span>  
                                    <?= $promo['apprenants'] ?> Apprenants
                                </div>
                                <div class="divider"></div>
                                <div class="voir-plus">
                                    <a href="#">Voir plus</a>
                                    <i class="fa-solid fa-angle-right"></i>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
       
            <!-- <div id="formulaire-ajout">
                    <h2>Créer une nouvelle promotion</h2>
                    <h4>Remplir les informations ci-dessous pour créer une nouvelle promotion</h4>

                <form action="index.php?page=<?= \App\Enums\Page::PROMO_CREATE->value ?>" method="POST" enctype="multipart/form-data">         
                        
                    <div class="form-group">
                            <label for="nom">Nom de la promotion</label>
                            <input type="text" id="nom"   name="nom" placeholder="Ex: DevWeb 2025" required>
                        </div>

                        <div class="date">
                            <div class="form-group">
                                <label for="debut">Date de début</label>
                                <input type="text" id="debut"  name="debut" placeholder="dd/mm/YYYY">
                            </div>
                            <div class="form-group">
                                <label for="fin">Date de fin</label>
                                <input type="text" id="fin"  name="fin" placeholder="dd/mm/YYYY">
                            </div>
                        </div>

                        <div class="photo">
                            <label for="photo-upload" class="photo-glisser">
                                Ajouter<span> ou glissez</span>
                            </label>
                            <input type="file" id="photo-upload"  name="photo"  accept="image/jpeg, image/png" style="display: none;">
                            <div class="format">
                                Format: JPG, PNG, JPEG taille Max 2MB
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Référentiels :</label>
                            <input type="checkbox" name="referentiel[]" value="DEV WEB/MOBILE"> DEV WEB/MOBILE<br>
                            <input type="checkbox" name="referentiel[]" value="REF DIG"> REF DIG<br>
                            <input type="checkbox" name="referentiel[]" value="DEV DATA"> DEV DATA<br>
                            <input type="checkbox" name="referentiel[]" value="AWS"> AWS<br>
                            <input type="checkbox" name="referentiel[]" value="HACKEUSE"> HACKEUSE<br>

                        </div>




                        <div class="btn-group">
                            <a href="#" class="btn cancel">Annuler</a>
                            <button type="submit" class="btn submit">Créer la promotion</button>
                        </div>
                </form>
        </div> -->

        <div class="overlay"></div> 
    </div>
</body>
</html>

<?php
     $content = ob_get_clean();
     require_once __DIR__ . '/layout/base.layout.php';
?>


