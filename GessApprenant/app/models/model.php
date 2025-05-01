<?php
declare(strict_types=1);

namespace App\Models;

use App\Enums\FileName;

return [
    'jsonToArray' => fn(string $key) => json_decode(file_get_contents('./app/data/' . FileName::USERS->value), true)[$key] ?? [],
    
    'arrayToJson' => function (string $key, array $data): void {
        $all = json_decode(file_get_contents('./app/data/' . FileName::USERS->value), true);
        $all[$key] = $data;
        file_put_contents('./app/data/' . FileName::USERS->value, json_encode($all, JSON_PRETTY_PRINT));
    },
];
