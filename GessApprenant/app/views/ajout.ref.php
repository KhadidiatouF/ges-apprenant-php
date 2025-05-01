
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/ajout_ref.css">
    <title>Document</title>
</head>
<body>
    
<!-- <input type="checkbox" id="modal-toggle" hidden> -->

    
<div class="creation-container">
        <div class="creation-header">
            <h2>Créer un nouveau référentiel</h2>
        </div>
        
        <?php if (!empty($errors)): ?>
            <div class="error-container">
                <?php foreach ($errors as $error): ?>
                    <p><?= htmlspecialchars($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?> 
        
        <form class="creation-form" action="index.php?page=<?= \App\Enums\Page::REF_CREATE->value ?>" method="POST" enctype="multipart/form-data">
            <div class="photo-section">
                <label for="photo-upload" class="photo-label">
                    <div class="photo-preview">
                        <i class="fa-regular fa-image"></i>
                        <p>Cliquez pour ajouter une photo</p>
                        <input type="file" id="photo-upload" name="photo" accept="image/png, image/jpeg" class="hidden-upload">
                    </div>
                </label>
                <?php if (!empty($errors['photo'])): ?>
                    <p class="error-message"><?= htmlspecialchars($errors['photo']) ?></p>
                <?php endif; ?>
            </div>
            
            <div class="form-field">
                <label for="nom" class="required">Nom</label>
                <input type="text" id="nom" name="nom" class="form-input <?= !empty($errors['nom']) ? 'input-error' : '' ?>" value="<?= htmlspecialchars($nom ?? '') ?>">
                <?php if (!empty($errors['nom'])): ?>
                    <p class="error-message"><?= htmlspecialchars($errors['nom']) ?></p>
                <?php endif; ?>
            </div>
            
            <div class="form-field">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-input form-textarea"><?= htmlspecialchars($description ?? '') ?></textarea>
            </div>
            
            <div class="form-row">
                <div class="form-field">
                    <label for="capacite" class="required">Capacité</label>
                    <input type="number" id="capacite" name="capacite" value="<?= htmlspecialchars($capacite ?? '30') ?>" class="form-input <?= !empty($errors['capacite']) ? 'input-error' : '' ?>">
                    <?php if (!empty($errors['capacite'])): ?>
                        <p class="error-message"><?= htmlspecialchars($errors['capacite']) ?></p>
                    <?php endif; ?>
                </div>
                
                <div class="form-field">
                    <label for="sessions" class="required">Nombre de sessions</label>
                    <select id="sessions" name="sessions" class="form-input">
                        <option value="1" <?= (isset($sessions) && $sessions == '1') ? 'selected' : '' ?>>1 session</option>
                        <option value="2" <?= (isset($sessions) && $sessions == '2') ? 'selected' : '' ?>>2 sessions</option>
                        <option value="3" <?= (isset($sessions) && $sessions == '3') ? 'selected' : '' ?>>3 sessions</option>
                    </select>
                </div>
            </div>
            
            <div class="form-actions">
                <a href="index.php?page=dashboard&action=referentiels" class="form-button button-cancel">Annuler</a>
                <button type="submit" class="form-button button-submit">Créer</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>

