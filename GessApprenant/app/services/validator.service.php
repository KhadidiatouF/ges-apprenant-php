<?php
declare(strict_types=1);

use App\Enums\MessageKey;

function validateLogin(array $data): array {
    return array_filter([
        'login' => empty($data['login']) ? 'Login requis !' : null,
        'password' => empty($data['password']) ? 'Mot de passe requis !' : null
    ]);
}



function validatePromo(array $data): array {
    return array_filter([
        'nom' => empty($data['nom']) ? 'Nom requis !' : null,
        'debut' => empty($data['debut']) ? 'Date de début requis !' : null,
        'fin' => empty($data['fin']) ? 'Date de fin requis !' : null,
        'photo' => empty($data['photo']) ? 'Photo requis !' : null,
        'referentiel' => empty($data['referentiel']) ? 'Referentiel requis !' : null,

    ]);

}

// function validate_nom($nom): string {
//     if (empty($nom)) {
//         return 'Le nom de la promotion est requis.';
//     }
//     return '';
// }


function validate_dates(array $data): array {
    $errors = [];

    if (empty($data['debut']) || empty($data['fin'])) {
        $errors['dates'] = 'Les dates de début et de fin sont requises.';
    } elseif (!validate_date_format($data['debut']) || !validate_date_format($data['fin'])) {
        $errors['dates'] = 'Le format des dates est invalide. Utilisez le format : yyyy-mm-dd.';
    } elseif (strtotime($data['debut']) > strtotime($data['fin'])) {
        $errors['dates'] = 'La date de début ne peut pas être supérieure à la date de fin.';
    }

    return $errors;
}

function validate_date_format(string $date): bool {
    $dateTime = DateTime::createFromFormat('Y-m-d', $date);
    return $dateTime && $dateTime->format('Y-m-d') === $date;
}

function validate_referentiels(array $data): array {
    $errors = [];

    if (empty($data['referentiels'])) {
        $errors['referentiels'] = 'Veuillez sélectionner au moins un référentiel.';
    }

    return $errors;
}

function validate_photo(array $files): array {
    $errors = [];

    if (!isset($files['photo']) || $files['photo']['error'] !== UPLOAD_ERR_OK) {
        $errors['photo'] = 'Veuillez envoyer une photo pour la promotion.';
    }

    return $errors;
}



function validateReferentielNom($nom): array {
    $errors = [];
    if (empty($nom)) {
        $errors['nom'] = 'Le nom du référentiel est requis.';
    }

    return $errors;
}


function validateReferentielPhoto($photo): array {
    $errors = [];
    if (!isset($photo) || $photo['error'] !== UPLOAD_ERR_OK) {
        $errors['photo'] = 'Veuillez envoyer une photo pour le référentiel.';
    }

    return $errors;
}

function validateReferentielCapacite($capacite): array {
    $errors = [];
    if (empty($capacite)) {
        $errors['capacite'] = 'La capacité du référentiel est requise.';
    } elseif (!is_numeric($capacite) || $capacite <= 0) {
        $errors['capacite'] = 'La capacité doit être un nombre positif.';
    }

    return $errors;
}

function validateReferentielSessions($sessions): array {
    $errors = [];
    if (empty($sessions)) {
        $errors['sessions'] = 'Le nombre de sessions est requis.';
    } elseif (!in_array($sessions, [1, 2, 3])) {
        $errors['sessions'] = 'Le nombre de sessions doit être entre 1 et 3.';
    }

    return $errors;
}



// $messages = [
//     MessageKey::PROMO_TOGGLED->value => "État de la promotion modifié avec succès.",
//     MessageKey::ERROR_ID_MISSING->value => "ID de la promotion manquant.",
//     MessageKey::PROMO_CREATED->value => "Promotion ajoutée avec succès.",
// ];


