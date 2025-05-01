
<?php
$title = "Promo grille";
$css = "/assets/css/promo.grille.css";

ob_start();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


  <div class="container">

    <div class="conteneur">
            <div class="en-tete">
                <div>
                    <h2>Promotion</h2>
                    <br>
                    <p>Gérer les promotions de l'école</p>
                </div>


                <input type="checkbox" id="modal-toggle" hidden **unchecked**>
                <label for="modal-toggle" class="ajouter">
                    <i class="fa-solid fa-plus"></i>
                    <span>Ajouter une promotion</span>
                </label>

            </div>



                <!-- <div class="modal">
                <div class="modal-content">
                  <h2>Créer une nouvelle promotion</h2>
                  <h4>Remplissez les informations ci-dessous pour créer une nouvelle promotion</h4>
                  <form id="formClient">
                    <div class="form-group">
                      <label for="nom">Nom de la promotion:</label>
                      <input type="text" id="nom" name="nom" placeholder="Ex: Promotion 2025">
                    </div>

                    <div class="date">
                      <div class="form-group">
                        <label for="debut">Date de début :</label>
                        <input type="text" id="debut" name="debut" placeholder="dd/mm/yyyy">
                      </div>
                      <div class="form-group">
                        <label for="fin">Date de Fin:</label>
                        <input type="text" id="fin" name="fin" placeholder="dd/mm/yyyy">
                      </div>
                    </div>

                    <div class="photo">
                      <div class="form-group">
                        <label for="photo">Photo de la promotion :</label>
                        <input type="file" id="photo" name="photo" accept="image/*" hidden>
                        <label for="photo" class="photo-glisser">
                          <span>Ajouter</span> <br> ou glisser
                        </label>
                      </div>
                      <div class="format">Format JPG, PNG. Taille max 2MB.</div>
                    </div>

                    <div class="form-group" id="search">
                      <label for="recherche">Référentiels</label>
                      <i class="fa-solid fa-magnifying-glass"></i>
                      <input type="text" id="recherche" name="search" placeholder="Rechercher un référentiel...">
                    </div>

                    <div class="btn-group">
                       Fermer la modale en décochant la checkbox 
                      <label for="modal-toggle" class="btn cancel">Annuler</label>
                      <button type="submit" class="btn submit">Créer la promotion</button>
                    </div>
                  </form>
                </div>
              </div> -->

            <div class="grille">
                <div class="item">
                    <div class="apprenant">
                        <span>180</span>
                        <p>Apprenants</p>
                    </div>
                    <i class="fa-solid fa-users"></i>
                </div>
                <div class="item">
                    <div class="apprenant">
                        <span>5</span>
                        <p>Référentiels</p>
                    </div>
                    <i class="fa-solid fa-book"></i>
                </div>
                <div class="item">
                    <div class="apprenant">
                        <span>1</span>
                        <p>Promotions actives</p>
                    </div>
                    <i class="fa-solid fa-check"></i>
                </div>
                <div class="item">
                    <div class="apprenant">
                        <span>5</span>
                        <p>Total Promotions</p>
                    </div>
                    <i class="fa-solid fa-folder"></i>
                </div>
            </div>

            <div class="barre-recherche">
                <div class="barre">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" placeholder = "Rechercher ...">
                </div>

                <div class="tous">
                    <span>Tous</span>
                    <i class="fa-solid fa-angle-down"></i>
                </div>

                <a href="#" class = "btn-grille">Grille</a>
                <a href="?page=promo_liste" class = "btn-liste">Liste</a>
            </div>

            <div class="grille1">
                <div class="g1">
                    <div class="active-desactive">
                        <button>Inactive</button>
                        <i class="fa-solid fa-power-off"></i>
                    </div>
                    <div class="promo">
                        <img src="assets/images/promo/promo1.png" alt="">
                        <div class="numero-promo">
                            <span>Promotion 2017</span><br>
                            <div><i class="fa-solid fa-calendar-days"></i>04/02/2025-04/12/2025</div>
                        </div>
                    </div>
                    <div class="apprenants">
                        <i class="fa-solid fa-users"></i> <span>2 apprenants</span>
                    </div>
                    <div class="divider"></div>
                    <div class="voir-plus">
                        <a href="">Voir plus</a>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                </div>

                <div class="g2">
                    <div class="active-desactive">
                        <button>Active</button>
                        <i class="fa-solid fa-power-off"></i>
                    </div>
                    <div class="promo">
                        <img src="/assets/images/promo/promo2.png" alt="">
                        <div class="numero-promo">
                            <span>Promotion 2025</span><br>
                            <div><i class="fa-solid fa-calendar-days"></i>04/02/2025-04/12/2025</div>
                        </div>
                    </div>
                    <div class="apprenants">
                        <i class="fa-solid fa-users"></i> <span>0 apprenants</span>
                    </div>
                    <div class="divider"></div>
                    <div class="voir-plus">
                        <a href="">Voir plus</a>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                </div>

                <div class="g3">
                    <div class="active-desactive">
                        <button>Inactive</button>
                        <i class="fa-solid fa-power-off"></i>
                    </div>
                    <div class="promo">
                        <img src="assets/images/promo/promo3.png" alt="">
                        <div class="numero-promo">
                            <span>Promotion 2018</span>
                            <br>
                            <div><i class="fa-solid fa-calendar-days"></i>04/02/2025-04/12/2025</div>
                        </div>
                    </div>
                    <div class="apprenants">
                        <i class="fa-solid fa-users"></i> <span>0 apprenants</span>
                    </div>
                    <div class="divider"></div>
                    <div class="voir-plus">
                        <a href="">Voir plus</a>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                </div>

                <div class="g4">
                    <div class="active-desactive">
                        <button>Inactive</button>
                        <i class="fa-solid fa-power-off"></i>
                    </div>
                    <div class="promo">
                        <img src="assets/images/promo/promo4.png" alt="">
                        <div class="numero-promo">
                            <span>Promotion 2024</span><br>
                            <div><i class="fa-solid fa-calendar-days"></i>04/02/2025-04/12/2025</div>
                        </div>
                    </div>
                    <div class="apprenants">
                        <i class="fa-solid fa-users"></i> <span>2 apprenants</span>
                    </div>
                    <div class="divider"></div>
                    <div class="voir-plus">
                        <a href="">Voir plus</a>
                        <i class="fa-solid fa-angle-right"></i>
                    </div>
                </div>
                <div class="g5"></div>

            </div>

            

        
        </div>
  </div>
   

    <?php
     $content = ob_get_clean();
     require_once __DIR__ . '/layout/base.layout.php';
?>