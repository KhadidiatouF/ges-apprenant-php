<?php
declare(strict_types=1);
require_once __DIR__ . '/../models/ref.models.php';

use function App\Models\getReferentiels;
$referentielsPromoActive = getReferentielsPromoActive(); 



$dataPath = __DIR__ . '/../data/data.json';

$search = $_GET['search'] ?? '';
$referentiels = getAllReferentiels($search); 

if (!file_exists($dataPath)) {
    die("Fichier data.json introuvable à l'emplacement : $dataPath");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['referentiel']) && $_POST['referentiel'] !== '') {
        $refToAdd = $_POST['referentiel'];

        if (file_exists($dataPath)) {
            $data = json_decode(file_get_contents($dataPath), true);

            if (isset($data['promotion']) && is_array($data['promotion'])) {
                foreach ($data['promotion'] as &$promo) {
                    if ($promo['statut'] === 'Active') {
                        if (!in_array($refToAdd, $promo['referentiel'])) {
                            $promo['referentiel'][] = $refToAdd;
                            file_put_contents($dataPath, json_encode($data, JSON_PRETTY_PRINT));
                        }
                        break;
                    }
                }
            }
        }
    }
}




function getAllReferentiels(string $search = ''): array {
    $file = __DIR__ . '/../data/data.json';
    if (!file_exists($file)) return [];

    $data = json_decode(file_get_contents($file), true);
    $referentiels = $data['referentiels'] ?? [];

    $referentiels = array_map(function ($referentiel) {
        $referentiel['image'] = match (strtolower($referentiel['nom'])) {
            'developpement web/mobile' => '/assets/images/referentiel/devw.png',
            'referent digital' => '/assets/images/referentiel/refdig.png',
            'developpement data' => '/assets/images/referentiel/data.png',
            'assistanat digital (hackeuse)' => '/assets/images/referentiel/hackeuse.png',
            'aws & devops' => '/assets/images/referentiel/aws.png',
            default => '/assets/images/referentiel/default.png',
        };
        return $referentiel;
    }, $referentiels);

    if ($search !== '') {
        $search = strtolower($search);
        $referentiels = array_filter($referentiels, fn($referentiel) =>
            str_contains(strtolower($referentiel['nom']), $search)
        );
    }

    return array_values($referentiels);
}






function afficher_referentiels(): array {
    $file = __DIR__ . '/../data/data.json';

    if (!file_exists($file)) {
        return [];
    }

    $json = file_get_contents($file);
    $data = json_decode($json, true);

    return array_map(function ($referentiel) {
        $referentiel['image'] = match (strtolower($referentiel['nom'])) {
            'développement web/mobile' => '/assets/images/referentiel/devw.png',
            'referent digital' => '/assets/images/referentiel/refdig.png',
            'développement data' => '/assets/images/referentiel/data.png',
            'assistanat digital (hackeuse)' => '/assets/images/referentiel/hackeuse.png',
            'aws & devops' => '/assets/images/referentiel/aws.png',
            default => '/assets/images/referentiel/default.png',
        };
        return $referentiel;
    }, $data['referentiels'] ?? []);
}




function referentiel_controller(): void {
    // global $referentiels;

    $referentiels = getReferentielsPromoActive();
    // $title = "Référentiels de la Promotion Active";
    global $referentiels;
    $title = "Référentiel";
    $css = "/assets/css/accueil_referentiel.css";

    ob_start();
    require __DIR__ . "/../views/accueil_referentiel.php";
    $content = ob_get_clean();

    require __DIR__ . "/../views/layout/base.layout.php";
}




function referentiel_list_controller(): void {
    global $referentiels;
    render('list_referentiel', ['referentiels' => $referentiels]);
}



function getReferentielsPromoActive(): array {
    $file = __DIR__ . '/../data/data.json';
    if (!file_exists($file)) return [];

    $data = json_decode(file_get_contents($file), true);
    $promotions = $data['promotion'] ?? [];
    $referentiels = $data['referentiels'] ?? [];

    $promoActive = array_filter($promotions, fn($promo) => isset($promo['statut']) && strtolower($promo['statut']) === "active");
    $promoActive = array_shift($promoActive);

    if (!$promoActive) {
        return []; 
    }

    $codesReferentiel = $promoActive['referentiel'] ?? [];

    $correspondances = [
        'dev web/mobile' => 'Developpement Web/Mobile',
        'ref dig' => 'Referent digital',
        'dev data' => 'Developpement Data',
        'aws' => 'AWS & DevOps',
        'hackeuse' => 'Assistanat Digital (Hackeuse)',
    ];

    $promoReferentiels = array_map(function($code) use ($correspondances) {
        $code = strtolower(trim($code));
        return $correspondances[$code] ?? $code;
    }, $codesReferentiel);

    return array_values(array_filter($referentiels, function ($ref) use ($promoReferentiels) {
        return in_array($ref['nom'], $promoReferentiels);
    }));
}


