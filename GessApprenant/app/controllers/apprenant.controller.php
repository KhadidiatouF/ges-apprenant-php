<?php
declare(strict_types=1);

// Charger le modèle et récupérer les fonctions
$apprenantServices = require __DIR__ . '/../models/apprenant.models.php';

require_once __DIR__ . '/../models/apprenant.models.php';

require_once __DIR__ . '/../services/session.service.php';
require_once __DIR__ . '/../services/validator.service.php';

function show_apprenant(): void {
    global $apprenantServices;

    $title = "Apprenant";
    $css = "/assets/css/apprenant.css";

    $apprenants = listerApprenants();

    ob_start();
    require_once __DIR__ . "/../views/apprenant_list.php"; 
    $content = ob_get_clean();

    require_once __DIR__ . "/../views/layout/base.layout.php";
}

function listerApprenants(): array {
    global $apprenantServices;
    return $apprenantServices['getAll'](); 
}



function rechercherApprenant(int $matricule): ?array {
    global $apprenantServices;
    return $apprenantServices['getByMatricule']($matricule);
}

// Les autres fonctions show_* sont bonnes.


function show_apprenant_module(): void {
    $title = "Apprenant module";
    $css = "/assets/css/app_module.css";

    ob_start();
    require_once __DIR__ . "/../views/apprenant_module.php"; 
    $content = ob_get_clean();

    require_once __DIR__ . "/../views/layout/base.layout.php";
}

function show_apprenant_absence(): void {
    $title = "Apprenant absence";
    $css = "/assets/css/app_absence.css";

    ob_start();
    require_once __DIR__ . "/../views/apprenant_absence.php"; 
    $content = ob_get_clean();

    require_once __DIR__ . "/../views/layout/base.layout.php";
}

function app():void{
    $title = "Ajout app";
    $css = "/assets/css/ajout_app.css";

    ob_start();
    require_once __DIR__ . "/../views/ajout_apprenant.php"; 
    $content = ob_get_clean();

    require_once __DIR__ . "/../views/layout/base.layout.php";
}


function create_app(): void {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $requiredFields = [
            'prenom', 'nom', 'date_naissance', 'lieu_naissance',
            'adresse', 'email', 'telephone',
            'tuteur_nom', 'tuteur_lien', 'tuteur_adresse', 'tuteur_telephone'
        ];

        $data = $_POST;
        $errors = [];

        $errors = array_reduce($requiredFields, function ($acc, $field) use ($data) {
            if (empty(trim($data[$field] ?? ''))) {
                $acc[$field] = "Le champ \"$field\" est requis.";
            }
            return $acc;
        }, []);

        
       
        if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "L'email est invalide.";
        }

        // Téléphone invalide
        if (!empty($data['telephone']) && !preg_match('/^(77|78|76|70)[0-9]{7}$/', $data['telephone'])) {
            $errors['telephone'] = "Téléphone invalide (doit commencer par 77, 78, 76 ou 70 et contenir 9 chiffres).";
        }

        if ($errors) {
            $_SESSION['errors'] = $errors;
            $_SESSION['old'] = $data; // pour pré-remplir le formulaire
            header('Location: ?page=' . \App\Enums\Page::APPRENANT->value);
            exit;
        }

        // Pas d'erreur : ajouter l'apprenant
        $model = require __DIR__ . '/../models/apprenant.models.php';

        $apprenant = [
            'matricule' => generer_matricule(),
            'prenom' => $data['prenom'],
            'nom' => $data['nom'],
            'date_naissance' => $data['date_naissance'],
            'lieu_naissance' => $data['lieu_naissance'],
            'adresse' => $data['adresse'],
            'email' => $data['email'],
            'telephone' => $data['telephone'],
            'tuteur' => [
                'nom' => $data['tuteur_nom'],
                'lien' => $data['tuteur_lien'],
                'adresse' => $data['tuteur_adresse'],
                'telephone' => $data['tuteur_telephone'],
            ]
        ];

        $model['add']($apprenant);
        $_SESSION['success'] = "Apprenant ajouté avec succès.";
        header('Location: ?page=' . \App\Enums\Page::APPRENANT_LIST->value);
        exit;
    }

    // Si GET → afficher le formulaire
    app();
}





// function createApp(): void
// {
//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//         $data = $_POST;

//         // Validation minimale
//         if (empty($data['nom']) || empty($data['adresse'])) {
//             $_SESSION['error'] = "Tous les champs sont obligatoires.";
//             return;
//         }

//         $model = require __DIR__ . '/../models/apprenant.models.php';

//         $apprenant = [
//             'matricule' => generer_matricule(),
//             'nom' => $data['nom'],
//             'adresse' => $data['adresse'],
//         ];

//         $model['add']($apprenant);
//         $_SESSION['success'] = "Apprenant ajouté avec succès.";

//         // Redirection vers la liste
//         header('Location: ?page=' . \App\Enums\Page::APPRENANT_LIST->value);
//         exit;
//     }

//     // Affichage du formulaire (GET)
//     show_apprenant();
// }



function generer_matricule(): string {
    $fichier = __DIR__ . '/../../data.json';
    $matricule_debut = 1051040;

    if (!file_exists($fichier)) {
        return strval($matricule_debut);
    }

    $contenu = file_get_contents($fichier);
    $apprenants = json_decode($contenu, true);

    if (!is_array($apprenants) || count($apprenants) === 0) {
        return strval($matricule_debut);
    }

    $dernier = end($apprenants);
    $dernier_matricule = isset($dernier['matricule']) ? (int)$dernier['matricule'] : $matricule_debut;

    return strval($dernier_matricule + 1);
}








