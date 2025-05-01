<?php
declare(strict_types=1);
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function setSession(array $user): void {
    $_SESSION['user'] = $user;
  
}

function getSession(): ?array {
    return $_SESSION['user'] ?? null;
}

function destroySession(): void {
    session_destroy();
}

function render(string $view, array $data = []): void {
  extract($data);

  
  require_once __DIR__ . '/../views/' . $view . '.php';
}

