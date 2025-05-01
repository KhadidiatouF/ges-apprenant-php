<?php
declare(strict_types=1);
// Contrôleur (par exemple, promoController.php)
// $statistics = getPromotionStatistics();
// require_once __DIR__ . '/../views/promo.php';


require_once __DIR__ . '/../models/promo.models.php';


//SEPARER APRES LES FONCTIONS CHAQUE FONCTION FAIT UNE ET UNE SEULE CHOSE

$search = $_GET['search'] ?? '';
$promotions = getAllPromotions($search); // ta fonction avec filtre


function getAllPromotions(string $search = ''): array {
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
}





function promo_list_controller(): void {
    $search = $_GET['search'] ?? '';
    $promotions = getAllPromotions($search);

    $statistics = getPromotionStatistics();

    showListePromotion($promotions, $statistics);
}


// function promo_controller(): void {
//     $promotions = getAllPromotions();
//     $statistics = getPromotionStatistics(); // <-- ajoute ça
//     render('promo', [
//         'promotions' => $promotions,
//         'statistics' => $statistics // <-- et passe les données à la vue
//     ]);
// }

function getPaginatedPromotions(array $promotions, int $page, int $limit): array {
    $offset = ($page - 1) * $limit;
    return array_slice($promotions, $offset, $limit);
}


function promo_controller(): void {
    $search = $_GET['search'] ?? '';
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $limit = 5;

    $promotions = getAllPromotions($search);
    $total = count($promotions);

    $paginatedPromotions = getPaginatedPromotions($promotions, $page, $limit);
    $totalPages = (int)ceil($total / $limit);

    $statistics = getPromotionStatistics();

    render('promo', [
        'promotions' => $paginatedPromotions,
        'statistics' => $statistics,
        'search' => $search,
        'page' => $page,
        'totalPages' => $totalPages,
    ]);
}

// function promo_controller(): void {
//     $search = $_GET['search'] ?? '';

//     $promotions = getAllPromotions();

//     if ($search !== '') {
//         $promotions = array_filter($promotions, fn($promo) => stripos($promo['nom'], $search) !== false);
//     }

//     $statistics = getPromotionStatistics();

//     render('promo', [
//         'promotions' => $promotions,
//         'statistics' => $statistics,
//         'search' => $search 
//     ]);
// }




function toggle_promo_controller(): void {
    if (!isset($_GET['id'])) {
        render('error', ['message' => 'ID manquant !']);
        return;
    }

    $file = __DIR__ . '/../data/data.json';
    if (!file_exists($file)) return;

    $data = json_decode(file_get_contents($file), true);

    $data['promotion'] = array_map(function ($promo){
        if ($promo['id'] === $_GET['id']) {
            if ($promo['statut']=='Active') {
            $promo['statut'] = 'Inactive';
           }else{
            $promo['statut'] = 'Active';

           }
        }else {
            $promo['statut'] = 'Inactive';
        }
        return $promo;
    }, $data['promotion']);

    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
    promo_controller(); 
}


function showListePromotion(array $promotions): void {
    
    $message = '';
    if (isset($_GET['search']) && trim($_GET['search']) !== '' && empty($promotions)) {
        $message = 'Aucune promotion trouvée pour votre recherche.';
    }
    render('promo.liste', [
        'promotions' => $promotions,
        'message' => $message
    ]);
}



function showGrillePromotion(array $promotions): void {
    render('promo', ['promotions' => $promotions]);
}



function show_create_promotion_form(): void {
    $title = "Promotion";
    $css = "/assets/css/list_promo.css";

    ob_start();
    require_once __DIR__ . "/../views/promo-create.php"; 
    $content = ob_get_clean();

    require_once __DIR__ . "/../views/layout/base.layout.php";
}




