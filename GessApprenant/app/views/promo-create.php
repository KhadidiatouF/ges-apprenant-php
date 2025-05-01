
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/list_promo.css">
    <title>AJOUTER UNE PROMOTION</title>
</head>
<body>
<div class="container">
    <div class="conteneur">

     
    <h2>Créer une nouvelle promotion</h2>
        <h4>Remplissez les informations ci-dessous pour créer une nouvelle promotion</h4>

        <form id="formClient" action="index.php?page=<?= \App\Enums\Page::PROMO_CREATE->value ?>" method="POST" enctype="multipart/form-data">         
                
            <div class="form-group">
                <label for="nom">Nom de la promotion :</label>
                <input type="text" id="nom" name="nom" placeholder="Ex: Promotion 2025" >
                <?php if (!empty($error['nom'])): ?>
                    <p style="color:red"><?= $error['nom'] ?></p>
                <?php endif; ?>    
            </div>

            <div class="date">
                <div class="form-group">
                    <label for="debut">Date de début :</label>
                    <input type="text" id="debut" name="debut" placeholder="dd/mm/yyyy" >
                    <?php if (!empty($error['debut'])): ?>
                        <p style="color:red"><?= $error['debut'] ?></p>
                    <?php endif; ?>

                   
                </div>

                <div class="form-group">
                    <label for="fin">Date de Fin :</label>
                    <input type="text" id="fin" name="fin" placeholder="dd/mm/yyyy" >
                    <?php if (!empty($error['fin'])): ?>
                        <p style="color:red"><?= $error['fin'] ?></p>
                    <?php endif; ?>

                </div>
            </div>

            <div class="photo">
                <label for="photo-upload" class="photo-glisser">
                    Ajouter<span> ou glissez</span>
                </label>
                <input type="file" id="photo-upload" name="photo" accept="image/jpeg, image/png" style="display: none;">
                <?php if (!empty($error['photo'])): ?>
                    <p style="color:red"><?= $error['photo'] ?></p>
                <?php endif; ?>

                <div class="format">
                    Format: JPG, PNG, JPEG taille Max 2MB
                </div>
               
            </div>     

            <div class="form-group">
                <label>Référentiels :</label>
                <input type="checkbox" name="referentiel[]" value="DEV WEB/MOBILE" <?= isset($old['referentiel']) && in_array('DEV WEB/MOBILE', $old['referentiel']) ? 'checked' : '' ?>> DEV WEB/MOBILE<br>
                <input type="checkbox" name="referentiel[]" value="REF DIG" <?= isset($old['referentiel']) && in_array('REF DIG', $old['referentiel']) ? 'checked' : '' ?>> REF DIG<br>
                <input type="checkbox" name="referentiel[]" value="DEV DATA" <?= isset($old['referentiel']) && in_array('DEV DATA', $old['referentiel']) ? 'checked' : '' ?>> DEV DATA<br>
                <input type="checkbox" name="referentiel[]" value="AWS" <?= isset($old['referentiel']) && in_array('AWS', $old['referentiel']) ? 'checked' : '' ?>> AWS<br>
                <input type="checkbox" name="referentiel[]" value="HACKEUSE" <?= isset($old['referentiel']) && in_array('HACKEUSE', $old['referentiel']) ? 'checked' : '' ?>> HACKEUSE<br>
                <?php if (!empty($error['referentiels'])): ?>
                    <p style="color:red"><?= $error['referentiels'] ?></p>
                <?php endif; ?>

               
            </div>

            <div class="btn-group">
                <a href="index.php?page=dashboard&action=promo" class="btn cancel">Annuler</a>
                <a href="index.php?page=dashboard&action=promo"><button type="submit" class="btn submit">Créer la promotion</button></a>
            </div>

        </form>
       </div>
    </div>

</body>
</html>

 

<?php
$content = ob_get_clean();
require_once __DIR__ . '/layout/base.layout.php';
?>