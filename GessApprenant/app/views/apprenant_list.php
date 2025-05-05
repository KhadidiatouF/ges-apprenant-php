<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Apprenants</title>
    <link rel="stylesheet" href="/assets/css/apprenant.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

</head>
<body>


    <div class="container">
        <div class="header">
            <div class="title">
                <h1>Apprenants</h1>
                <span class="count">180 apprenants</span>
            </div>
        </div>
        
        <div class="search-filters">
            <div class="search-box">
                <input type="text" placeholder="Rechercher...">
            </div>
            <div class="filter-dropdown">
                <select>
                    <option>Filtre par classe</option>
                </select>
            </div>
            <div class="filter-dropdown">
                <select>
                    <option>Filtre par status</option>
                </select>
            </div>
            <div class="actions">
               <div class="dropdown-container">
                    <button class="dropdown-btn" style=" font-size: 17px; font-weight: bold;"> Télécharger la liste  <i class="fa-solid fa-file-arrow-down"></i></button>
                    <div class="dropdown-menu">
                        <a href="telecharger.php?format=pdf" class="dropdown-item pdf">
                        PDF <i class="fa-regular fa-file-pdf"></i>
                        </a>
                        <a href="telecharger.php?format=excel" class="dropdown-item excel">
                        Excel <i class="fa-solid fa-file-excel"></i>
                        </a>
                    </div>
                </div>



                <a href="index.php?page=<?= \App\Enums\Page::APPRENANT->value ?>"  class="btn btn-primary" style="text-decoration: none; font-weight: bold;">
                    <i class="fa-solid fa-user-plus"></i>
                        Ajouter apprenant
                </a>
                
            </div>
        </div>
        
        <div class="tabs">
            <div class="tab active">Liste des retenues</div>
            <div class="tab">Liste d'attente</div>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Matricule</th>
                    <th>Nom Complet</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Référentiel</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                

                <?php foreach ($apprenants as $apprenant): ?>
                    <tr>
                        <td class="photo"><img src="<?= htmlspecialchars($apprenant['photo']) ?>" alt="Photo" width="40" height="40"></td>
                        <td><?= htmlspecialchars($apprenant['matricule']) ?></td>
                        <td><?= htmlspecialchars($apprenant['Nom complet']) ?></td>
                        <td><?= htmlspecialchars($apprenant['adresse']) ?></td>
                        <td><?= htmlspecialchars($apprenant['telephone']) ?></td>
                        <td class="referentiel <?= strtolower(str_replace([' ', '/'], '-', $apprenant['referentiel'])) ?>">
                            <?= htmlspecialchars($apprenant['referentiel']) ?>
                        </td>

                        <td><span class="status-badge"><?= htmlspecialchars($apprenant['statut']) ?></span></td>
                        <td class="actions-menu">
                            <a href="index.php?page=<?= \App\Enums\Page::APPRENANT_DETAIL_MODULE->value ?>"><i class="fa-solid fa-ellipsis" style="color: red;"></i></a></td>
                    </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>
        
        <div class="pagination">
            <div class="pagination-info">
                <span>Apprenants/page</span>
                <select style="border:1px solid #ddd; border-radius:5px; padding:3px;">
                    <option>10</option>
                </select>
                <span>1 à 10 apprenants pour 142</span>
            </div>
            <div class="pagination-controls">
                <button class="page-btn nav">❮</button>
                <button class="page-btn active">1</button>
                <button class="page-btn">2</button>
                <button class="page-btn">...</button>
                <button class="page-btn">10</button>
                <button class="page-btn nav">❯</button>
            </div>
        </div>
    </div>
   
</body>
</html>