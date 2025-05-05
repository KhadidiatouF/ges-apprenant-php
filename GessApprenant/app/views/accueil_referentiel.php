

<?php
require_once __DIR__ . '/../controllers/ref.controller.php';


$message = "";
$referentielsPromoActive = [];
$nomPromoActive = "";

$jsonPath = __DIR__ . '/../data/data.json';

if (file_exists($jsonPath)) {
    $data = json_decode(file_get_contents($jsonPath), true);

    if (isset($data['promotion']) && is_array($data['promotion'])) {
        foreach ($data['promotion'] as $promo) {
            if ($promo['statut'] === 'Active') {
                $referentielsPromoActive = $promo['referentiel'];
                $nomPromoActive = $promo['nom'];
                break;
            }
        }
    } else {
        $message = "Format JSON invalide.";
    }
} else {
    $message = "Fichier JSON non trouvé à : $jsonPath";
}

$tousReferentiels = ["DEV WEB/MOBILE", "DATA", "AWS", "REF DIG", "HACKEUSE"];
$referentielsDisponibles = array_filter($tousReferentiels, fn($r) => !in_array($r, $referentielsPromoActive));

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/accueil_referentiel.css">
    <title>Référentiels</title>
</head>
<body>

    <div class="main-content">
        <h2>Référentiels</h2>
        <p class="soustitre">Gérer les référentiels de la promotion</p>

        <input type="checkbox" id="modal-toggle" hidden>

        <!-- Fenêtre modale -->
        <div class="modal-overlay"></div>
        
        <div class="modal">
            <div class="modal-header">
                <h3 class="modal-title">Ajouter un référentiel</h3>
                <label for="modal-toggle" class="close-button">×</label>
            </div>
            <div class="modal-body">
               <form method="post" action="index.php?page=<?= \App\Enums\Page::REFERENTIEL->value ?>">
                 <input type="hidden" name="ajouterReferentiel" value="1"> 
                    <div class="form-group1">
                        <label for="referential-title">Libellé référentiel</label>
                        <select id="referentiel" name="referentiel" class="input-field">
                            <option value="">Référentiels</option>
                            <?php foreach ($referentielsDisponibles as $ref): ?>
                                <option value="<?= htmlspecialchars($ref) ?>">Référentiel <?= htmlspecialchars($ref) ?></option>
                            <?php endforeach; ?>
                        </select>

                        
                        <div class="ajout">
                            <button type="submit" class="ajj">Ajouter</button>
                        </div>
                    </div>
                </form>

               
                <div class="form-group">
                    <label>Promotion active</label>
                    <div class="tag-container">
                        
                        <?php foreach ($referentielsPromoActive as $ref): ?>
                            <?php
                                $class = strtolower(str_replace(' ', '-', $ref)); 
                            ?>
                            <span class="tag <?= $class ?>">
                                <?= $ref ?> 
                                <form method="post" action="index.php?page=<?= \App\Enums\Page::REFERENTIEL->value ?>" style="display:inline;">
                                    <input type="hidden" name="refToRemove" value="<?= htmlspecialchars($ref) ?>">
                                    <button type="submit" class="close" >×</button>
                                </form>
                            </span>
                        <?php endforeach; ?>
                    </div>

                </div>

                
            </div>     
            <div class="modal-footer">
                <button class="submit-button">Terminer</button>
            </div>
        </div>

        <!-- Section de recherche et ajout -->
        <div class="search-section">
                <form method="GET" >
                
                        <input type="hidden" name="page" value="referentiel">  
                        <input type="text" name="search"  class="search-input" placeholder="Rechercher un référentiel...">

                     <?php foreach ($referentiels as $referentiel): ?>

                            <?php if (isset($referentiel)) : ?>
                                    <?php if ($referentiel) : ?>
                                    <?php else : ?>
                                        <p>Aucun résultat trouvé.</p>
                                    <?php endif; ?>
                            <?php endif; ?>

                    <?php endforeach; ?>
              
                </form>
            <a href="index.php?page=<?= \App\Enums\Page::REFERENTIEL_LIST->value ?>" class="all-btn">
                <i class="fas fa-list"></i> Tous les référentiels
            </a>
            <label for="modal-toggle" class="add-btn">
                <i class="fas fa-plus"></i> Affecter un référentiel
            </label>
        </div>

        <!-- Cartes des référentiels -->
        <div class="referentiel-container">
            <?php foreach ($referentiels as $ref) : ?>
                <div class="referentiel-card">
                    <div class="image-container">
                        <img src="<?= htmlspecialchars($ref['image']) ?>" alt="<?= htmlspecialchars($ref['nom']) ?>">
                    </div>
                    <div class="card-content">
                        <h3><?= htmlspecialchars($ref['nom']) ?></h3>
                        <h4><?= $ref['modules'] ?> module<?= $ref['modules'] > 1 ? 's' : '' ?></h4>
                        <h5><?= htmlspecialchars($ref['description']) ?></h5>
                        <div class="trait-vert"></div>
                        <div class="apprenants-info">
                            <div class="cercle1"></div>
                            <div class="cercle2"></div>
                            <div class="cercle3"></div>
                            <p><strong><?= $ref['apprenants'] ?> apprenant<?= $ref['apprenants'] > 1 ? 's' : '' ?></strong></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

</body>
</html>
