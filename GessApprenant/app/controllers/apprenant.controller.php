<?php
declare(strict_types=1);

// require_once __DIR__ . '/../models/apprenant.models.php';
require_once __DIR__ . '/../services/session.service.php';
require_once __DIR__ . '/../services/validator.service.php';


function show_apprenant(): void {
    $title = "Apprenant";
    $css = "/assets/css/apprenant.css";

    ob_start();
    require_once __DIR__ . "/../views/apprenant_list.php"; 
    $content = ob_get_clean();

    require_once __DIR__ . "/../views/layout/base.layout.php";
}


function create_app(): void {
    $title = "Ajout app";
    $css = "/assets/css/ajout_app.css";

    ob_start();
    require_once __DIR__ . "/../views/ajout_apprenant.php"; 
    $content = ob_get_clean();

    require_once __DIR__ . "/../views/layout/base.layout.php";
   
}

