<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajouter Client</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="/assets/css/ajout_promo.css">
</head>
<body>


<div class="container">
        <h2>Créer une nouvelle promotion</h2>
        <h4>Remplissez les informations ci-dessous pour créer une nouvelle promotion</h4>
        <form id="formClient">
            <div class="form-group">
                <label for="nom">Nom de la promotion :</label>
                <input type="text" id="nom" name="nom" placeholder="Ex: Promotion 2025">
            </div>

            <div class="date">
                <div class="form-group">
                    <label for="debut">Date de début :</label>
                    <input type="text" id="debut" name="debut" placeholder="dd/mm/yyyy">
                </div>
                <div class="form-group">
                    <label for="fin">Date de Fin :</label>
                    <input type="text" id="fin" name="fin" placeholder="dd/mm/yyyy">
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
                            <a href="index.php?page=dashboard&action=promo" class="btn cancel">Annuler</a>
                            <button type="submit" class="btn submit">Créer la promotion</button>
                        </div>
                </form>
            </div>

</body>
</html>
