<?php

declare(strict_types=1);


use App\Enums\FileName;

return [
    'findAllPromo' => fn() => json_decode(file_get_contents(FileName::USERS->value), true) ?? [],

    'savePromo' => fn(array $promos) =>
        file_put_contents(FileName::USERS->value, json_encode($promos, JSON_PRETTY_PRINT)),

    'addPromo' => fn(array $newPromo) =>
        file_put_contents(
            FileName::USERS->value,
            json_encode([...json_decode(file_get_contents(FileName::USERS->value), true), $newPromo], JSON_PRETTY_PRINT)
        ),

    'togglePromo' => fn(int $id) => (
        function () use ($id) {
            $promos = json_decode(file_get_contents(FileName::USERS->value), true);
            $promos = array_map(function ($promo) use ($id) {
                if ($promo['id'] === $id) {
                    $promo['etat'] = !$promo['etat'];
                }
                return $promo;
            }, $promos);
            file_put_contents(FileName::USERS->value, json_encode($promos, JSON_PRETTY_PRINT));
        }
    )(),

    'filterPromoByName' => fn(string $search) =>
        array_filter(json_decode(file_get_contents(FileName::USERS->value), true), fn($promo) =>
            stripos($promo['nom'], $search) !== false),
];

$getAllPromotions = function (string $search = ''): array {
    $file = __DIR__ . '/../data/data.json';
    if (!file_exists($file)) return [];

    $data = json_decode(file_get_contents($file), true);
    $promotions = $data['promotion'] ?? [];

    if ($search !== '') {
        $search = strtolower($search);
        $promotions = array_filter($promotions, fn($promo) =>
            str_contains(strtolower($promo['nom']), $search)
        );
    }

    $promotions = array_values($promotions);

    usort($promotions, function ($a, $b) {
        return (strtolower($b['statut']) === 'active') <=> (strtolower($a['statut']) === 'active');
    });

    return $promotions;
};

$getAllPromotions = fn() =>
    json_decode(file_get_contents('app/data/data.json'), true)['promotions'] ?? [];

$rechercherPromotionParNom = fn($mot) =>
    array_filter($getAllPromotions(), fn($promo) =>
        str_contains(strtolower($promo['nom']), $mot)
    );


$readPromotions = function (): array {
    $file = __DIR__ . '/../../data/data.json';
    if (!file_exists($file)) return [];

    $data = json_decode(file_get_contents($file), true);
    return $data['promotion'] ?? [];
};

$savePromotions = function (array $promotions): void {
    $file = __DIR__ . '/../../data/data.json';
    $data = ['promotion' => $promotions];
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
};

$getPromotionStatistics = function () use ($readPromotions): array {
    $promotions = $readPromotions();

    $total = array_reduce($promotions, function ($carry, $promo) {
        return $carry + intval($promo['apprenants'] ?? 0);
    }, 0);

    $referentiels = array_column($promotions, 'referentiel');
    $uniqueReferentiels = count(array_unique($referentiels));

    $actives = count(array_filter($promotions, function ($promo) {
        return strtolower($promo['statut'] ?? '') === 'active';
    }));

    $passees = count($promotions) - $actives;

    return [
        'totalApprenants' => $total,
        'uniqueReferentiels' => $uniqueReferentiels,
        'activePromotions' => $actives,
        'pastPromotions' => $passees,
    ];
};
