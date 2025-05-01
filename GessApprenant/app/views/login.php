
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Connexion - Sonatel Academy</title>
  <link rel="stylesheet" href="/assets/css/login.css">

  
</head>
<body>
        <div class="container">
              <div class="login-box">
                    <img src="/assets/images/d.png" alt="Logo Sonatel" class="logo">
                    <h3>Bienvenue sur<br></h3>
                    <span class="subtitle">Ecole du code Sonatel Academy</span>
                    <h2>Se connecter</h2>
                    <!-- &action=connexion -->
                   <form action="index.php?page=login"  method="POST"> 
                        <?php if (!empty($errors['global'])): ?>
                            <p style="color:red"><?= $errors['global'] ?></p>
                        <?php endif; ?>

                        <label for="login">Login</label>
                        <input type="text" name="login" id="login" value="<?= $old['login'] ?? '' ?>">
                        <?php if (!empty($errors['login'])): ?>
                            <p style="color:red"><?= $errors['login'] ?></p>
                        <?php endif; ?>

                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password">
                        <?php if (!empty($errors['password'])): ?>
                            <p style="color:red"><?= $errors['password'] ?></p>
                        <?php endif; ?>

                        
                        <a href="index.php?page=forgot-password-form" class="forgot">Mot de passe oublié ?</a>


                        <button type="submit">Se connecter</button>
                    </form>
              </div>
        </div>
</body>
</html>
