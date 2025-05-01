
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
    <h1>Aprrenant</h1>

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
        <a href="#" class="ajouter">
            <i class="fa-solid fa-plus"></i>
            Ajouter apprenant
        </a>
    </div>

    <section class="summary-cards">
       
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
                </tr>
            </thead>
            <tbody>
                <?php foreach ($apprenantsPage as $app): ?>
                    <tr>
                        <td><img src="<?= $app['photo'] ?? '/assets/images/promo/promo1.png' ?>" width="80" alt="photo promo"></td>
                        <td><?= htmlspecialchars($app['matricule'] ?? '---') ?></td>
                        <td><?= htmlspecialchars($app['Nom complet'] ?? '---') ?></td>
                        <td><?= htmlspecialchars($app['adresse'] ?? '---') ?></td>
                        <td><?= htmlspecialchars($app['telephone'] ?? '---') ?></td>
                        <td><?= htmlspecialchars($app['referentiel'] ?? '---') ?></td>
                        <td><?= htmlspecialchars($app['statut'] ?? '---') ?></td>


                        <td>
                            <?php
                            $referentiels = is_string($app['referentiel']) ? explode(' ', $app['referentiel']) : (array) $app['referentiel'];
                            foreach ($referentiels as $ref) {
                                $classeCSS = strtolower(str_replace(['/', ' '], '-', $ref));
                                echo '<span class="tag ' . htmlspecialchars($classeCSS) . '">' . htmlspecialchars(strtoupper($ref)) . '</span> ';
                            }
                            ?>
                        </td>
                        <td>
                            <?php if (($app['statut'] ?? '') === 'Active'): ?>
                                <span class="status active"><i class="fa-solid fa-circle"></i> Active</span>
                            <?php elseif (($app['statut'] ?? '') === 'Inactive'): ?>
                                <span class="status inactive"><i class="fa-solid fa-circle"></i> Inactive</span>
                            <?php else: ?>
                                <span><?= htmlspecialchars($app['statut'] ?? '---') ?></span>
                            <?php endif; ?>
                        </td>
                       
                    </tr>
                <?php endforeach; ?>
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

