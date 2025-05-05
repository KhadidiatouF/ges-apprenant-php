<?php
$title = "Promotion";
$css = "/assets/css/promo.liste.css";

ob_start();
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

<div class="container">
    <h1>Promotion <span class="apprenants-count"><?= count($promotions) ?> apprenants</span></h1>

    <div class="filters">
        <form method="GET" action="">
            <input type="hidden" name="page" value="promo.list">
            <input type="text" name="search" placeholder="Rechercher une promotion..." value="<?= $_GET['search'] ?? '' ?>">
        </form>
        <select>
            <option>Filtrer par classe</option>
        </select>
        <select>
            <option>Filtrer par statut</option>
        </select>

        <a href="#formulaire-ajout" class="ajouter">
            <i class="fa-solid fa-plus"></i>
            Ajouter une promotion
        </a>
    </div>

    <section class="summary-cards">
        <div class="card orange">
            <i class="fas fa-user-graduate"></i>
            <div>
                <h2><?= count($promotions) ?></h2>
                <p>Apprenants</p>
            </div>
        </div>
        <div class="card orange">
            <i class="fas fa-folder-open"></i>
            <div>
                <h2>5</h2>
                <p>Référentiels</p>
            </div>
        </div>
        <div class="card orange">
            <i class="fas fa-briefcase"></i>
            <div>
                <h2>5</h2>
                <p>Stagiaires</p>
            </div>
        </div>
        <div class="card orange">
            <i class="fas fa-user-tie"></i>
            <div>
                <h2>13</h2>
                <p>Permanents</p>
            </div>
        </div>
    </section>

    <?php
    // ----------------- Pagination dynamique -----------------
    $currentPage = isset($_GET['current']) ? (int)$_GET['current'] : 1;
    $perPage = 3; 
    $totalPromotions = count($promotions);
    $totalPages = (int) ceil($totalPromotions / $perPage);

    // 
    $start = ($currentPage - 1) * $perPage;
    $promotionsPage = array_slice($promotions, $start, $perPage);
    ?>

    <section class="table-section">
        <table>
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Promotion</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Référentiel</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($promotionsPage as $promo): ?>
                    <tr>
                        <td><img src="<?= $promo['photo'] ?? '/assets/images/promo/promo1.png' ?>" width="80" alt="photo promo"></td>
                        <td><?= htmlspecialchars($promo['nom'] ?? '---') ?></td>
                        <td><?= htmlspecialchars($promo['debut'] ?? '---') ?></td>
                        <td><?= htmlspecialchars($promo['fin'] ?? '---') ?></td>
                        <td>
                            <?php
                            $referentiels = is_string($promo['referentiel']) ? explode(' ', $promo['referentiel']) : (array) $promo['referentiel'];
                            foreach ($referentiels as $ref) {
                                $classeCSS = strtolower(str_replace(['/', ' '], '-', $ref));
                                echo '<span class="tag ' . htmlspecialchars($classeCSS) . '">' . htmlspecialchars(strtoupper($ref)) . '</span> ';
                            }
                            ?>
                        </td>
                        <td>
                            <?php if (($promo['statut'] ?? '') === 'Active'): ?>
                                <span class="status active"><i class="fa-solid fa-circle"></i> Active</span>
                            <?php elseif (($promo['statut'] ?? '') === 'Inactive'): ?>
                                <span class="status inactive"><i class="fa-solid fa-circle"></i> Inactive</span>
                            <?php else: ?>
                                <span><?= htmlspecialchars($promo['statut'] ?? '---') ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href=""><i class="fa-solid fa-ellipsis"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <div class="pagination">
        <label>Page</label>
        <select onchange="location.href='?page=promo-list&current=' + this.value">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <option value="<?= $i ?>" <?= ($i == $currentPage) ? 'selected' : '' ?>><?= $i ?></option>
            <?php endfor; ?>
        </select>
        <p><?= $start + 1 ?> à <?= min($start + $perPage, $totalPromotions) ?> sur <?= $totalPromotions ?></p>

        <div class="pagination-controls">
            <?php if ($currentPage > 1): ?>
                <a href="?page=promo-list&current=<?= $currentPage - 1 ?>"><button>&lt;</button></a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=promo-list&current=<?= $i ?>">
                    <button class="<?= ($i == $currentPage) ? 'active' : '' ?>"><?= $i ?></button>
                </a>
            <?php endfor; ?>

            <?php if ($currentPage < $totalPages): ?>
                <a href="?page=promo-list&current=<?= $currentPage + 1 ?>"><button>&gt;</button></a>
            <?php endif; ?>
        </div>
    </div>

    <div id="formulaire-ajout">
        <h2>Créer une nouvelle promotion</h2>
        <h4>Remplir les informations ci-dessous pour créer une nouvelle promotion</h4>

        <form>
            <div class="form-group">
                <label for="nom">Nom de la promotion</label>
                <input type="text" id="nom" placeholder="Ex: DevWeb 2025" required>
            </div>

            <div class="date">
                <div class="form-group">
                    <label for="debut">Date de début</label>
                    <input type="text" id="debut" placeholder="dd/mm/YYYY">
                </div>
                <div class="form-group">
                    <label for="fin">Date de fin</label>
                    <input type="text" id="fin" placeholder="dd/mm/YYYY">
                </div>
            </div>

            <div class="photo">
                <label for="photo-upload" class="photo-glisser">
                    Ajouter<span> ou glissez</span>
                </label>
                <input type="file" id="photo-upload" accept="image/jpeg, image/png" style="display: none;">
                <div class="format">
                    Format: JPG, PNG, JPEG taille Max 2MB
                </div>
            </div>

            <div class="form-group">
                <label for="referentiel">Référentiel</label>
                <input type="text" id="referentiel" placeholder="Rechercher un référentiel..." required>
            </div>

            <div class="btn-group">
                <a href="#" class="btn cancel">Annuler</a>
                <button type="submit" class="btn submit">Créer la promotion</button>
            </div>
        </form>
    </div>

    <div class="overlay"></div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . '/layout/base.layout.php';
?>
