<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Changer le mot de passe</title>
  <link rel="stylesheet" href="assets/css/changermdp.css"> 
</head>
<body>
  <div class="container">
    <h2>Mot de passe oublié</h2>

    <form action="index.php?page=handle-forgot-password" method="POST">
        <label>Email</label>
        <input type="email" name="email" value="<?= $email ?? '' ?>" required>
        <?php if (!empty($errors['email'])): ?>
            <p style="color: red;"><?= $errors['email'] ?></p>
        <?php endif; ?>

        <?php if (!empty($errors['global'])): ?>
            <p style="color: red;"><?= $errors['global'] ?></p>
        <?php endif; ?>

        <label>Nouveau mot de passe</label>
        <input type="password" name="new_password" required>

        <label>Confirmer le mot de passe</label>
        <input type="password" name="confirm_password" required>
        <?php if (!empty($errors['confirm'])): ?>
            <p style="color: red;"><?= $errors['confirm'] ?></p>
        <?php endif; ?>

        <button type="submit">Réinitialiser</button>
    </form>

  </div>
</body>
</html>
