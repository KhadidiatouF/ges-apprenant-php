


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/accueil_referentiel.css">
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
               <form method="post">
                    <div class="form-group1">
                        <label for="referential-title">Libellé référentiel</label>
                        <select id="referentiel" name="referentiel" class="input-field">
                            <option value="">Référentiels</option>
                            <option value="dev-web">Référentiel Dev web/mobile</option>
                            <option value="data">Référentiel Dev data</option>
                            <option value="aws">Référentiel AWS & Devops</option>
                            <option value="ref-dig">Référentiel Référent Digital</option>
                            <option value="hackeuse">Référentiel Hackeuse</option>
                        </select>
                        
                        <div class="ajout">
                            <button type="submit" name="ajouterReferentiel" class="ajj">Ajouter</button>
                        </div>
                    </div>
                </form>

                <div class="form-group">
                    <label>Promotion active</label>
                    <div class="tag-container">
                        <?php foreach ($referentielsPromoActive as $ref): ?>
                            <?php
                                $class = strtolower(str_replace(' ', '-', $ref)); // pour la classe CSS
                            ?>
                            <span class="tag <?= $class ?>">
                                <?= $ref ?> 
                                <form method="post" style="display:inline;">
                                    <input type="hidden" name="supprimerReferentiel" value="<?= $ref ?>">
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
