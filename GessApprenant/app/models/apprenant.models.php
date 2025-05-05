<?php
declare(strict_types=1);

namespace Models\Apprenant;

const DATA_PATH = __DIR__ . '/../data/data.json';

// Récupère tous les apprenants
$getAllApprenants = fn(): array => (
    file_exists(DATA_PATH)
        ? json_decode(file_get_contents(DATA_PATH), true)['apprenants'] ?? []
        : []
);

// Sauvegarde les apprenants
$saveApprenants = fn(array $apprenants) =>
    file_put_contents(
        DATA_PATH,
        json_encode(['apprenants' => $apprenants], JSON_PRETTY_PRINT)
    );

// Ajoute un apprenant
$addApprenant = fn(array $apprenant) =>
    $saveApprenants([...$getAllApprenants(), $apprenant]);

// Recherche par matricule
$getApprenantByMatricule = fn(int $matricule): ?array =>
    array_values(
        array_filter($getAllApprenants(), fn($a) => $a['matricule'] === $matricule)
    )[0] ?? null;

return [
    'getAll' => $getAllApprenants,
    'add' => $addApprenant,
    'getByMatricule' => $getApprenantByMatricule,
];