function create_referentiel()
{
    global $errors, $referentiels;

    $filePath = __DIR__ . '/../data/data.json';
    $data = file_exists($filePath) ? json_decode(file_get_contents($filePath), true) : ['referentiels' => []];

    // Validation des champs
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = trim($_POST['nom'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $capacite = (int) ($_POST['capacite'] ?? 0);
        $sessions = (int) ($_POST['sessions'] ?? 0);

        // Vérification du nom
        if (empty($nom)) {
            $errors['nom'] = "Le nom est requis.";
        } elseif (in_array(strtolower($nom), array_map('strtolower', array_column($data['referentiels'], 'nom')))) {
            $errors['nom'] = "Ce nom de référentiel existe déjà.";
        }

        if (empty($description)) {
            $errors['description'] = "La description est requise.";
        }

        if ($capacite <= 0) {
            $errors['capacite'] = "Capacité invalide.";
        }

        if ($sessions <= 0) {
            $errors['sessions'] = "Nombre de sessions invalide.";
        }

        // Validation de l'image
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
            $allowedTypes = ['image/jpeg', 'image/png'];
            $maxSize = 2 * 1024 * 1024; // 2MB

            if (!in_array(mime_content_type($_FILES['photo']['tmp_name']), $allowedTypes)) {
                $errors['photo'] = "Format d'image invalide (JPG, PNG seulement).";
            }

            if ($_FILES['photo']['size'] > $maxSize) {
                $errors['photo'] = "Taille de l'image supérieure à 2MB.";
            }

            if (empty($errors['photo'])) {
                $uploadDir = __DIR__ . '/../../public/uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $filename = uniqid() . '_' . basename($_FILES['photo']['name']);
                $targetPath = $uploadDir . $filename;

                move_uploaded_file($_FILES['photo']['tmp_name'], $targetPath);
                $imagePath = '/uploads/' . $filename;
            }
        }

        if (empty($errors)) {
            // Création du nouveau référentiel
            $newReferentiel = [
                'nom' => $nom,
                'description' => $description,
                'capacite' => $capacite,
                'modules' => $sessions,
                'apprenants' => 0,
                'statut' => 'inactif',
                'image' => $imagePath ?? '/uploads/default.png'
            ];

            $data['referentiels'][] = $newReferentiel;
            file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));

            header('Location: index.php?page=dashboard&action=referentiels');
            exit;
        }
    }

    // Si le formulaire n'a pas été soumis, afficher la vue de création
    $title = "Créer Référentiel";
    $css = "/assets/css/ajout_ref.css";

    ob_start();
    require __DIR__ . '/../views/ajout.ref.php'; 
    $content = ob_get_clean();

    require __DIR__ . '/../views/layout/base.layout.php'; 
}




function getData(): array {
    return json_decode(file_get_contents('data.json'), true);
}

function saveData(array $data): void {
    file_put_contents('data.json', json_encode($data, JSON_PRETTY_PRINT));
}

function affecterReferentiel(string $codeRef): string {
    $nom = [
        'DEV WEB/MOBILE' => 'Référentiel Dev web/mobile',
        'DATA' => 'Référentiel Dev data',
        'AWS' => 'Référentiel AWS & Devops',
        'REF DIG' => 'Référentiel Référent Digital',
        'HACKEUSE' => 'Référentiel Hackeuse',
    ];

    if (!isset($nom[$codeRef])) return "Référentiel invalide.";

    $libelle = $nom[$codeRef];
    $jsonPath = __DIR__ . '/../data/data.json';
    $data = json_decode(file_get_contents($jsonPath), true);

    $indexPromoActive = array_search('Active', array_column($data['promotion'], 'statut'));

    if ($indexPromoActive !== false) {
        $promo = &$data['promotion'][$indexPromoActive];
        if (!in_array($libelle, $promo['referentiel'])) {
            $promo['referentiel'][] = $libelle;
            file_put_contents($jsonPath, json_encode($data, JSON_PRETTY_PRINT));
            return "Référentiel ajouté.";
        } else {
            return "Déjà affecté.";
        }
    }

    return "Aucune promotion active.";
}

    


function desaffecterReferentiel(string $refToRemove): string {
    $jsonPath = __DIR__ . '/../data/data.json';
    $data = json_decode(file_get_contents($jsonPath), true);

    $indexPromoActive = array_search('Active', array_column($data['promotion'], 'statut'));

    if ($indexPromoActive !== false) {
        $promo = &$data['promotion'][$indexPromoActive];
        $index = array_search($refToRemove, $promo['referentiel']);
        if ($index !== false) {
            unset($promo['referentiel'][$index]);
            $promo['referentiel'] = array_values($promo['referentiel']); // réindexation
            file_put_contents($jsonPath, json_encode($data, JSON_PRETTY_PRINT));
            return "Référentiel supprimé.";
            referentiel_controller();
            
        }
    }

    return "Référentiel non trouvé.";
}


function chargerReferentielsPromoActive(): array {
    $jsonPath = __DIR__ . '/../data/data.json';
    $result = ['referentielsPromoActive' => [], 'nomPromoActive' => '', 'message' => ''];

    if (!file_exists($jsonPath)) {
        $result['message'] = "Fichier JSON non trouvé à : $jsonPath";
        return $result;
    }

    $data = json_decode(file_get_contents($jsonPath), true);

    if (!isset($data['promotion']) || !is_array($data['promotion'])) {
        $result['message'] = "Format JSON invalide.";
        return $result;
    }

    $index = array_search('Active', array_column($data['promotion'], 'statut'));
    if ($index !== false) {
        $result['referentielsPromoActive'] = $data['promotion'][$index]['referentiel'];
        $result['nomPromoActive'] = $data['promotion'][$index]['nom'];
    }

    return $result;
}



