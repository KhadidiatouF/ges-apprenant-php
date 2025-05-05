<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Détails Apprenant</title>
  <link rel="stylesheet" href="/assets/css/app_absence.css"/>
</head>
<body>
  <div class="container">
    <aside class="sidebar">
      <a href="#">← Retour sur la liste</a>
      <div class="profile">
        <img src="https://via.placeholder.com/80" alt="Photo profil">
        <h2>Seydina Mouhammad Diop</h2>
        <p class="badge green">DEV WEB/MOBILE</p>
        <p class="badge light-green">Actif</p>
        <p><strong>Tel:</strong> +221 78 599 35 46</p>
        <p><strong>Email:</strong> mouhaleecr7@gmail.com</p>
        <p><strong>Adresse:</strong> Sicap Liberté 6 Villa 6059 Dakar</p>
      </div>
    </aside>

    <main class="main-content">
      <div class="stats">
        <div class="stat green">
          <p>20</p><span>Présence(s)</span>
        </div>
        <div class="stat orange">
          <p>5</p><span>Retard(s)</span>
        </div>
        <div class="stat red">
          <p>1</p><span>Absence(s)</span>
        </div>
      </div>

      <button class="btn-primary">Liste de présences de l'apprenant</button>

      <table>
        <thead>
          <tr>
            <th>Photo</th>
            <th>Matricule</th>
            <th>Nom Complet</th>
            <th>Date & Heure</th>
            <th>Statut</th>
            <th>Justification</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><img src="https://via.placeholder.com/40" class="photo"></td>
            <td>1058215</td>
            <td>Seydina Mouhammad Diop</td>
            <td>10/02/2025 7:32</td>
            <td><span class="badge red">Absent</span></td>
            <td><span class="badge green">Justifiée</span></td>
            <td><button class="dots">•••</button></td>
          </tr>
          <tr>
            <td><img src="https://via.placeholder.com/40" class="photo"></td>
            <td>1058218</td>
            <td>Seydina Mouhammad Diop</td>
            <td>10/02/2025 7:32</td>
            <td><span class="badge red">Absent</span></td>
            <td><span class="badge red-light">Non justifiée</span></td>
            <td><button class="dots">•••</button></td>
          </tr>
          <tr>
            <td><img src="https://via.placeholder.com/40" class="photo"></td>
            <td>1058219</td>
            <td>Seydina Mouhammad Diop</td>
            <td>10/02/2025 7:32</td>
            <td><span class="badge green">Actif</span></td>
            <td>-</td>
            <td><button class="dots">•••</button></td>
          </tr>
          <!-- Ajoutez d'autres lignes ici -->
        </tbody>
      </table>

      <div class="pagination">
        <span>1 à 10 apprenants pour 142</span>
        <div class="pages">
          <button>&laquo;</button>
          <button class="active">1</button>
          <button>2</button>
          <span>...</span>
          <button>10</button>
          <button>&raquo;</button>
        </div>
      </div>
    </main>
  </div>
</body>
</html>