function handle_create_promotion(): void
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        render(\App\Enums\Page::PROMO->value, [
            'error' => 'Méthode non autorisée'
        ]);
        return;
    }

    $nom = trim($_POST['nom'] ?? '');
    $debut = trim($_POST['debut'] ?? '');
    $fin = trim($_POST['fin'] ?? '');
    $referentiels = $_POST['referentiel'] ?? [];
    $photoName = null;

    $errors = [];

    $file = __DIR__ . '/../data/data.json';
    $data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

    
    if (empty($nom)) {
        $errors['nom'] = "Le nom de la promotion est obligatoire.";
    } else {
        $promoExist = array_filter($data['promotion'] ?? [], fn($promo) => strcasecmp($promo['nom'], $nom) === 0);
        if (!empty($promoExist)) {
            $errors['nom'] = "Une promotion avec ce nom existe déjà.";
        }
    }
    

    if (empty($debut)) {
        $errors['debut'] = "La date de début est obligatoire.";
    } elseif (!validate_date($debut)) {
        $errors['debut'] = "La date de début doit être au format jj/mm/aaaa.";
    }

    if (empty($fin)) {
        $errors['fin'] = "La date de fin est obligatoire.";
    } elseif (!validate_date($fin)) {
        $errors['fin'] = "La date de fin doit être au format jj/mm/aaaa.";
    }

    if (empty($errors['debut']) && empty($errors['fin'])) {
        $debutDate = \DateTime::createFromFormat('d/m/Y', $debut);
        $finDate = \DateTime::createFromFormat('d/m/Y', $fin);

        if ($debutDate >= $finDate) {
            $errors['fin'] = "La date de fin doit être supérieur à la date de début.";
        }
    }

    if (empty($referentiels)) {
        $errors['referentiel'] = "Veuillez sélectionner au moins un référentiel.";
    }

    if (!isset($_FILES['photo']) || $_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
        $errors['photo'] = "Veuillez envoyer une photo pour la promotion.";
    } else {
        $photoInfo = getimagesize($_FILES['photo']['tmp_name']);
        if (!$photoInfo) {
            $errors['photo'] = "Le fichier envoyé n'est pas une image valide.";
        } else {
            $allowedTypes = ['image/jpeg', 'image/png'];
            if (!in_array($photoInfo['mime'], $allowedTypes)) {
                $errors['photo'] = "Format d'image non supporté (seulement JPG et PNG).";
            }

            if ($_FILES['photo']['size'] > 2 * 1024 * 1024) { // 2MB
                $errors['photo'] = "L'image ne doit pas dépasser 2 Mo.";
            }
        }
    }



    if (!empty($errors)) {
        
        
        render(\App\Enums\Page::PROMO_CREATE->value, [

            'error' => $errors,
            'old' => compact('nom', 'debut', 'fin', 'referentiels'),

        ]);
        return;

        
    }

    $tmpName = $_FILES['photo']['tmp_name'];
    $photoName = uniqid('promo_', true) . '_' . $_FILES['photo']['name'];
    $uploadDir = __DIR__ . '/../public/images/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    move_uploaded_file($tmpName, $uploadDir . $photoName);

    $id = uniqid('promo_');

    $newPromo = [
        'id' => $id,
        'nom' => $nom,
        'debut' => $debut,
        'fin' => $fin,
        'referentiel' => $referentiels,
        'photo' => $photoName,
        'statut' => 'Inactive',
        'apprenants' => 0
    ];

    $data['promotion'][] = $newPromo;
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

    render(\App\Enums\Page::PROMO->value, [
        'success' => 'Promotion créée avec succès.',
        'promotions' => $data['promotion'],
        getPromotionStatistics()
    ]);
}

function validate_date(string $date): bool
{
    $d = \DateTime::createFromFormat('d/m/Y', $date);
    return $d && $d->format('d/m/Y') === $date;
}





function getPromotionStatistics(): array {
    $promotions = getAllPromotions();

    $activePromotions = array_filter($promotions, function($promo) {
        return isset($promo['statut']) && strtolower($promo['statut']) === 'active';
    });

    $activeCount = count($activePromotions);
    $totalPromotions = count($promotions);
    $pastPromotionsCount = $totalPromotions - $activeCount;

    $totalApprenants = array_reduce($activePromotions, function($carry, $promo) {
        return $carry + ($promo['apprenants'] ?? 0);
    }, 0);

    $referentiels = array_reduce($activePromotions, function($carry, $promo) {
        if (isset($promo['referentiel']) && is_array($promo['referentiel'])) {
            return array_merge($carry, $promo['referentiel']);
        } elseif (isset($promo['referentiel'])) {
            $carry[] = $promo['referentiel'];
        }
        return $carry;
    }, []);

    $uniqueReferentiels = count(array_unique($referentiels));

    return [
        'totalApprenants' => $totalApprenants,
        'uniqueReferentiels' => $uniqueReferentiels,
        'activePromotions' => $activeCount,
        'pastPromotions' => $pastPromotionsCount,
    ];
}
