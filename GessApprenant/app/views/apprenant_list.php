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
                    <button class="dropdown-btn"> Télécharger la liste  <i class="fa-solid fa-file-arrow-down"></i></button>
                    <div class="dropdown-menu">
                        <a href="telecharger.php?format=pdf" class="dropdown-item pdf">
                        PDF <i class="fa-regular fa-file-pdf"></i>
                        </a>
                        <a href="telecharger.php?format=excel" class="dropdown-item excel">
                        Excel <i class="fa-solid fa-file-excel"></i>
                        </a>
                    </div>
                </div>

                <button class="btn btn-primary">
                   <i class="fa-solid fa-user-plus"></i>
                    Ajouter apprenant
                </button>
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
                <tr>
                    <td class="photo"><img src="/api/placeholder/40/40" alt="Photo"></td>
                    <td>1058215</td>
                    <td>Seydina Mouhammed Diop</td>
                    <td>Sicap Liberté 6 villa 6059 Dakar, Sénégal</td>
                    <td>785993546</td>
                    <td class="referentiel dev-web">DEV WEB/MOBILE</td>
                    <td><span class="status-badge">Actif</span></td>
                    <td class="actions-menu">⋮</td>
                </tr>
                <tr>
                    <td class="photo"><img src="/api/placeholder/40/40" alt="Photo"></td>
                    <td>1058216</td>
                    <td>Mamadou Gueye</td>
                    <td>Keur Mbaye Fall Dakar, Sénégal</td>
                    <td>783116655</td>
                    <td class="referentiel ref-dig">REF DIG</td>
                    <td><span class="status-badge">Actif</span></td>
                    <td class="actions-menu">⋮</td>
                </tr>
                <tr>
                    <td class="photo"><img src="/api/placeholder/40/40" alt="Photo"></td>
                    <td>1058217</td>
                    <td>Ndiaga Lo</td>
                    <td>Sicap Derkle Dakar, Sénégal</td>
                    <td>784559930</td>
                    <td class="referentiel dev-data">DEV DATA</td>
                    <td><span class="status-badge">Actif</span></td>
                    <td class="actions-menu">⋮</td>
                </tr>
                <tr>
                    <td class="photo"><img src="/api/placeholder/40/40" alt="Photo"></td>
                    <td>1058218</td>
                    <td>Seydina Mouhammed Diop</td>
                    <td>Sicap Liberté 6 villa 6059 Dakar, Sénégal</td>
                    <td>785993546</td>
                    <td class="referentiel aws">AWS</td>
                    <td><span class="status-badge">Actif</span></td>
                    <td class="actions-menu">⋮</td>
                </tr>
                <tr>
                    <td class="photo"><img src="/api/placeholder/40/40" alt="Photo"></td>
                    <td>1058219</td>
                    <td>Seydina Mouhammed Diop</td>
                    <td>Sicap Liberté 6 villa 6059 Dakar, Sénégal</td>
                    <td>785993546</td>
                    <td class="referentiel dev-web">DEV WEB/MOBILE</td>
                    <td><span class="status-badge">Actif</span></td>
                    <td class="actions-menu">⋮</td>
                </tr>
                <tr>
                    <td class="photo"><img src="/api/placeholder/40/40" alt="Photo"></td>
                    <td>1058220</td>
                    <td>Seydina Mouhammed Diop</td>
                    <td>Sicap Liberté 6 villa 6059 Dakar, Sénégal</td>
                    <td>785993546</td>
                    <td class="referentiel dev-web">DEV WEB/MOBILE</td>
                    <td><span class="status-badge replaced">Remplacé</span></td>
                    <td class="actions-menu">⋮</td>
                </tr>
                <tr>
                    <td class="photo"><img src="/api/placeholder/40/40" alt="Photo"></td>
                    <td>1058221</td>
                    <td>Seydina Mouhammed Diop</td>
                    <td>Sicap Liberté 6 villa 6059 Dakar, Sénégal</td>
                    <td>785993546</td>
                    <td class="referentiel hackeuse">HACKEUSE</td>
                    <td><span class="status-badge">Actif</span></td>
                    <td class="actions-menu">⋮</td>
                </tr>
                <tr>
                    <td class="photo"><img src="/api/placeholder/40/40" alt="Photo"></td>
                    <td>1058222</td>
                    <td>Seydina Mouhammed Diop</td>
                    <td>Sicap Liberté 6 villa 6059 Dakar, Sénégal</td>
                    <td>785993546</td>
                    <td class="referentiel ref-dig">REF DIG</td>
                    <td><span class="status-badge">Actif</span></td>
                    <td class="actions-menu">⋮</td>
                </tr>
                <tr>
                    <td class="photo"><img src="/api/placeholder/40/40" alt="Photo"></td>
                    <td>1058223</td>
                    <td>Seydina Mouhammed Diop</td>
                    <td>Sicap Liberté 6 villa 6059 Dakar, Sénégal</td>
                    <td>785993546</td>
                    <td class="referentiel ref-dig">REF DIG</td>
                    <td><span class="status-badge">Actif</span></td>
                    <td class="actions-menu">⋮</td>
                </tr>
                <tr>
                    <td class="photo"><img src="/api/placeholder/40/40" alt="Photo"></td>
                    <td>1058224</td>
                    <td>Ousseynou Diedhiou</td>
                    <td>Sicap Liberté 6 villa 6059 Dakar, Sénégal</td>
                    <td>785993546</td>
                    <td class="referentiel dev-web">DEV WEB/MOBILE</td>
                    <td><span class="status-badge">Actif</span></td>
                    <td class="actions-menu">⋮</td>
                </tr>
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