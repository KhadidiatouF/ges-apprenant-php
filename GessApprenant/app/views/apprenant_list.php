
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="/assets/css/apprenant.css">

    <title>APPRENANT</title>
</head>
<body>



<div class="container">
    <h1>Apprenant</h1>

    <div class="filters">
        <form method="GET" action="">
            <input type="hidden" name="page" value="apprenant_list">
            <input type="text" name="search" placeholder="Rechercher une promotion..." value="<?= $_GET['search'] ?? '' ?>">
        </form>
        <select>
            <option>Filtrer par classe</option>
        </select>
        <select>
            <option>Filtrer par statut</option>
        </select>

        <a href="#" class="telecharger">  

            Télécharger la liste
            <i class="fa-regular fa-file"></i>

        </a>
        <a href="index.php?page=<?= \App\Enums\Page::APPRENANT->value ?>" class="ajouter">
            <i class="fa-solid fa-plus"></i>
            Ajouter apprenant
        </a>
    </div>

    <section class="summary-cards">
       
    </section>

    <section class="bascule">
       
    </section>

 

    <section class="table-section">
        <table>
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Matricule</th>
                    <th>Nom complet</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Référentiel</th>
                    <th>Statut</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td><img src="/assets/images/promo/promo1.png" width="80" alt="photo promo"></td>
                        <td>1230032</td>
                        <td>KHADIJA FALL</td>
                        <td>LIBERTÉ 6 EXTENSION</td>
                        <td>784317788</td>
                        <td>DEV WEB/MOBILE</td>
                        <td>Active </td>
                        <td>... </td>

                       
                    </tr>
                    <tr>
                        <td><img src="/assets/images/promo/promo1.png" width="80" alt="photo promo"></td>
                        <td>1230032</td>
                        <td>SEYNABOU FALL</td>
                        <td>LIBERTÉ 6 EXTENSION</td>
                        <td>784317788</td>
                        <td>AWS</td>
                        <td>Active </td>
                        <td>... </td>


                       
                    </tr>
            </tbody>
        </table>
    </section>

    <div class="pagination">
     
    </div>

    
</div>
</body>
</html>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/layout/base.layout.php';
?>

