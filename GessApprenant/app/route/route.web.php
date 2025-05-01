<?php
declare(strict_types=1);


require_once __DIR__ . '/../controllers/connexion.controller.php';
require_once __DIR__ . '/../controllers/dashboard.controller.php';
require_once __DIR__ . '/../controllers/promo.controller.php'; 
require_once __DIR__ . '/../controllers/ref.controller.php';
require_once __DIR__ . '/../controllers/apprenant.controller.php';
require_once __DIR__ . '/../enums/enum.php'; 

use App\Enums\Page;

$page = $_REQUEST['page'] ?? Page::LOGIN->value;




match ($page) {
    Page::LOGIN->value => handleLogin(), 
    Page::DASHBOARD->value => handleDashboard(),
    Page::LOGOUT->value => handleLogout(),
    Page::FORGOT_PASSWORD_FORM->value => showForgotPasswordForm(),
    Page::HANDLE_FORGOT_PASSWORD->value => handleForgotPassword(),

    Page::PROMO_LIST->value => promo_list_controller(),
    Page::PROMO->value => promo_controller(),
    Page::PROMO_TOGGLE->value => toggle_promo_controller(),
    Page::PROMO_CREATE->value => handle_create_promotion(),
    Page::PROMO_ADD->value => show_create_promotion_form(),

    Page::REFERENTIEL->value => referentiel_controller(),
    Page::REFERENTIEL_LIST->value => referentiel_list_controller(),
    Page::REF_CREATE->value => create_referentiel(),
    Page::REF_AFFECT->value =>  affecterReferentiel($promoNom, $referentiel),
    Page::REF_DESAFFECT->value =>  desaffecterReferentiel($promoNom,$referentiel),


    Page::APPRENANT_LIST->value => show_apprenant(),
    Page::APPRENANT->value => create_app(),

    


    


    default => handleLogin()
    
};

//VERIFIER POUR LA ROUTE DE LA RECHERCHE ET FAIRE LA PAGE 404 AVEC IMAGE STORY SET