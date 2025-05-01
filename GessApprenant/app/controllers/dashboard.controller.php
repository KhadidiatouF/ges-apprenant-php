<?php

declare(strict_types=1);

require_once __DIR__ . '/../services/session.service.php';
require_once __DIR__ . '/../enums/enum.php';

use App\Enums\Role;

function handleDashboard(): void {
    $user = getSession();

    if (!$user) {
        header('Location: index.php?page=login');
        exit;
    }

    switch ($user['role']) {
        case Role::Admin->value:
            render('/dashboard'); // fichier : app/views/dashboard.php
            break;

        case Role::Apprenant->value:
            render('apprenant/dashboard.html'); 
            break;

        case Role::Vigile->value:
            render('/dashboard'); 
            break;

        default:
            destroySession(); 
            header('Location: index.php?page=login');
            exit;
    }
}







