<?php if (!empty($_SESSION['errors'])): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($_SESSION['errors'] as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php unset($_SESSION['errors']); ?>
<?php endif; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/ajout_app.css">
    <title>Ajout apprenant</title>
</head>
<body>
    
  <div class="container">
    <h1>Ajout apprenant</h1>

      <h2>Informations de l’apprenant <span class="edit-icon"><i class="fa-regular fa-pen-to-square"></i></span></h2>
       <form action="index.php?page=<?= \App\Enums\Page::APPRENANT->value ?>" method="POST">

            <section class="section-form1">
            <div class="grid">
                    <div class="form-group">
                        <label>Prénom(s)</label>
                        <input type="text" value="" placeholder="Entrer le prénom">
                        
                        
                    </div>

                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" value="" placeholder="Entrer le nom">
                    </div>

                    <div class="form-group">
                    <label>Date de naissance</label>
                    <div class="input-with-icon">
                        <input type="text" value="" class="date" placeholder="Entrer la date de naissance">
                        <span class="calendar-icon"><i class="fa-solid fa-calendar-check"></i></span>
                    </div>
                    </div>

                    <div class="form-group">
                        <label>Lieu de naissance</label>
                        <input type="text" value="" placeholder="Entrer le lieu de naissance">
                    </div>

                    <div class="form-group wide">
                        <label>Adresse</label>
                        <input type="text" value="" placeholder="Entrer l'adresse">
                    </div>

                    <div class="form-group">
                        <label>Téléphone</label>
                        <input type="text" value="" placeholder="Entrer le numéro" >
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" value="" placeholder="Entrer l'email">
                    </div>

                    <div class="form-group file-upload">
                    <label> </label>

                    <div class="upload-box">
                    <i class="fa-solid fa-folder-minus" style="color: blue;"></i>
                    <button >Ajouter des document</button>
                    </div>
                </div>
            </div>
            </section>

            <section class="section-form">
            <h2>Informations du tuteur <span class="edit-icon"><i class="fa-regular fa-pen-to-square"></i></span></h2>
            <div class="grid">
                    <div class="form-group">
                        <label>Prénom(s) & nom</label>
                        <input type="text" value="" placeholder="Entrer le prénom et le nom">
                    </div>

                    <div class="form-group">
                        <label>Lien de parenté</label>
                        <input type="text" value="" placeholder="Lien de parenté">
                    </div>

                    <div class="form-group wide">
                        <label>Adresse</label>
                        <input type="text" value="" placeholder=" Entrer l'adresse du tuteur">
                    </div>

                    <div class="form-group">
                        <label>Téléphone</label>
                        <input type="text" value="" placeholder="Entrer le numéro du tuteur">
                    </div>
            </div>
            </section>

            <div class="buttons">
            <button class="cancel">Annuler</button>
            <button class="save">Enregistrer</button>
        </form>

    </div>
  </div>
</body>
</html>
