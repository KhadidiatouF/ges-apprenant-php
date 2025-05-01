<?php
declare(strict_types=1);

require_once __DIR__ . '/../models/auth.models.php';
require_once __DIR__ . '/../services/session.service.php';
require_once __DIR__ . '/../services/validator.service.php';


function handleLogin(): void {
    global $authModel;

    $errors = [];
    $old = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login = trim($_POST['login'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $old = ['login' => $login];

        $errors = validateLogin(['login' => $login, 'password' => $password]);

        if (empty($errors)) {
            $user = $authModel['findUserByLoginAndPassword']($login, $password);

            if ($user) {
                setSession($user);
                render('dashboard'); // ou `render('dashboard', ['user' => $user]);` si besoin de passer l'utilisateur
                return;
            
            
            } else {
                $errors['global'] = "Login ou mot de passe incorrect.";
            }
        }
    }

    render('login', compact('errors', 'old'));
}


function logout(): void {
    require_once __DIR__ . '/../services/session.service.php';
    destroySession();
    render('login');
        
}



function showForgotPasswordForm(): void {
    require_once __DIR__ . '/../services/session.service.php';
    render('changer_mdp');
}

function handleForgotPassword(): void {
    $email = $_POST['email'] ?? '';
    $new = $_POST['new_password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';
    $errors = [];

    if (empty($email) || empty($new) || empty($confirm)) {
        $errors['global'] = "Tous les champs sont obligatoires.";
    }

    if ($new !== $confirm) {
        $errors['confirm'] = "Les mots de passe ne correspondent pas.";
    }

    $path = __DIR__ . '/../data/data.json';
    $allData = json_decode(file_get_contents($path), true);
    $users = $allData['users'];

    $matchedUser = array_filter($users, fn($u) => $u['email'] === $email);
    if (empty($matchedUser)) {
        $errors['email'] = "Aucun compte trouvé avec cet email.";
    }

    if (!empty($errors)) {
        render('changer_mdp', compact('errors', 'email'));
        return;
    }

    $updatedUsers = array_map(function ($u) use ($email, $new) {
        if ($u['email'] === $email) {
            $u['password'] = $new;
        }
        return $u;
    }, $users);

    $allData['users'] = $updatedUsers;
    file_put_contents($path, json_encode($allData, JSON_PRETTY_PRINT));

    render('login', ['success' => "Mot de passe réinitialisé. Vous pouvez maintenant vous connecter."]);
}
