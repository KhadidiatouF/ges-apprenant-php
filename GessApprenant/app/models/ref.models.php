<?php
declare(strict_types=1);
namespace App\Models;

return [

    'getReferentiels' => fn(string $search = ''): array => array_values(array_filter(
        json_decode(file_get_contents(__DIR__ . '/../data/data.json'), true)['referentiels'] ?? [],
        fn($ref) => str_contains(strtolower($ref['nom']), strtolower($search))
    )),

    'getAllReferentiels' => function (string $search = ''): array {
        $file = __DIR__ . '/../data/data.json';
        if (!file_exists($file)) return [];

        $data = json_decode(file_get_contents($file), true);
        $referentiels = $data['referentiels'] ?? [];

        if ($search !== '') {
            $search = strtolower($search);
            $referentiels = array_filter($referentiels, fn($ref) =>
                str_contains(strtolower($ref['nom']), $search)
            );
        }

        return array_values($referentiels);
    }

];
