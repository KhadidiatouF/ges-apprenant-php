<?php

declare(strict_types=1);

namespace App\Enums;

enum Role: string {
    case Admin = 'admin';
    case Apprenant = 'apprenant';
    case Vigile = 'vigile';
}

enum SessionKey: string {
    case USER = 'connectedUser';
    case ERRORS = 'errors';
    case ANCIEN = 'ancien';
}

enum FileName: string {
    case USERS = 'data.json';
}

enum ViewPath: string {
    case LOGIN = 'auth/login.php';
    case DASHBOARD_ADMIN = 'admin/dashboard.php';
    case DASHBOARD_APPRENANT = 'apprenant/dashboard.app.php';
    case DASHBOARD_VIGILE = 'vigile/dashboard.vigile.php';
}

enum ViewPromo: string {
    case LISTE = 'promotion/promo.liste.php';
    case GRILLE = 'promotion/promo.grille.php';
    case CREATE = 'promotion/promo.php';
}

enum Page: string {
    case LOGIN = 'login';
    case DASHBOARD = 'dashboard';
    case LOGOUT = 'logout';
    case FORGOT_PASSWORD_FORM = 'forgot-password-form';
    case HANDLE_FORGOT_PASSWORD = 'handle-forgot-password';
    case PROMO = 'promo';
    case PROMO_LIST = 'promo-list';
    case PROMO_GRID = 'promo-grid';
    case PROMO_ADD = 'promo-add';
    case PROMO_CREATE = 'promo-create';
    case PROMO_TOGGLE = 'promo-toggle';
    case REFERENTIEL = 'referentiel'; 
    case REFERENTIEL_LIST = 'referentiel_list';
    case REF_CREATE = 'ref_create';
    case REF_AFFECT = 'ref_affect';
    case REF_DESAFFECT = 'ref_desaffect';

    case APPRENANT_LIST = 'apprenant_list';
    case APPRENANT = 'apprenant-add';
    case APPRENANT_DETAIL_MODULE = 'apprenant_detail_module';
    case APPRENANT_DETAIL_ABSENCE = 'apprenant_detail_absence';


}

enum ServiceKey: string {
    case PROMOTION = 'promotion';
    // case REFERENTIEL = 'referentiel';
    case USER = 'user';
    case AUTH = 'auth';
}

enum MessageKey: string {
    case PROMO_CREATED = 'promo_created';
    case PROMO_TOGGLED = 'promo_toggled';
    case ERROR_ID_MISSING = 'error_id_missing';
    case LOGIN_FAILED = 'login_failed';
    case PASSWORD_CHANGED = 'password_changed';
}

