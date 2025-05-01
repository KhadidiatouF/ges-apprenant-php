<?php
declare(strict_types=1);

$authModel = [
    'getUsers' => fn() => json_decode(file_get_contents(__DIR__ . '/../data/data.json'), true)['users'] ?? [],
    
    'findUserByLoginAndPassword' => function (string $login, string $password): ?array {
        $users = json_decode(file_get_contents(__DIR__ . '/../data/data.json'), true)['users'] ?? [];

        $filtered = array_filter($users, fn($u) =>
            ($u['login'] === $login || $u['email'] === $login) &&
            $u['password'] === $password
        );

        return array_values($filtered)[0] ?? null;
    },

    'findUserByEmail' => fn(string $email): ?array => array_values(array_filter( json_decode(file_get_contents(__DIR__ . '/../data/data.json'), true),fn($u) => $u['email'] === $email ))[0] ?? null,

    'resetPassword' => function(string $email, string $newPassword): bool {
        $path = __DIR__ . '/../data/data.json';
        $users = json_decode(file_get_contents($path), true);

        $updatedUsers = array_map(function ($u) use ($email, $newPassword) {
            if ($u['email'] === $email) {
                $u['password'] = $newPassword;
            }
            return $u;
        }, $users);

        return file_put_contents($path, json_encode($updatedUsers, JSON_PRETTY_PRINT)) !== false;
    },





];


