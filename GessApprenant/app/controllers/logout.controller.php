<?php
require_once __DIR__ . '/../services/session.service.php';

function handleLogout(): void {
    destroySession();
    header('Location: index.php?page=login');
    exit;
}
